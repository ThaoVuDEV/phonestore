@extends('client.layouts.master')
@section('title')
    Trang chủ
@endsection
@section('content')
    
			<!-- sidebar mobile menu & sidebar cart - start
			================================================== -->
			@include('client.component.sidebar')
			<!-- sidebar mobile menu & sidebar cart - end
			================================================== -->


			<!-- slider_section - start
			================================================== -->
			@include('client.component.slider_section')
			<!-- slider_section - end
			================================================== -->


			<!-- product_section - start
			================================================== -->
			@include('client.component.product_section')
			<!-- product_section - end
			================================================== -->


			<!-- product_section - start
			================================================== -->
			{{-- @include('client.component.product_section2') --}}
			<!-- product_section - end
			================================================== -->


			<!-- advertisement_section - start
			================================================== -->
			<div class="advertisement_section mb_50 clearfix">
				<div class="container maxw_1600">
					<div class="row justify-content-lg-between">
						<div class="col-lg-9 col-md-8">
							<div class="advertisement_image">
								<a href="#!">
									<img src="assets/images/offer/electronic/img_04.jpg" alt="image_not_found">
								</a>
							</div>
						</div>

						<div class="col-lg-3 col-md-4">
							<div class="advertisement_image">
								<a href="#!">
									<img src="assets/images/offer/electronic/img_05.jpg" alt="image_not_found">
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- advertisement_section - end
			================================================== -->


			<!-- feature_section - start
			================================================== -->
			<section class="feature_section electronic_feature_carousel mb_50 clearfix">
				<div class="slideshow1_slider clearfix" data-slick='{"arrows": false}'>
					<div class="item" data-background="assets/images/backgrounds/bg_12.jpg">
						<div class="container maxw_1600">
							<div class="row align-items-center justify-content-lg-between">
								<div class="col-lg-7">
									<div class="item_image">
										<img src="assets/images/feature/electronic/img_01.png" alt="image_not_found">
									</div>
								</div>

								<div class="col-lg-5">
									<div class="item_content">
										<span class="item_price">
											<strong>£99.00</strong>
											<i>ALL-NEW-SPORT</i>
										</span>
										<div class="item_type">
											<strong>5K</strong>
											<span>
												<i>STARTING AT</i>
												<small>OS Tablet</small>
											</span>
										</div>
										<h3 class="item_title text-white">
											Acer Chromebook Tab 10 Is Official
										</h3>
										<a href="#!" class="custom_btn bg_white">Shop Now</a>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="item" data-background="assets/images/backgrounds/bg_12.jpg">
						<div class="container maxw_1600">
							<div class="row align-items-center justify-content-lg-between">
								<div class="col-lg-7">
									<div class="item_image">
										<img src="assets/images/feature/electronic/img_01.png" alt="image_not_found">
									</div>
								</div>

								<div class="col-lg-5">
									<div class="item_content">
										<span class="item_price">
											<strong>£99.00</strong>
											<i>ALL-NEW-SPORT</i>
										</span>
										<div class="item_type">
											<strong>5K</strong>
											<span>
												<i>STARTING AT</i>
												<small>OS Tablet</small>
											</span>
										</div>
										<h3 class="item_title text-white">
											Acer Chromebook Tab 10 Is Official
										</h3>
										<a href="#!" class="custom_btn bg_white">Shop Now</a>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="item" data-background="assets/images/backgrounds/bg_12.jpg">
						<div class="container maxw_1600">
							<div class="row align-items-center justify-content-lg-between">
								<div class="col-lg-7">
									<div class="item_image">
										<img src="assets/images/feature/electronic/img_01.png" alt="image_not_found">
									</div>
								</div>

								<div class="col-lg-5">
									<div class="item_content">
										<span class="item_price">
											<strong>£99.00</strong>
											<i>ALL-NEW-SPORT</i>
										</span>
										<div class="item_type">
											<strong>5K</strong>
											<span>
												<i>STARTING AT</i>
												<small>OS Tablet</small>
											</span>
										</div>
										<h3 class="item_title text-white">
											Acer Chromebook Tab 10 Is Official
										</h3>
										<a href="#!" class="custom_btn bg_white">Shop Now</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- feature_section - end
			================================================== -->


	
			<!-- electronic_newsletter - start
			================================================== -->
			<section class="electronic_newsletter clearfix">
				<div class="container maxw_1600">
					<div class="row align-items-center justify-content-lg-between justify-content-md-center justify-content-sm-center">
						<div class="col-lg-3 col-md-7 col-sm-9 col-xs-12">
							<div class="title_wrap">
								<i class="fal fa-paper-plane"></i>
								<h2>Sign up for Newsletter</h2>
								<p class="mb-0">...and receive $20 coupon for first shopping.</p>
							</div>
						</div>

						<div class="col-lg-5 col-md-7 col-sm-9 col-xs-12">
							<form action="#">
								<div class="form_item">
									<input type="email" name="email" placeholder="Enter your email address">
									<button type="submit" class="custom_btn bg_electronic_blue">Sign up</button>
								</div>
							</form>
						</div>

						<div class="col-lg-3 col-md-7 col-sm-9 col-xs-12">
							<div class="payment_mathoud">
								<p>WE USING SAFE PAYMENTS</p>
								<img src="assets/images/payment_methods_01.png" alt="image_not_found">
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- electronic_newsletter - end
			================================================== -->

@endsection