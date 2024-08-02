<!DOCTYPE html>
<html lang="en">

@include('client.layouts.head')


<body class="home_electronic">


    <!-- backtotop - start -->
    <div id="thetop"></div>
    <div class="backtotop bg_electronic_blue">
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
    <header class="header_section electronic_header clearfix">
        <div class="header_advertisement">
            {{-- <img src="{{asset('assets/images/offer/electronic/img_01.png')}}" alt="image_not_found"> --}}
        </div>
        <div class="header_top clearfix">
            <div class="container maxw_1600">
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <div class="brand_logo">
                            <a class="brand_link" href="{{route('home')}}">
                                <img src="{{ asset('assets/images/logo/logo_16_1x.png') }}"
                                    srcset="assets/images/logo/logo_16_2x.png 2x" alt="logo_not_found">
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
                        <form action="#">
                            <div class="medical_search_bar">
                                <div class="form_item">
                                    <input type="search" name="search" placeholder="search here...">
                                </div>
                                <div class="option_select">
                                    <select>
                                        <option data-display="All Category" value="">Select A Option</option>
                                        @foreach ($categories as $index => $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="submit_btn"><i class="fal fa-search"></i></button>
                            </div>
                        </form>
                    </div>

                    <div class="col-lg-3">
                        <ul class="electronic_action_btns ul_li_right clearfix">
                            <li>
                                @if (Auth::check())
                                    <div class="dropdown relative">
                                        <button type="button" class="user_btn inline-flex items-center">
                                            <i class="fas fa-user"></i>
                                            <span>{{ Auth::user()->name }}</span>
                                        </button>
                                        <div
                                            class="dropdown-menu absolute right-0 mt-2 w-48 bg-white border border-gray-300 rounded-lg shadow-lg z-10">
                                            <div class="user-info p-4">
                                                <p><strong>{{ Auth::user()->name }}</strong></p>
                                                <a href="{{ route('ProfileUser') }}"
                                                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                                                <a href="{{ route('Userlogout') }}"
                                                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                                <form id="logout-form" action="{{ route('Userlogout') }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <a href="{{ route('user.login') }}" class="inline-flex items-center">
                                        <i class="fas fa-user"></i>
                                        <span>Login</span>
                                    </a>
                                @endif
                            </li>
                            <li>
                                <button type="button" class="cart_btn" id="cart-btn"
                                    data-logged-in="{{ Auth::check() ? 'true' : 'false' }}">
                                    <i class="fas fa-shopping-cart"></i>
                                    <span>Cart</span>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @include('client.component.sidebar')

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

        @yield('content')

    </main>
    <!-- main body - end
  ================================================== -->


    <!-- footer_section - start
  ================================================== -->
    @include('client.layouts.footer')
    <!-- footer_section - end
  ================================================== -->

    @include('client.layouts.script')


</body>

</html>
