@extends('client.layouts.master')
@section('title')
    Chi tiết sản phẩm
@endsection
@section('content')
    	
	<!-- trending_section - start
			================================================== -->
			{{-- <section class="trending_section clearfix">
				<div class="container maxw_1600">
					<div class="row justify-content-lg-between">
						<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
							<div class="electronic_trending_carousel position-relative" data-bg-color="#131315">
								<div class="slideshow1_slider" data-slick='{"dots": false}'>
									<div class="item">
										<div class="electronic_trending_item text-white">
											<div class="item_image">
												<img src="assets/images/shop/electronic/img_37.png" alt="image_not_found">
											</div>
											<div class="item_content">
												<span class="item_price"><strong>$165.00</strong> <del>$319.00</del></span>
												<h3 class="item_title text-white">Virtual Reality Headsets</h3>
												<p>
													Nullam dignissim elit ut urna rutrum, a fermentum mi auctor. Mauris efficitur magna orci, et dignissim lacus scelerisque sit amet. Proin malesuada
												</p>
												<a class="custom_btn btn_sm bg_electronic_blue" href="#!">Add To Cart</a>
											</div>
										</div>
									</div>

									<div class="item">
										<div class="electronic_trending_item text-white">
											<div class="item_image">
												<img src="assets/images/shop/electronic/img_37.png" alt="image_not_found">
											</div>
											<div class="item_content">
												<span class="item_price"><strong>$165.00</strong> <del>$319.00</del></span>
												<h3 class="item_title text-white">Virtual Reality Headsets</h3>
												<p>
													Nullam dignissim elit ut urna rutrum, a fermentum mi auctor. Mauris efficitur magna orci, et dignissim lacus scelerisque sit amet. Proin malesuada
												</p>
												<a class="custom_btn btn_sm bg_electronic_blue" href="#!">Add To Cart</a>
											</div>
										</div>
									</div>

									<div class="item">
										<div class="electronic_trending_item text-white">
											<div class="item_image">
												<img src="assets/images/shop/electronic/img_37.png" alt="image_not_found">
											</div>
											<div class="item_content">
												<span class="item_price"><strong>$165.00</strong> <del>$319.00</del></span>
												<h3 class="item_title text-white">Virtual Reality Headsets</h3>
												<p>
													Nullam dignissim elit ut urna rutrum, a fermentum mi auctor. Mauris efficitur magna orci, et dignissim lacus scelerisque sit amet. Proin malesuada
												</p>
												<a class="custom_btn btn_sm bg_electronic_blue" href="#!">Add To Cart</a>
											</div>
										</div>
									</div>
								</div>
								<div class="carousel_nav">
									<button type="button" class="left_arrow"><i class="fal fa-angle-left"></i></button>
									<button type="button" class="right_arrow"><i class="fal fa-angle-right"></i></button>
								</div>
							</div>
						</div>

						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
							<ul class="trending_products_list ul_li clearfix">
								<li>
									<div class="etp_small_item text-center">
										<a class="item_image" href="#!">
											<img src="assets/images/shop/electronic/img_38.png" alt="image_not_found">
										</a>
										<h4 class="item_title mb-0">Laptops</h4>
									</div>
								</li>
								<li>
									<div class="etp_small_item text-center">
										<a class="item_image" href="#!">
											<img src="assets/images/shop/electronic/img_39.png" alt="image_not_found">
										</a>
										<h4 class="item_title mb-0">Dekstop PCs</h4>
									</div>
								</li>
								<li>
									<div class="etp_small_item text-center">
										<a class="item_image" href="#!">
											<img src="assets/images/shop/electronic/img_40.png" alt="image_not_found">
										</a>
										<h4 class="item_title mb-0">Ultrabooks</h4>
									</div>
								</li>
								<li>
									<div class="etp_small_item text-center">
										<a class="item_image" href="#!">
											<img src="assets/images/shop/electronic/img_41.png" alt="image_not_found">
										</a>
										<h4 class="item_title mb-0">Mac Computers</h4>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</section> --}}
			<!-- trending_section - end
			================================================== -->


			<!-- product_section - start
			================================================== -->
			<section class="product_section sec_ptb_100 clearfix">
				<div class="container maxw_1600">
					<div class="row justify-content-lg-between">

						<div class="col-lg-9 order-last">
							<ul class="electronic_filter_bar ul_li mb_30">
								<li>
									<ul class="layout_btns nav ul_li clearfix" role="tablist">
										<li>
											<a class="active" data-toggle="tab" href="#grid_layout"><i class="fas fa-th"></i></a>
										</li>
										<li>
											<a data-toggle="tab" href="#list_layout"><i class="fas fa-bars"></i></a>
										</li>
									</ul>
								</li>
								<li>
									<div class="product_show option_select">
										<select>
											<option data-display="Show on page:">Select A Option</option>
											<option value="1" selected>Show on page: 18</option>
											<option value="2">Show on page: 20</option>
											<option value="3" disabled>Show on page: 22</option>
											<option value="4">Show on page: 24</option>
										</select>
									</div>
								</li>
								<li>
									<div class="shortby_select option_select">
										<select>
											<option data-display="Select:">Select A Option</option>
											<option value="1" selected>Popularity</option>
											<option value="2">Popularity</option>
											<option value="3" disabled>Popularity</option>
											<option value="4">Popularity</option>
										</select>
									</div>
								</li>
								<li><p class="result_text mb-0 d-flex align-items-center"><span class="active_page">1</span> of 3 <a class="next_btn" href="#!"><i class="fal fa-long-arrow-right"></i></a></p></li>
							</ul>

							<div class="tab-content mb_50">
								<div id="grid_layout" class="tab-pane active">
									<ul class="electronic_product_columns ul_li has_4columns clearfix">
									@foreach ($proList as $item)
									<li>
										<div class="electronic_product_item">
											
											<div class="item_image">
												<img src="{{ asset('storage/products/' . basename($item->image)) }}" alt="image_not_found">
											</div>
											<div class="item_content">
												<span class="item_name">Speakers</span>
												<h3 class="item_title">
													<a href="{{route('getProDetail1',['id'=>$item->id])}}">{{$item->name}}</a>
												</h3>
								
											</div>
										</div>
									</li>
									@endforeach

									
									</ul>
								</div>

								<div id="list_layout" class="tab-pane fade">
									<ul class="electronic_product_columns ul_li has_4columns clearfix">
										@foreach ($proList as $item)
										<li>
											<div class="electronic_product_item">
												
												<div class="item_image">
													<img src="{{ asset('storage/products/' . basename($item->image)) }}" alt="image_not_found">
												</div>
												<div class="item_content">
													<span class="item_name">Speakers</span>
													<h3 class="item_title">
														<a href="{{route('getProDetail1',['id'=>$item->id])}}">{{$item->name}}</a>
													</h3>
									
												</div>
											</div>
										</li>
										@endforeach

										</ul>
								</div>
							</div>

							<div class="abtn_wrap text-center mb_50">
								<a href="#!" class="custom_btn btn_border border_electronic">Load more</a>
							</div>

							<div class="advertisement_image">
								<a href="#!">
									
								</a>
							</div>
						</div>

						<div class="col-lg-3">
							{{-- <aside class="electronic_sidebar sidebar_section">
								<div class="sb_widget sb_collapse_category">
									<h3 class="sb_widget_title">All Categories</h3>
									<div id="sb_category_accordion" class="sb_category_accordion">
										<div class="card">
											<div class="card-header">
												<a data-toggle="collapse" href="#collapse_one">
													Wearable Technology (84)
												</a>
											</div>
											<div id="collapse_one" class="collapse show" data-parent="#sb_category_accordion">
												<div class="card-body p-0">
													<ul class="ul_li_block clearfix">
														<li><a href="#!">Lights</a></li>
														<li><a href="#!">Raincoats</a></li>
														<li><a href="#!">Shorts</a></li>
														<li><a href="#!">Pants</a></li>
														<li><a href="#!">Shirts</a></li>
														<li><a href="#!">Tires</a></li>
													</ul>
												</div>
											</div>
										</div>

										<div class="card">
											<div class="card-header">
												<a class="collapsed" data-toggle="collapse" href="#collapse_two">
													Android VR  (36)
												</a>
											</div>
											<div id="collapse_two" class="collapse" data-parent="#sb_category_accordion">
												<div class="card-body p-0">
													<ul class="ul_li_block clearfix">
														<li><a href="#!">Lights</a></li>
														<li><a href="#!">Raincoats</a></li>
														<li><a href="#!">Shorts</a></li>
														<li><a href="#!">Pants</a></li>
														<li><a href="#!">Shirts</a></li>
														<li><a href="#!">Tires</a></li>
													</ul>
												</div>
											</div>
										</div>

										<div class="card">
											<div class="card-header">
												<a class="collapsed" data-toggle="collapse" href="#collapse_three">
													iOS VR (8)
												</a>
											</div>
											<div id="collapse_three" class="collapse" data-parent="#sb_category_accordion">
												<div class="card-body p-0">
													<ul class="ul_li_block clearfix">
														<li><a href="#!">Lights</a></li>
														<li><a href="#!">Raincoats</a></li>
														<li><a href="#!">Shorts</a></li>
														<li><a href="#!">Pants</a></li>
														<li><a href="#!">Shirts</a></li>
														<li><a href="#!">Tires</a></li>
													</ul>
												</div>
											</div>
										</div>
										
										<div class="card">
											<div class="card-header">
												<a class="collapsed" data-toggle="collapse" href="#collapse_four">
													Video Consoles (18)
												</a>
											</div>
											<div id="collapse_four" class="collapse" data-parent="#sb_category_accordion">
												<div class="card-body p-0">
													<ul class="ul_li_block clearfix">
														<li><a href="#!">Lights</a></li>
														<li><a href="#!">Raincoats</a></li>
														<li><a href="#!">Shorts</a></li>
														<li><a href="#!">Pants</a></li>
														<li><a href="#!">Shirts</a></li>
														<li><a href="#!">Tires</a></li>
													</ul>
												</div>
											</div>
										</div>
										
										<div class="card">
											<div class="card-header">
												<a class="collapsed" data-toggle="collapse" href="#collapse_five">
													Accesories (31)
												</a>
											</div>
											<div id="collapse_five" class="collapse" data-parent="#sb_category_accordion">
												<div class="card-body p-0">
													<ul class="ul_li_block clearfix">
														<li><a href="#!">Lights</a></li>
														<li><a href="#!">Raincoats</a></li>
														<li><a href="#!">Shorts</a></li>
														<li><a href="#!">Pants</a></li>
														<li><a href="#!">Shirts</a></li>
														<li><a href="#!">Tires</a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="sb_widget sb_pricing_range">
									<h3 class="sb_widget_title text-uppercase">Filters</h3>
									<form action="#">
										<div class="price-range-area clearfix">
											<div id="slider-range" class="slider-range"></div>
											<div class="price-text d-flex align-items-center">
												<span>Price:</span>
												<input type="text" id="amount" readonly>
											</div>
										</div>
									</form>
								</div>

								<div class="sb_widget sb_color_checkbox">
									<h3 class="sb_widget_title text-uppercase">Brands</h3>
									<form action="#">
										<ul class="ul_li_block clearfix">
											<li>
												<div class="checkbox_item">
													<input id="oculus_rift_checkbox" type="checkbox" checked>
													<label for="oculus_rift_checkbox">Oculus Rift</label>
												</div>
											</li>
											<li>
												<div class="checkbox_item">
													<input id="huawei_checkbox" type="checkbox">
													<label for="huawei_checkbox">Huawei</label>
												</div>
											</li>
											<li>
												<div class="checkbox_item">
													<input id="htc_checkbox" type="checkbox">
													<label for="htc_checkbox">HTC</label>
												</div>
											</li>
											<li>
												<div class="checkbox_item">
													<input id="samsung_checkbox" type="checkbox">
													<label for="samsung_checkbox">Samsung</label>
												</div>
											</li>
											<li>
												<div class="checkbox_item">
													<input id="envato_checkbox" type="checkbox">
													<label for="envato_checkbox">Envato</label>
												</div>
											</li>
										</ul>
									</form>
								</div>

								<div class="sb_widget sb_color_checkbox">
									<h3 class="sb_widget_title text-uppercase">Color</h3>
									<form action="#">
										<ul class="ul_li_block clearfix">
											<li>
												<div class="checkbox_item">
													<input id="black_color_checkbox" type="checkbox" checked>
													<label for="black_color_checkbox">Black</label>
												</div>
											</li>
											<li>
												<div class="checkbox_item">
													<input id="white_color_checkbox" type="checkbox">
													<label for="white_color_checkbox">White</label>
												</div>
											</li>
											<li>
												<div class="checkbox_item">
													<input id="blue_color_checkbox" type="checkbox">
													<label for="blue_color_checkbox">Blue</label>
												</div>
											</li>
											<li>
												<div class="checkbox_item">
													<input id="green_color_checkbox" type="checkbox">
													<label for="green_color_checkbox">Green</label>
												</div>
											</li>
											<li>
												<div class="checkbox_item">
													<input id="yellow_color_checkbox" type="checkbox">
													<label for="yellow_color_checkbox">Yellow</label>
												</div>
											</li>
										</ul>
									</form>
								</div>
							</aside> --}}
						</div> 

					</div>
				</div>
			</section>
@endsection
