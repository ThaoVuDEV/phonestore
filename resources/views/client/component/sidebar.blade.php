<div class="sidebar-menu-wrapper">
    <div class="cart_sidebar">
        <button type="button" class="close_btn"><i class="fal fa-times"></i></button>

        <ul class="cart_items_list ul_li_block mb_30 clearfix">
            
            @if (empty($cartItems) || (is_array($cartItems) && count($cartItems) === 0))
                <p>Giỏ hàng của bạn đang trống.</p>
            @else
                @foreach ($cartItems as $item)
                <?php $image = json_decode($item->variant->image ,true);
                $firstImage = $images[0] ?? 'default.jpg'; ?>
                    <li>
                        <div class="item_image">
                            <img src="{{ asset('storage/uploads/' . basename( $firstImage)) }}"
                                alt="image_not_found">
                        </div>
                        <div class="item_content">
                            <h4 class="item_title">{{ $item->variant->product->name }}</h4>
                            <span class="item_price_cart">${{ number_format($item->price) }}</span>
                            <span class="item_quantity_cart">x{{ $item->quantity }}</span>
                        </div>
                        <button type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button>
                    </li>
                @endforeach
        
        </ul>
       
        
        <ul class="item_total_cart ul_li_block mb_30 clearfix">
           
            <li>
                <span >Total:</span>
             
            </li>
        </ul>
      
        <ul class="btns_group ul_li_block clearfix">
            <li><a href="{{ route('cart') }}">View Cart</a></li>
        </ul>
        @endif
    </div>

    <div class="overlay"></div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    // Lấy tất cả các phần tử chứa giá và số lượng
    const prices = document.querySelectorAll('.item_price_cart');
    const quantities = document.querySelectorAll('.item_quantity_cart');
    
    let total = 0;

    // Kiểm tra số lượng giá và số lượng có khớp không
    if (prices.length === quantities.length) {
        for (let i = 0; i < prices.length; i++) {
            // Lấy giá trị của giá và số lượng
            const price = parseFloat(prices[i].textContent.replace(/[^0-9.-]/g, '')); // Chuyển đổi giá trị thành số
            const quantity = parseInt(quantities[i].textContent.replace(/[^0-9]/g, ''), 10); // Chuyển đổi số lượng thành số
            
            // Tính toán tổng cho sản phẩm hiện tại
            total += price * quantity;
        }

        // Gán tổng vào phần tử HTML
        const totalElement = document.querySelector('.item_total_cart');
        if (totalElement) {
            totalElement.innerHTML = `
                <li>
                    <span>Total: ${total.toFixed()} VNĐ</span>
                </li>
            `;
        }
    }
});
</script>