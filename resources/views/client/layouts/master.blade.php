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
		<!-- <div id="preloader"></div> -->
		<!-- preloader - end -->


		<!-- header_section - start
		================================================== -->
		<header class="header_section electronic_header clearfix">
			<div class="header_advertisement">
				<img src="assets/images/offer/electronic/img_01.png" alt="image_not_found">
			</div>
			<div class="header_top clearfix">
				<div class="container maxw_1600">
					<div class="row align-items-center">
						<div class="col-lg-3">
							<div class="brand_logo">
								<a class="brand_link" href="index.html">
									<img src="assets/images/logo/logo_16_1x.png" srcset="assets/images/logo/logo_16_2x.png 2x" alt="logo_not_found">
								</a>

								<ul class="mh_action_btns ul_li clearfix">
									<li>
										<button type="button" class="search_btn" data-toggle="collapse" data-target="#search_body_collapse" aria-expanded="false" aria-controls="search_body_collapse">
											<i class="fal fa-search"></i>
										</button>
									</li>
									<li>
										<button type="button" class="cart_btn">
											<i class="fal fa-shopping-cart"></i>
											<span class="btn_badge">2</span>
										</button>
									</li>
									<li><button type="button" class="mobile_menu_btn"><i class="far fa-bars"></i></button></li>
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
											<option data-display="All Category">Select A Option</option>
											<option value="1">Some option</option>
											<option value="2">Another option</option>
											<option value="3" disabled>A disabled option</option>
											<option value="4">Potato</option>
										</select>
									</div>
									<button type="submit" class="submit_btn"><i class="fal fa-search"></i></button>
								</div>
							</form>
						</div>

						<div class="col-lg-3">
							<ul class="electronic_action_btns ul_li_right clearfix">
								<li>
									<a href="login.html">
										<i class="fas fa-user"></i>
										<span>Login</span>
									</a>
								</li>
								<li>
									<a href="shop_cart.html">
										<i class="fas fa-heart"></i>
										<span>Wishlist</span>
									</a>
								</li>
								<li>
									<button type="button" class="cart_btn">
										<span class="counter">2</span>
										<i class="fas fa-shopping-cart"></i>
										<span>Cart</span>
									</button>
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

			<div class="header_bottom clearfix">
				<div class="container maxw_1600">
					<div class="row align-items-center">
						<div class="col-lg-8">
							<nav class="main_menu clearfix">
								<ul class="ul_li text-uppercase clearfix">
									<li><a href="#!">Super deals</a></li>
									<li><a href="#!">Mother`s Day</a></li>
									<li><a href="#!">Apple Week</a></li>
									<li><a href="#!">Logitech Sale</a></li>
									<li><a href="#!">Headphones Sale</a></li>
								</ul>
							</nav>
						</div>

						<div class="col-lg-4 d-flex align-items-center justify-content-lg-end">
							<div class="black_friday text-center">
								<h3 class="text-uppercase">BLACK FRIDAY</h3>
								<span>Get 45% off!</span>
							</div>
							<div class="language_select option_select">
								<select>
									<option data-display="Language Select">Select A Option</option>
									<option value="1" selected>English</option>
									<option value="2">Franch</option>
									<option value="3" disabled>portuguese</option>
									<option value="4">Spanish</option>
								</select>
							</div>
						</div>
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