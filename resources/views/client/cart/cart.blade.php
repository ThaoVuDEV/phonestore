<!DOCTYPE html>
<html lang="en">

@include('client.layouts.head')


<body>


    <!-- backtotop - start -->
    <div id="thetop"></div>
    <div class="backtotop bg_default_red">
        <a href="#" class="scroll">
            <i class="far fa-arrow-up"></i>
        </a>
    </div>
    <!-- backtotop - end -->

    <!-- preloader - start -->
    {{-- <div id="preloader"></div>  --}}
    <!-- preloader - end -->


    <!-- header_section - start
  ================================================== -->

    <!-- header_section - end
  ================================================== -->


    <!-- main body - start
  ================================================== -->
    <main>


        <!-- sidebar mobile menu & sidebar cart - start
   ================================================== -->

        <!-- sidebar mobile menu & sidebar cart - end
   ================================================== -->


        <!-- breadcrumb_section - start
   ================================================== -->
        <section class="breadcrumb_section text-white text-center text-uppercase d-flex align-items-end clearfix"
            data-background="{{ asset('assets/images/breadcrumb/bg_15.jpg') }}">
            <div class="overlay" data-bg-color="#1d1d1d"></div>
            <div class="container">
                <h1 class="page_title text-white">Cart Page</h1>
                <ul class="breadcrumb_nav ul_li_center clearfix">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Shop</li>
                    <li>Shopping Cart</li>
                </ul>
            </div>
        </section>
        <!-- breadcrumb_section - end
   ================================================== -->


        <!-- cart_section - start
   ================================================== -->
        <section class="cart_section sec_ptb_140 clearfix">
            <div class="container maxw_1460">
                <div class="cart_table mb_50">
                    <table class="table">
                        <thead class="text-uppercase">
                            <tr>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartItems as $item)
                                @php
                                    $images = json_decode($item->variant->image, true);
                                    $firstImage = $images[0] ?? 'default.jpg'; // Lấy ảnh đầu tiên hoặc ảnh mặc định nếu không có ảnh
                                @endphp
                                <tr data-cart-item-id="{{ $item->id }}">
                                    <!-- Thêm data-cart-item-id để sử dụng với JavaScript -->
                                    <input type="hidden" name="variant_text" data-variant="{{ $item->variant->id }}">
                                    <td>
                                        <div class="cart_product">
                                            <div class="item_image">
                                                <img src="{{ asset('storage/uploads/' . basename($firstImage)) }}"
                                                    alt="image_not_found">
                                            </div>
                                            <div class="item_content">
                                                <h4 class="item_title">
                                                    {{ $item->variant->product->name }}
                                                    {{ $item->variant->color->name }}
                                                    {{ $item->variant->capacity->value }}
                                                </h4>
                                                <button type="button" class="remove_btn">
                                                    <i class="fal fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="price_text"
                                            data-price="{{ $item->variant->price }}">{{ $item->variant->price }}</span>
                                        <input type="hidden" name="price_text"
                                            value="{{ $item->variant->price }} VNĐ">
                                    </td>
                                    <td>
                                        <div class="quantity_input">
                                            <button class="input_number_decrement_new">–</button>
                                            <input class="input_number_new" value="{{ $item->quantity }}"
                                                min="1">
                                            <button class="input_number_increment_new">+</button>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="total_price"
                                            data-price="{{ $item->variant->price }}">{{ $item->variant->price * $item->quantity }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="coupon_wrap mb_50">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- Hiển thị thông tin mã giảm giá và giảm giá nếu có -->
                    @if (session('coupon'))
                        @php
                            $coupon = session('coupon');
                        @endphp


                        <p>Giảm giá: {{ $coupon['value'] }}</p>
                        <input type="hidden" id="discount_type" name="discount_type"
                            value="{{ $coupon['discount_type'] }}"
                            data-discount-type="{{ $coupon['discount_type'] }}">
                        <input type="hidden" id="discount_value" name="discount_value" value="{{ $coupon['value'] }}"
                            data-discount-value="{{ $coupon['value'] }}">
                        <input type="hidden" id="discount_id" name="discount_id" value="{{ $coupon['id'] }}">
                    @endif

                    <div class="row justify-content-lg-between">
                        <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                            <form action="{{ route('applyCoupon') }}" method="POST">
                                @csrf
                                <div class="coupon_form">
                                    <div class="form_item mb-0">
                                        <input type="text" name="code" class="coupon" placeholder="Coupon Code">
                                    </div>
                                    <button type="submit" class="custom_btn bg_danger text-uppercase">Apply
                                        Coupon</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

                <div class="row justify-content-lg-end">
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="cart_pricing_table pt-0 text-uppercase" data-bg-color="#f2f3f5">
                            <h3 class="table_title text-center" data-bg-color="#ededed">Cart Total</h3>
                            <ul class="ul_li_block clearfix">
                                <li><span>Subtotal</span> <span class="cart_subtotal">$197.99</span></li>
                                <li><span>Discount</span> <span class="cart_discount">$197.99</span>
                                </li>

                                <li><span>Total</span> <span class="cart_total">$197.99</span></li>
                            </ul>
                            <form id="cartForm" action="{{ route('checkout') }}" method="POST">
                                @csrf
                                @method('POST')
                                @if (session('coupon'))
                                @php
                                    $coupon = session('coupon');
                                @endphp
                                <input type="hidden" id="discount_id" name="discount_id" value="{{ $coupon['id'] }}">
                            @endif
                                <input type="hidden" name="cart" id="cartData">
                                <input type="hidden" name="cart_subtotal">
                                <input type="hidden" name="cart_discount">
                                <input type="hidden" name="cart_total">
                                <button type="submit" class="custom_btn bg_success">Proceed to Checkout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                function getCsrfToken() {
                    const metaTag = document.querySelector('meta[name="csrf-token"]');
                    if (metaTag) {
                        return metaTag.getAttribute('content');
                    } else {
                        console.error('CSRF meta tag not found.');
                        return null;
                    }
                }

                function getCartData() {
                    return Array.from(document.querySelectorAll('tr[data-cart-item-id]')).map(row => {
                        return {
                            id: row.getAttribute('data-cart-item-id'),
                            variant_id: row.querySelector('[name="variant_text"]').getAttribute('data-variant'),
                            quantity: parseInt(row.querySelector('.input_number_new').value) || 1,
                            price: parseFloat(row.querySelector('.price_text').getAttribute('data-price')),
                            total: (parseFloat(row.querySelector('.price_text').getAttribute('data-price')) * (
                                parseInt(row.querySelector('.input_number_new').value) || 1)),
                        }
                    });
                }

                function updateCart() {
                    let subtotal = 0;
                    let discountValue = 0;
                    let discountType = ''; // Giá trị sẽ là 'fixed_amount' hoặc 'percentage'

                    // Lấy giá trị giảm giá từ các biến
                    const discountElement = document.querySelector('input[name="discount_value"]');
                    const discountTypeElement = document.querySelector('input[name="discount_type"]');

                    if (discountElement) {
                        discountValue = parseFloat(discountElement.getAttribute('data-discount-value')) || 0;
                    }
                    if (discountTypeElement) {
                        discountType = discountTypeElement.getAttribute('data-discount-type') || '';
                    }

                    document.querySelectorAll('.quantity_input').forEach(inputWrapper => {
                        const input = inputWrapper.querySelector('.input_number_new');
                        const quantity = parseInt(input.value) || 1;
                        const priceElement = inputWrapper.closest('tr').querySelector('.price_text');
                        const price = parseFloat(priceElement.getAttribute('data-price'));
                        const totalPriceElement = inputWrapper.closest('tr').querySelector('.total_price');
                        const totalPrice = price * quantity;

                        totalPriceElement.textContent = `${totalPrice} VNĐ`;

                        subtotal += totalPrice;
                    });

                    // Tính toán giảm giá
                    let discount = 0;
                    if (discountType === 'percentage') {
                        discount = (subtotal * discountValue) / 100;
                    } else if (discountType === 'fixed_amount') {
                        discount = discountValue;
                    }

                    // Tính tổng sau khi giảm giá
                    let total = subtotal - discount;
                    if (total < 0) {
                        total = 0;
                    }
                    // Cập nhật giao diện người dùng
                    document.querySelector('.cart_subtotal').textContent = `${subtotal} VNĐ`;
                    document.querySelector('.cart_discount').textContent = `${discount} VNĐ`;
                    document.querySelector('.cart_total').textContent = `${total} VNĐ`;



                    // Cập nhật các input ẩn trong form
                    document.querySelector('input[name="cart_subtotal"]').value = subtotal;
                    document.querySelector('input[name="cart_discount"]').value = discount;
                    document.querySelector('input[name="cart_total"]').value = total;

                }

                document.querySelector('#cartForm').addEventListener('submit', function(event) {
                    updateCart(); // Cập nhật các giá trị trước khi gửi form
                    const cartData = getCartData();
                    document.querySelector('#cartData').value = JSON.stringify(cartData);
                });

                // Lắng nghe sự thay đổi trong input số lượng
                document.querySelectorAll('.quantity_input .input_number_new').forEach(input => {
                    input.addEventListener('input', function() {
                        updateCart();
                    });
                });

                // Xử lý nút tăng và giảm số lượng
                document.querySelectorAll('.input_number_increment_new').forEach(button => {
                    button.addEventListener('click', function() {
                        const input = this.previousElementSibling;
                        input.value = parseInt(input.value) + 1;
                        input.dispatchEvent(new Event('input'));
                    });
                });

                document.querySelectorAll('.input_number_decrement_new').forEach(button => {
                    button.addEventListener('click', function() {
                        const input = this.nextElementSibling;
                        if (parseInt(input.value) > 1) {
                            input.value = parseInt(input.value) - 1;
                            input.dispatchEvent(new Event('input'));
                        }
                    });
                });

                // Xử lý nút xóa sản phẩm
                document.querySelectorAll('.remove_btn').forEach(button => {
                    button.addEventListener('click', function() {
                        const row = this.closest('tr');
                        const cartItemId = row.getAttribute('data-cart-item-id');

                        if (confirm('Are you sure you want to remove this item?')) {
                            fetch(`/cart/remove/${cartItemId}`, {
                                    method: 'DELETE',
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        updateCart();
                                    } else {
                                        alert('Error removing item.');
                                    }
                                });
                        }
                    });
                });

                // Cập nhật giỏ hàng khi trang được tải
                updateCart();
            });
        </script>

        <!-- cart_section - end
   ================================================== -->


    </main>
    <!-- main body - end
  ================================================== -->


    <!-- footer_section - start
  ================================================== -->
    @include('client.layouts.footer')
    <!-- footer_section - end
  ================================================== -->


    <!-- fraimwork - jquery include -->
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- mobile menu - jquery include -->
    <script src="assets/js/mCustomScrollbar.js"></script>

    <!-- google map - jquery include -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDk2HrmqE4sWSei0XdKGbOMOHN3Mm2Bf-M&ver=2.1.6"></script>
    <script src="assets/js/gmaps.min.js"></script>

    <!-- animation - jquery include -->
    <script src="assets/js/parallaxie.js"></script>
    <script src="assets/js/wow.min.js"></script>

    <!-- nice select - jquery include -->
    <script src="assets/js/nice-select.min.js"></script>

    <!-- carousel - jquery include -->
    <script src="assets/js/slick.min.js"></script>

    <!-- countdown timer - jquery include -->
    <script src="assets/js/countdown.js"></script>

    <!-- popup images & videos - jquery include -->
    <script src="assets/js/magnific-popup.min.js"></script>

    <!-- filtering & masonry layout - jquery include -->
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/masonry.pkgd.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>

    <!-- jquery ui - jquery include -->
    <script src="assets/js/jquery-ui.js"></script>

    <!-- custom - jquery include -->
    <script src="assets/js/custom.js"></script>


</body>

</html>
