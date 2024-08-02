<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Register Page - Neoncart HTML5 Template</title>
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
    <style>
        .form_item {
            position: relative;
        }

        .password-match .form-input {
            padding-right: 3rem;
            /* Khoảng cách bên phải để tạo không gian cho các phần tử khác */
        }

        .password-match .checkmark {
            position: absolute;
            right: 1rem;
            /* Khoảng cách từ cạnh phải của ô nhập liệu */
            top: 50%;
            transform: translateX(-150%) translateY(-50%);
            font-size: 1.2em;
            color: green;
            display: none;
            /* Mặc định không hiển thị */
        }

        .password-match .checkmark.visible {
            display: inline;
        }

        .password-match .toggle-password {
            position: absolute;
            right: 0.5rem;
            /* Khoảng cách từ cạnh phải của ô nhập liệu */
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.2em;
            cursor: pointer;
        }
    </style>

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
                        <p class="mb-0">Giao hàng miến phí trên toàn quốc</p>
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
                                <img src="assets/images/logo/logo_27_1x.png"
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
                                <li class="">
                                    <a href="#!">Trang chủ</a>
                                </li>
                                <li><a href="contact.html">Liên hệ</a></li>
                            </ul>
                        </nav>
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

        <!-- breadcrumb_section - start
   ================================================== -->
        <section class="breadcrumb_section text-white text-center text-uppercase d-flex align-items-end clearfix"
            data-background="assets/images/breadcrumb/bg_15.jpg">
            <div class="overlay" data-bg-color="#1d1d1d"></div>
            <div class="container">
                <h1 class="page_title text-white">Trang đăng ký</h1>

            </div>
        </section>
        <!-- breadcrumb_section - end
   ================================================== -->


        <!-- register_section - start
   ================================================== -->
        <section class="register_section sec_ptb_140 parallaxie clearfix"
            data-background="assets/images/backgrounds/bg_35.jpg">
            <div class="container">
                <div class="reg_form_wrap signup_form" data-background="assets/images/iphone15.jpg">
                    <form id="registrationForm" action="{{ route('userRegister') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="reg_form">
                            <h2 class="form_title text-uppercase">Đăng ký</h2>

                            <!-- Hiển thị thông báo lỗi nếu có -->
                            @if (session('success'))
                                <div class="alert alert-danger">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <!-- Các trường nhập liệu -->
                            <div class="form_item">
                                <input type="text" name="name" id="name" placeholder="Tên của bạn"
                                    value="{{ old('name') }}" class="form-input">
                                @error('name')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form_item">
                                <input type="email" name="email" id="email" placeholder="Email"
                                    value="{{ old('email') }}" class="form-input">
                                @error('email')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form_item">
                                <input type="tel" name="phone" id="phone" placeholder="Số điện thoại"
                                    value="{{ old('phone') }}" class="form-input">
                                @error('phone')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form_item">
                                <input type="text" name="address" id="address" placeholder="Địa chỉ"
                                    value="{{ old('address') }}" class="form-input">
                                @error('address')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form_item relative mb-4 flex items-center password-match">
                                <input type="password" name="password" id="password" placeholder="Mật khẩu"
                                    class="form-input">
                                <span type="button"
                                    class="toggle-password absolute right-12 top-1/2 transform -translate-y-1/2 cursor-pointer"
                                    onclick="togglePassword('password')">👁️</span>
                                
                                @error('password')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form_item relative mb-4 flex items-center password-match">
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    placeholder="Xác nhận mật khẩu" class="form-input">
                                <span type="button"
                                    class="toggle-password absolute right-12 top-1/2 transform -translate-y-1/2 cursor-pointer"
                                    onclick="togglePassword('password_confirmation')">👁️</span>
                                <span class="checkmark">✔</span>
                                @error('password_confirmation')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="checkbox_item mb_30">
                                <label for="agree_checkbox">
                                    <input id="agree_checkbox" type="checkbox" name="agree_terms">
                                    Tôi đồng ý với Điều khoản của người dùng
                                </label>
                                @error('agree_terms')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="custom_btn bg_default_red text-uppercase mb_50">Tạo tài
                                khoản</button>

                            <div class="create_account text-center">
                                <h4 class="small_title_text text-center text-uppercase">Bạn đã có tài khoản</h4>
                                <a class="create_account_btn text-uppercase" href="{{ route('user.login') }}">Đăng
                                    nhập</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <script>
            // JavaScript to handle password match checking
            document.getElementById('password').addEventListener('input', checkPasswordMatch);
            document.getElementById('password_confirmation').addEventListener('input', checkPasswordMatch);

            function checkPasswordMatch() {
                const password = document.getElementById('password').value;
                const passwordConfirmation = document.getElementById('password_confirmation').value;
                const checkmark = document.querySelector('.password-match .checkmark');

                if (password === passwordConfirmation && password !== '') {
                    checkmark.classList.add('visible');
                } else {
                    checkmark.classList.remove('visible');
                }
            }

            function togglePassword(fieldId) {
                const field = document.getElementById(fieldId);
                const fieldType = field.getAttribute('type');
                if (fieldType === 'password' || fieldType === 'password_confirmation') {
                    field.setAttribute('type', 'text');
                } else {
                    field.setAttribute('type', 'password');
                }
            }
        </script>
        <!-- register_section - end
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
