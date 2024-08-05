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
		<!-- <div id="preloader"></div> -->
		<!-- preloader - end -->


		<!-- header_section - start
		================================================== -->
		<header class="header_section default_header sticky_header clearfix">
			<div class="header_top text-white" data-bg-color="#000000">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-7">
							<p class="mb-0">Miễn phí giao hàng toàn quốc</p>
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
								<a class="brand_link" href="{{route('home')}}">
									<img src="assets/images/logo/logo_27_1x.png" srcset="assets/images/logo/logo_27_2x.png 2x" alt="logo_not_found">
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
							<nav class="main_menu clearfix">
								<ul class="ul_li_center clearfix">
									<li >
										<a href="{{route('home')}}">Home</a>
										
									</li>
									<li >
										<a href="#!">Shop</a>
										
									</li>
									<li >
										<a href="#!">Pages</a>
										
									</li>
									<li><a href="#!">About us</a></li>
									<li><a href="">Contact us</a></li>
								</ul>
							</nav>
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

			<!-- breadcrumb_section - start
			================================================== -->
			{{-- <section class="breadcrumb_section text-white text-center text-uppercase d-flex align-items-end clearfix" data-background="assets/images/breadcrumb/bg_15.jpg">
				<div class="overlay" data-bg-color="#1d1d1d"></div>
				<div class="container">
					<h1 class="page_title text-white"> đăng nhập</h1>
				</div>
			</section> --}}
			<!-- breadcrumb_section - end
			================================================== -->


			<!-- register_section - start
			================================================== -->
			<section class="register_section sec_ptb_140 has_overlay parallaxie clearfix" data-background="assets/images/backgrounds/bg_35.jpg">
				<div class="overlay" data-bg-color="rgba(55, 55, 55, 0.75)"></div>
				<div class="container">
					<div class=" p-5 bg-white rounded shadow-sm">
                      
						<div class="mb-4">
                            <h2 class="h5 mb-2">Name</h2>
							<p class="text-muted mb-0">{{ $user->name }}</p>
                        </div>
						<div class="mb-4">
                            <h2 class="h5 mb-2">Email</h2>
							<p class="text-muted mb-0">{{ $user->email }}</p>
                        </div>
						<div class="mb-4">
                            <h2 class="h5 mb-2">Phone</h2>
							<p class="text-muted mb-0">{{ $user->phone }}</p>
                        </div>
                        <!-- Address Section -->
                        <div class="mb-4">
                            <h2 class="h5 mb-2">Address</h2>
                            <p class="text-muted">{{$user->address}}</p>
                        </div>
                        <!-- Settings Section -->
                        <div>
                            <h2 class="h5 mb-2">Settings</h2>
                            <div class="d-flex gap-3">
                                <a href="{{route('ProfileEdit')}}" class="btn btn-primary">Edit Profile</a>
                                <a href="#" class="btn btn-danger">Logout</a>
                            </div>
                        </div>
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
				</div>
			</section>
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
