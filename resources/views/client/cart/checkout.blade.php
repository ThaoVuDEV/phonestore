<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Neoncart</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favourite_icon_01.png') }}">

    <!-- Framework - CSS include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- Icon - CSS include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fontawesome.css') }}">

    <!-- Animation - CSS include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">

    <!-- Nice Select - CSS include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/nice-select.css') }}">

    <!-- Carousel - CSS include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slick-theme.css') }}">

    <!-- Popup Images & Videos - CSS include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/magnific-popup.css') }}">

    <!-- JQuery UI - CSS include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery-ui.css') }}">

    <!-- Custom - CSS include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">

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
    <!-- <div id="preloader"></div> -->
    <!-- preloader - end -->


    <!-- header_section - start
  ================================================== -->
    <header class="header_section default_header sticky_header clearfix">
        <div class="header_top text-white" data-bg-color="#000000">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <p class="mb-0">Miễn phí ship toàn thế giới</p>
                    </div>

                    <div class="col-lg-5">
                        <ul class="primary_social_links ul_li_right clearfix">
                            <li><a href="#!"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#!"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#!"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#!"><i class="fab fa-whatsapp"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="header_bottom clearfix">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <div class="brand_logo">
                            <a class="brand_link" href="index.html">
                                <img src="{{ asset('assets/images/logo/logo_27_1x.png') }}"
                                    srcset="assets/images/logo/logo_27_2x.png 2x" alt="logo_not_found">
                            </a>

                            <ul class="mh_action_btns ul_li clearfix">
                                <li>
                                    <button type="button" class="search_btn" data-toggle="collapse"
                                        data-target="#search_body_collapse" aria-expanded="false"
                                        aria-controls="search_body_collapse">
                                        <i class="fal fa-search"></i>
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="cart_btn">
                                        <i class="fal fa-shopping-cart"></i>
                                        <span class="btn_badge">2</span>
                                    </button>
                                </li>
                                <li><button type="button" class="mobile_menu_btn"><i class="far fa-bars"></i></button>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <nav class="main_menu clearfix">
                            <ul class="ul_li_center clearfix">
                                <li>
                                    <a href="{{ route('home') }}">Home</a>

                                </li>

                                <li><a href="#!">About us</a></li>
                                <li><a href="contact.html">Contact us</a></li>
                            </ul>
                        </nav>
                    </div>

                    <div class="col-lg-3">
                        <ul class="action_btns_group ul_li_right clearfix">
                            <li>
                                <button type="button" class="search_btn" data-toggle="collapse"
                                    data-target="#search_body_collapse" aria-expanded="false"
                                    aria-controls="search_body_collapse">
                                    <i class="fal fa-search"></i>
                                </button>
                            </li>
                            <li>
                                <button type="button" class="user_btn" data-toggle="collapse"
                                    data-target="#use_deropdown" aria-expanded="false" aria-controls="use_deropdown">
                                    <i class="fal fa-user"></i>
                                </button>
                                <div id="use_deropdown" class="collapse_dropdown collapse">
                                    <div class="dropdown_content">
                                        <div class="profile_info clearfix">
                                            <div class="user_thumbnail">
                                                <img src="{{ asset('assets/images/meta/img_01.png') }}"
                                                    alt="thumbnail_not_found">
                                            </div>
                                            <div class="user_content">
                                                <h4 class="user_name">Jone Doe</h4>
                                                <span class="user_title">Seller</span>
                                            </div>
                                        </div>
                                        <ul class="settings_options ul_li_block clearfix">
                                            <li><a href="#!"><i class="fal fa-user-circle"></i> Profile</a></li>
                                            <li><a href="#!"><i class="fal fa-user-cog"></i> Settings</a></li>
                                            <li><a href="#!"><i class="fal fa-sign-out-alt"></i> Logout</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div id="search_body_collapse" class="search_body_collapse collapse">
            <div class="search_body">
                <div class="container-fluid prl_90">
                    <form action="#">
                        <div class="form_item mb-0">
                            <input type="search" name="search" placeholder="Type here...">
                            <button type="submit"><i class="fal fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>
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
            data-background="{{ asset('assets/images/breadcrumb/bg_16.jpg') }}">
            <div class="overlay" data-bg-color="#1d1d1d"></div>
            <div class="container">
                <h1 class="page_title text-white">Thanh toán</h1>
                <ul class="breadcrumb_nav ul_li_center clearfix">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Shop</li>
                    <li>Checkout</li>
                </ul>
            </div>
        </section>
        <!-- breadcrumb_section - end
   ================================================== -->


        <!-- checkout_section - start
   ================================================== -->
        <section class="checkout_section sec_ptb_140 clearfix">
            <div class="container">
                <!-- Các phần hiện có -->

                <div class="billing_form mb_50">
                    <h3 class="form_title mb_30">Chi tiết hóa đơn</h3>
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

                    <form action="{{ route('storeOrder') }}" method="POST">
                        @csrf
                        @method('POST')

                        <!-- Các trường khác -->



                        <!-- Phần chi tiết đơn hàng và phương thức thanh toán -->

                        <div class="billing_form">
                            <h3 class="form_title mb_30">Your order</h3>
                            <div class="form_wrap">
                                <div class="checkout_table">
                                    <table class="table text-center mb_50">
                                        <thead class="text-uppercase text-uppercase">
                                            <tr>
                                                <th>Tên sản phẩm</th>
                                                <th>Giá</th>
                                                <th>Số lượng</th>
                                                <th>Tổng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $all_price = 0; // Biến để lưu tổng tất cả các giá trị `total_price`
                                            @endphp
                                            <input type="hidden" name="cart_items" value="{{ $cartItems }}">
                                            @foreach ($cartItems as $item)
                                                @php
                                                    $images = json_decode($item->variant->image, true);
                                                    $firstImage = $images[0] ?? 'default.jpg';
                                                    $all_price += $item->total_price; // Cộng giá trị `total_price` vào `all_price`
                                                @endphp

                                                <tr>
                                                    <td>
                                                        <div class="cart_product">
                                                            <div class="item_image">
                                                                <img src="{{ asset('storage/uploads/' . basename($firstImage)) }}"
                                                                    alt="image_not_found">
                                                            </div>
                                                            <div class="item_content">
                                                                <h4 class="item_title mb-0">
                                                                    {{ $item->variant->product->name }} <p
                                                                        class="mt-2">
                                                                        ({{ $item->variant->capacity->value }} -
                                                                        {{ $item->variant->color->name }})
                                                                    </p>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="price_text">
                                                            {{ number_format($item->price, 0, ',', '.') }}₫
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="quantity_text">{{ $item->quantity }}</span>
                                                    </td>
                                                    <td>
                                                        <span class="total_price">
                                                            {{ number_format($item->total_price, 0, ',', '.') }}₫
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <span class="subtotal_text">Tổng thiệt hại</span>
                                                </td>
                                                <td>
                                                    <span class="all_price">
                                                        {{ number_format($all_price, 0, ',', '.') }}₫
                                                    </span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="form_item">
                                                        <span class="input_title">Mã giảm giá</span>
                                                        <div class="d-flex ">
                                                            <input type="text" name="coupon_code" id="coupon_code"
                                                                placeholder="Nhập mã giảm giá">
                                                            <button type="button" id="apply_coupon"
                                                                class="custom_btn bg_default_red">Áp dụng</button>
                                                        </div>
                                                        @if (session('discount'))
                                                            <div class="alert alert-success mt-2">
                                                                {{ session('discount') }}
                                                            </div>
                                                        @endif
                                                        @if (session('discount_error'))
                                                            <div class="alert alert-danger mt-2">
                                                                {{ session('discount_error') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <span class="subtotal_text">Loại giao hàng</span>
                                                </td>
                                                <td class="text-left">
                                                    <div class="checkbox_item mb_15">
                                                        <label for="shipping_checkbox">
                                                            <input id="shipping_checkbox" name="shipping_option"
                                                                type="radio" data-fee="0" checked> Miễn phí ship
                                                        </label>
                                                    </div>
                                                    <div class="checkbox_item mb_15">
                                                        <label for="flatrate_checkbox">
                                                            <input id="flatrate_checkbox" name="shipping_option"
                                                                type="radio" data-fee="100000"> kiểu Vua: 100000 ₫
                                                        </label>
                                                    </div>
                                                    <div class="checkbox_item">
                                                        <label for="localpickup_checkbox">
                                                            <input id="localpickup_checkbox" name="shipping_option"
                                                                type="radio" data-fee="150000"> tận giường: 150000 ₫
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="text-left">
                                                    <span class="subtotal_text">Tổng tất cả</span>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <span class="total_all_price">
                                                        {{ number_format($all_price, 0, ',', '.') }}₫
                                                    </span>
                                                    <input type="hidden" name="total_amount"
                                                        value="{{ $all_price }}">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="billing_payment_mathod">
                                    <ul class="ul_li_block clearfix">
                                        <li>
                                            <div class="checkbox_item mb_15 pl-0">
                                                <label for="bank_transfer_radio">
                                                    <input id="bank_transfer_radio" name="payment_method"
                                                        value="bank_transfer" type="radio" checked> Chuyển khoản
                                                    trực tiếp
                                                </label>
                                            </div>
                                            <p class="mb-0">
                                                Thanh toán trực tiếp vào tài khoản ngân hàng của chúng tôi. Vui lòng sử
                                                dụng
                                                Mã đơn hàng của bạn làm tham chiếu thanh toán. Đơn hàng của bạn sẽ không
                                                được
                                                giao cho đến khi tiền được chuyển vào tài khoản của chúng tôi.
                                            </p>
                                        </li>
                                        <li>
                                            <div class="checkbox_item mb-0 pl-0">
                                                <label for="check_payments_radio">
                                                    <input id="check_payments_radio" name="payment_method"
                                                        value="check_payments" type="radio"> Thanh toán khi nhận
                                                    hàng
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox_item mb-0 pl-0">
                                                <label for="paypal_radio">
                                                    <input id="paypal_radio" type="radio" name="payment_method"
                                                        value="paypal"> Paypal <a href="#!"><img
                                                            class="paypal_image"
                                                            src="{{ asset('assets/images/payment_methods_03.png') }}"
                                                            alt="image_not_found"></a>
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                    <button type="submit" class="custom_btn bg_default_red">Đặt hàng</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>



        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const shippingOptions = document.querySelectorAll('input[name="shipping_option"]');
                const allPriceElement = document.querySelector('.all_price');
                const totalAllPriceElement = document.querySelector('.total_all_price');

                let allPriceText = allPriceElement.textContent.replace(/\./g, ""); // Loại bỏ dấu phân cách hàng nghìn
                allPriceText = allPriceText.replace(/[^0-9.-]+/g,
                    ""); // Loại bỏ tất cả các ký tự không phải số và dấu phân cách thập phân

                let allPrice = parseFloat(allPriceText);
                let shippingFee = 0;

                shippingOptions.forEach(option => {
                    option.addEventListener('change', function() {
                        if (this.checked) {
                            shippingFee = parseFloat(this.dataset.fee);
                            totalAllPriceElement.textContent = (allPrice + shippingFee).toLocaleString(
                                'vi-VN', {
                                    style: 'currency',
                                    currency: 'VND'
                                });
                        }
                    });
                });
            });
          
        </script>
        <!-- checkout_section - end
   ================================================== -->


    </main>
    <!-- main body - end
  ================================================== -->


    <!-- footer_section - start
  ================================================== -->
    @include('client.layouts.footer')
    <!-- footer_section - end
  ================================================== -->


    <!-- Framework - jQuery include -->
    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    <!-- Mobile Menu - jQuery include -->
    <script src="{{ asset('assets/js/mCustomScrollbar.js') }}"></script>

    <!-- Google Map - jQuery include -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDk2HrmqE4sWSei0XdKGbOMOHN3Mm2Bf-M&ver=2.1.6"></script>
    <script src="{{ asset('assets/js/gmaps.min.js') }}"></script>

    <!-- Animation - jQuery include -->
    <script src="{{ asset('assets/js/parallaxie.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>

    <!-- Nice Select - jQuery include -->
    <script src="{{ asset('assets/js/nice-select.min.js') }}"></script>

    <!-- Carousel - jQuery include -->
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>

    <!-- Countdown Timer - jQuery include -->
    <script src="{{ asset('assets/js/countdown.js') }}"></script>

    <!-- Popup Images & Videos - jQuery include -->
    <script src="{{ asset('assets/js/magnific-popup.min.js') }}"></script>

    <!-- Filtering & Masonry Layout - jQuery include -->
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/masonry.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>

    <!-- jQuery UI - jQuery include -->
    <script src="{{ asset('assets/js/jquery-ui.js') }}"></script>

    <!-- Custom - jQuery include -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>


</body>

</html>
