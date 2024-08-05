<?php

namespace App\Http\Controllers;

use App\Mail\OrderCompleted;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Discount;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CartController extends Controller
{
    protected $user;
    protected $cart;
    public function __construct(User $user, Cart $cart)
    {
        $this->user = $user;
        $this->cart = $cart;
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)
            ->with(['product', 'variant'])
            ->get();
        // Trả về một phần của view chứa giỏ hàng
        return  view('client.cart.checkout', compact('cartItems', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeOrder(Request $request)
    {
        try {
            // Giải mã dữ liệu JSON của cart_items
            $cartItems = json_decode($request->input('cart_items'), true);

            // Kiểm tra nếu dữ liệu giỏ hàng trống hoặc không đúng định dạng
            foreach ($cartItems as $item) {
                // Kiểm tra sự tồn tại của mặt hàng trong bảng cart
                $cartItem = Cart::find($item['id']);
                if (!$cartItem) {
                    return redirect()->route('home')->with('error', 'Một hoặc nhiều mặt hàng trong giỏ hàng không còn tồn tại.');
                }

                // Kiểm tra tính hợp lệ của dữ liệu mặt hàng
                if ($cartItem->quantity < $item['quantity']) {
                    return redirect()->back()->with('error', 'Số lượng mặt hàng không đủ trong giỏ hàng.');
                }
            }

            // Tạo đơn hàng mới
            $order = Order::create([
                'total_amount' => $request->input('total_amount'),
                'status' => 1, // Ví dụ, 1 cho trạng thái "Đang xử lý"
                'payment_method' => $request->input('payment_method'),
                'user_id' => auth()->id(),

            ]);

            // Lưu các mặt hàng trong giỏ hàng vào bảng order_detail
            foreach ($cartItems as $item) {
                OrderDetail::create([
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'subtotal' => $item['total_price'],
                    'order_id' => $order->id,
                    'variant_id' => $item['variant_id'],
                    'cart_id' => $item['id'],
                ]);
                $productVariant = ProductVariant::find($item['variant_id']);
                if ($productVariant) {
                    $productVariant->stock -= $item['quantity'];
                    $productVariant->save();
                }
                Cart::where('id', $item['id'])->forceDelete();
            }
            // Lưu trạng thái đơn hàng vào session
            session(['order_completed' => true]);

            return redirect()->route('order.completed')->with('status', 'Đặt hàng thành công!');
        } catch (\Exception $e) {
            Log::error('Order creation failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại.');
        }
    }
    /**
     * Display the specified resource.
     */

    public function addToCart(Request $request)
    {
        // Kiểm tra người dùng đã đăng nhập chưa
        if (!Auth::check()) {
            return response()->json(['error' => 'Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.'], 403);
        }

        $request->validate([
            'variant_id' => 'required|exists:product_variants,id',
            'quantity' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
            'price' => 'required|exists:product_variants,price'
        ]);

        try {
            $variantId = $request->input('variant_id');
            $quantity = $request->input('quantity');
            $totalPrice = $request->input('total_price');
            $price = $request->input('price');
            $variant = ProductVariant::findOrFail($variantId);

            $user = Auth::user();

            // Kiểm tra nếu sản phẩm đã tồn tại trong giỏ hàng của người dùng
            $cartItem = Cart::where('user_id', $user->id)
                ->where('variant_id', $variantId)
                ->first();

            if ($cartItem) {
                // Cập nhật số lượng sản phẩm
                $cartItem->quantity += $quantity;
                $cartItem->save();
            } else {
                // Thêm sản phẩm vào giỏ hàng
                Cart::create([
                    'user_id' => $user->id,
                    'variant_id' => $variant->id,
                    'total_price' => $totalPrice,
                    'price'  => $variant->price,
                    'quantity' => $quantity,
                ]);
            }

            return response()->json(['success' => 'Sản phẩm đã được thêm vào giỏ hàng']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Đã xảy ra lỗi: ' . $e->getMessage()], 500);
        }
    }


    public function showCart()
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)
            ->with(['product', 'variant'])
            ->get();
        // Trả về một phần của view chứa giỏ hàng
        $view = view('client.component.sidebar', compact('cartItems'));

        return response()->json(['html' => $view]);
    }
    public function viewCart()
    {
        if (Auth::check()) {
            // Nếu người dùng đã đăng nhập
            $user = Auth::user();
            $cartItems = Cart::where('user_id', $user->id)
                ->with(['product', 'variant'])
                ->get();
        } else {
            // Nếu người dùng chưa đăng nhập
            $cart = session()->get('cart', []);
            $cartItems = [];

            foreach ($cart as $productId => $details) {
                $product = Product::find($productId);
                if ($product) {
                    $variant = $product->variants()->first(); // Lấy variant đầu tiên hoặc tùy thuộc vào yêu cầu
                    $cartItems[] = (object) [
                        'product' => $product,
                        'variant' => $variant,
                        'quantity' => $details['quantity'],
                        'price' => $variant->price * $details['quantity'], // Tính giá dựa trên số lượng
                    ];
                }
            }
        }

        return view('client.cart.cart', compact('cartItems'));
    }
    public function checkout(Request $request)
    {

        $user = Auth::user();
        $cartItems = json_decode($request->input('cart'), true);
        $cart_total = $request->input('cart_total');
        $discount = $request->input('cart_discount');
        $code_id = $request->input('discount_id');

        if (!$cartItems) {
            return redirect()->back()->with('error', 'Dữ liệu giỏ hàng không hợp lệ!');
        }

        $totalAmount = 0;

        foreach ($cartItems as $item) {


            $subtotal = $item['quantity'] * $item['price'];
            $totalAmount += $subtotal;


            // Update or create cart item
            $cartItem = Cart::where('user_id', $user->id)
                ->where('variant_id', $item['variant_id'])
                ->first();

            if ($cartItem) {
                // Update quantity and total price
                $cartItem->quantity = $item['quantity'];
                $cartItem->total_price = $subtotal;
                $cartItem->save();
            } else {
                // Create a new cart item
                Cart::create([
                    'user_id' => $user->id,
                    'variant_id' => $item['variant_id'],
                    'quantity' => $item['quantity'],
                    'total_price' => $subtotal,
                ]);
            }
        }


        $cartItems = Cart::where('user_id', $user->id)
            ->with(['variant.product'])
            ->get();

        session()->put('order_info', [
            'cartItems' => $cartItems,
            'totalAmount' => $totalAmount,
            'cart_total' => $cart_total,
            'discount' => $discount,
            'code_id' => $code_id,
        ]);

        return view('client.cart.checkout', compact('user', 'cartItems', 'totalAmount', 'cart_total', 'discount',));
    }
    public function removeFromCart($id)
    {
        $user = Auth::user();
        $cartItem = Cart::where('user_id', $user->id)
            ->where('id', $id) // Sử dụng id thay vì variant_id
            ->first();

        if ($cartItem) {
            $cartItem->forceDelete();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }
    public function orderCompleted()
    {
        // Kiểm tra nếu không có session 'order_completed'
        if (!session('order_completed')) {
            return redirect()->route('home')->with('error', 'Bạn không thể truy cập trang này.');
        }

        // Lấy thông tin đơn hàng từ session
        $orderInfo = session('order_info');
        if (!$orderInfo) {
            return redirect()->route('home')->with('error', 'Thông tin đơn hàng không có.');
        }

        // Xóa thông tin giảm giá khỏi session
        session()->forget('coupon');

        // Lấy thông tin người dùng
        $user = Auth::user();
        $cartItems = $orderInfo['cartItems'];
        $totalAmount = $orderInfo['totalAmount'];
        $cart_total = $orderInfo['cart_total'];
        $discount = $orderInfo['discount'];
        $code_id = $orderInfo['code_id'];
       
        if ($code_id) {
            $discountModel = new Discount();
            $discountModel->applyCouponed($code_id);
        }

        // Gửi email thông báo hoàn tất đơn hàng
        try {
            Mail::to($user->email)->send(new OrderCompleted($user, $cartItems, $totalAmount, $cart_total, $discount));
        } catch (\Exception $e) {
           
            return redirect()->route('home')->with('error', 'Có lỗi xảy ra khi gửi email xác nhận.');
        }

        session()->forget('order_info');
        session()->forget('order_completed');


        return view('client.cart.ordercompleted', compact('user'));
    }
}
