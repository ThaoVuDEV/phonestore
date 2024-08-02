<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Shop Cart</title>
    <link rel="shortcut icon" href="assets/images/logo/favourite_icon_01.png">

    <!-- fraimwork - css include -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <!-- icon - css include -->
    <link rel="stylesheet" type="text/css" href="assets/css/fontawesome.css">

    <!-- animation - css include -->
    <link rel="stylesheet" type="text/css" href="assets/css/animate.css">

    <!-- nice select - css include -->
    <link rel="stylesheet" type="text/css" href="assets/css/nice-select.css">

    <!-- carousel - css include -->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css">

    <!-- popup images & videos - css include -->
    <link rel="stylesheet" type="text/css" href="assets/css/magnific-popup.css">

    <!-- jquery ui - css include -->
    <link rel="stylesheet" type="text/css" href="assets/css/jquery-ui.css">

    <!-- custom - css include -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>


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
                    <li><a href="#!">Home</a></li>
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
                                        <input type="hidden" name="price_text" value="{{ $item->variant->price }}">
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


                <div class="row justify-content-lg-end">
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="cart_pricing_table pt-0 text-uppercase" data-bg-color="#f2f3f5">
                            <h3 class="table_title text-center" data-bg-color="#ededed">Cart Total</h3>
                            <ul class="ul_li_block clearfix">
                                <li><span>Subtotal</span> <span class="cart_subtotal">$197.99</span></li>

                                <li><span>Total</span> <span class="cart_total">$197.99</span></li>
                            </ul>
                            <form id="cartForm" action="{{ route('checkout') }}" method="POST">
                                @csrf
                                @method('POST')
                                <input type="hidden" name="cart" id="cartData">
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

                // Kiểm tra xem token có được lấy không
                console.log('CSRF Token:', getCsrfToken());

                function getCartData() {
                    return Array.from(document.querySelectorAll('tr[data-cart-item-id]')).map(row => {
                        return {
                            id: row.getAttribute('data-cart-item-id'),
                            variant_id: row.querySelector('[name="variant_text"]').getAttribute('data-variant'),
                            quantity: parseInt(row.querySelector('.input_number_new').value) || 1,
                            price: parseFloat(row.querySelector('.price_text').getAttribute('data-price')),
                            total: (parseFloat(row.querySelector('.price_text').getAttribute('data-price')) * (
                                parseInt(row.querySelector('.input_number_new').value) || 1))
                        }
                    });
                }

                document.querySelector('#cartForm').addEventListener('submit', function(event) {
                    const cartData = getCartData();
                    document.querySelector('#cartData').value = JSON.stringify(cartData);
                });

                function updateCart() {
                    let subtotal = 0;

                    document.querySelectorAll('.quantity_input').forEach(inputWrapper => {
                        const input = inputWrapper.querySelector('.input_number_new');
                        const quantity = parseInt(input.value) || 1;
                        const priceElement = inputWrapper.closest('tr').querySelector('.price_text');
                        const price = parseFloat(priceElement.getAttribute('data-price'));
                        const totalPriceElement = inputWrapper.closest('tr').querySelector('.total_price');

                        const totalPrice = price * quantity;
                        totalPriceElement.textContent = `${totalPrice.toFixed(2)} VNĐ`;

                        subtotal += totalPrice;
                    });

                    document.querySelector('.cart_subtotal').textContent = `${subtotal.toFixed(2)} VNĐ`;
                    document.querySelector('.cart_total').textContent = `${subtotal.toFixed(2)} VNĐ`;
                }

                document.querySelectorAll('.quantity_input .input_number_new').forEach(input => {
                    input.addEventListener('input', function() {
                        updateCart();
                    });
                });

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

                document.querySelectorAll('.remove_btn').forEach(button => {
                    button.addEventListener('click', function() {
                        const row = this.closest('tr');
                        const cartItemId = row.getAttribute('data-cart-item-id');

                        if (confirm('Are you sure you want to remove this item?')) {
                            fetch(`/cart/remove/${cartItemId}`, {
                                    method: 'DELETE',
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector(
                                            'meta[name="csrf-token"]').getAttribute('content')
                                    }
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        row.remove();
                                        updateCart();
                                    } else {
                                        alert('Error removing item.');
                                    }
                                });
                        }
                    });
                });

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
