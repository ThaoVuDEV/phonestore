@extends('client.layouts.master')
@section('title')
    Chi tiết sản phẩm
@endsection
@section('content')
    		<!-- sidebar mobile menu & sidebar cart - start
			================================================== -->
			<div class="sidebar-menu-wrapper">
				<div class="cart_sidebar">
					<button type="button" class="close_btn"><i class="fal fa-times"></i></button>

					<ul class="cart_items_list ul_li_block mb_30 clearfix">
						<li>
							<div class="item_image">
								<img src="assets/images/cart/img_01.jpg" alt="image_not_found">
							</div>
							<div class="item_content">
								<h4 class="item_title">Yellow Blouse</h4>
								<span class="item_price">$30.00</span>
							</div>
							<button type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button>
						</li>
						<li>
							<div class="item_image">
								<img src="assets/images/cart/img_01.jpg" alt="image_not_found">
							</div>
							<div class="item_content">
								<h4 class="item_title">Yellow Blouse</h4>
								<span class="item_price">$30.00</span>
							</div>
							<button type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button>
						</li>
						<li>
							<div class="item_image">
								<img src="assets/images/cart/img_01.jpg" alt="image_not_found">
							</div>
							<div class="item_content">
								<h4 class="item_title">Yellow Blouse</h4>
								<span class="item_price">$30.00</span>
							</div>
							<button type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button>
						</li>
					</ul>

					<ul class="total_price ul_li_block mb_30 clearfix">
						<li>
							<span>Subtotal:</span>
							<span>$90</span>
						</li>
						<li>
							<span>Vat 5%:</span>
							<span>$4.5</span>
						</li>
						<li>
							<span>Discount 20%:</span>
							<span>- $18.9</span>
						</li>
						<li>
							<span>Total:</span>
							<span>$75.6</span>
						</li>
					</ul>

					<ul class="btns_group ul_li_block clearfix">
						<li><a href="shop_cart.html">View Cart</a></li>
						<li><a href="shop_checkout.html">Checkout</a></li>
					</ul>
				</div>

				<div class="sidebar_mobile_menu">
					<button type="button" class="close_btn"><i class="fal fa-times"></i></button>

					<div class="msb_widget brand_logo text-center">
						<a href="index.html">
							<img src="assets/images/logo/logo_25_1x.png" srcset="assets/images/logo/logo_25_2x.png 2x" alt="logo_not_found">
						</a>
					</div>

					<div class="msb_widget mobile_menu_list clearfix">
						<h3 class="title_text mb_15 text-uppercase"><i class="far fa-bars mr-2"></i> Menu List</h3>
						<ul class="ul_li_block clearfix">
							<li class="active dropdown">
								<a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Home</a>
								<ul class="ul_li_block dropdown-menu">
									<li><a href="home_carparts.html">Carparts</a></li>
									<li><a href="home_classic_ecommerce.html">Classic Ecommerce</a></li>
									<li><a href="home_creative_onelook.html">Creative Onelook</a></li>
									<li><a href="home_electronic.html">Electronic</a></li>
									<li><a href="home_fashion.html">Fashion</a></li>
									<li><a href="home_fashion_minimal.html">Fashion Minimal</a></li>
									<li><a href="home_furniture.html">Furniture</a></li>
									<li><a href="home_gadget.html">Gadget</a></li>
									<li><a href="home_lookbook_creative.html">Lookbook Creative</a></li>
									<li><a href="home_lookbook_slide.html">Lookbook Slide</a></li>
									<li><a href="home_medical.html">Medical</a></li>
									<li><a href="home_modern.html">Modern</a></li>
									<li><a href="home_modern_minimal.html">Modern Minimal</a></li>
									<li><a href="home_motorcycle.html">Motorcycle</a></li>
									<li><a href="home_parallax_shop.html">Parallax Shop</a></li>
									<li><a href="home_simple_shop.html">Simple Shop</a></li>
									<li><a href="home_single_story_black.html">Single Story Black</a></li>
									<li><a href="home_single_story_white.html">Single Story White</a></li>
									<li><a href="home_sports.html">Sports</a></li>
									<li><a href="home_supermarket.html">Supermarket</a></li>
									<li><a href="home_watch.html">Watch</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
								<ul class="dropdown-menu">
									<li class="dropdown ul_li_block">
										<a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Carparts</a>
										<ul class="dropdown-menu ul_li_block">
											<li><a href="carparts_shop.html">Shop Page</a></li>
											<li><a href="carparts_shop_grid.html">Shop Grid</a></li>
											<li><a href="carparts_shop_list.html">Shop List</a></li>
											<li><a href="carparts_shop_details.html">Shop Details</a></li>
										</ul>
									</li>

									<li class="dropdown">
										<a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Classic Ecommerce</a>
										<ul class="dropdown-menu ul_li_block">
											<li><a href="classic_ecommerce_shop.html">Shop Page</a></li>
											<li><a href="classic_ecommerce_shop_details.html">Shop Details</a></li>
										</ul>
									</li>

									<li class="dropdown">
										<a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Electronic</a>
										<ul class="dropdown-menu ul_li_block">
											<li><a href="electronic_shop.html">Shop Page</a></li>
											<li><a href="electronic_shop_details.html">Shop Details</a></li>
										</ul>
									</li>

									<li class="dropdown">
										<a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Fashion</a>
										<ul class="dropdown-menu ul_li_block">
											<li><a href="fashion_shop.html">Shop Page</a></li>
											<li><a href="fashion_shop_details.html">Shop Details</a></li>
										</ul>
									</li>

									<li class="dropdown">
										<a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Fashion Minimal</a>
										<ul class="dropdown-menu ul_li_block">
											<li><a href="fashion_minimal_shop.html">Shop Page</a></li>
											<li><a href="fashion_minimal_shop_details.html">Shop Details</a></li>
										</ul>
									</li>

									<li class="dropdown">
										<a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Fashion Minimal</a>
										<ul class="dropdown-menu ul_li_block">
											<li><a href="fashion_minimal_shop.html">Shop Page</a></li>
											<li><a href="fashion_minimal_shop_details.html">Shop Details</a></li>
										</ul>
									</li>

									<li class="dropdown">
										<a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Furniture</a>
										<ul class="dropdown-menu ul_li_block">
											<li><a href="furniture_shop.html">Shop Page</a></li>
											<li><a href="furniture_shop_details.html">Shop Details</a></li>
										</ul>
									</li>

									<li class="dropdown">
										<a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gadget</a>
										<ul class="dropdown-menu ul_li_block">
											<li><a href="gadget_shop.html">Shop Page</a></li>
											<li><a href="gadget_shop_details.html">Shop Details</a></li>
										</ul>
									</li>

									<li class="dropdown">
										<a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Medical</a>
										<ul class="dropdown-menu ul_li_block">
											<li><a href="medical_shop.html">Shop Page</a></li>
											<li><a href="medical_shop_details.html">Shop Details</a></li>
										</ul>
									</li>

									<li class="dropdown">
										<a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Modern Minimal</a>
										<ul class="dropdown-menu ul_li_block">
											<li><a href="modern_minimal_shop.html">Shop Page</a></li>
											<li><a href="modern_minimal_shop_details.html">Shop Details</a></li>
										</ul>
									</li>

									<li class="dropdown">
										<a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Modern</a>
										<ul class="dropdown-menu ul_li_block">
											<li><a href="modern_shop.html">Shop Page</a></li>
											<li><a href="modern_shop_details.html">Shop Details</a></li>
										</ul>
									</li>

									<li class="dropdown">
										<a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Motorcycle</a>
										<ul class="dropdown-menu ul_li_block">
											<li><a href="motorcycle_shop_grid.html">Shop Grid</a></li>
											<li><a href="motorcycle_shop_list.html">Shop List</a></li>
											<li><a href="motorcycle_shop_details.html">Shop Details</a></li>
										</ul>
									</li>

									<li class="dropdown">
										<a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Simple Shop</a>
										<ul class="dropdown-menu ul_li_block">
											<li><a href="simple_shop.html">Shop Page</a></li>
											<li><a href="simple_shop_details.html">Shop Details</a></li>
										</ul>
									</li>

									<li class="dropdown">
										<a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sports</a>
										<ul class="dropdown-menu ul_li_block">
											<li><a href="sports_shop.html">Shop Page</a></li>
											<li><a href="sports_shop_details.html">Shop Details</a></li>
										</ul>
									</li>

									<li class="dropdown">
										<a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lookbook</a>
										<ul class="dropdown-menu ul_li_block">
											<li><a href="lookbook_creative_shop.html">Shop Page</a></li>
											<li><a href="lookbook_creative_shop_details.html">Shop Details</a></li>
										</ul>
									</li>

									<li class="dropdown">
										<a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop Other Pages</a>
										<ul class="dropdown-menu ul_li_block">
											<li><a href="#!"><del>Shop Page</del></a></li>
											<li><a href="shop_details.html">Shop Details</a></li>
										</ul>
									</li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
								<ul class="dropdown-menu">
									<li class="dropdown">
										<a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop Inner Pages</a>
										<ul class="dropdown-menu">
											<li><a href="shop_cart.html">Shopping Cart</a></li>
											<li><a href="shop_checkout.html">Checkout Step 1</a></li>
											<li><a href="shop_checkout_step2.html">Checkout Step 2</a></li>
											<li><a href="shop_checkout_step3.html">Checkout Step 3</a></li>
										</ul>
									</li>
									<li><a href="404.html">404 Page</a></li>
									<li class="dropdown">
										<a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blogs</a>
										<ul class="dropdown-menu">
											<li><a href="blog.html">Blog Page</a></li>
											<li><a href="blog_details.html">Blog Details</a></li>
										</ul>
									</li>
									<li class="dropdown">
										<a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Compare</a>
										<ul class="dropdown-menu">
											<li><a href="compare_1.html">Compare V.1</a></li>
											<li><a href="compare_2.html">Compare V.2</a></li>
										</ul>
									</li>
									<li class="dropdown">
										<a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Register</a>
										<ul class="dropdown-menu">
											<li><a href="login.html">Login</a></li>
											<li><a href="signup.html">Sign Up</a></li>
										</ul>
									</li>
								</ul>
							</li>
							<li><a href="contact.html">Conatct</a></li>    
						</ul>
					</div>

					<div class="user_info">
						<h3 class="title_text mb_30 text-uppercase"><i class="fas fa-user mr-2"></i> User Info</h3>
						<div class="profile_info clearfix">
							<div class="user_thumbnail">
								<img src="assets/images/meta/img_01.png" alt="thumbnail_not_found">
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

				<div class="overlay"></div>
			</div>
			<!-- sidebar mobile menu & sidebar cart - end
			================================================== -->


			<!-- breadcrumb_section - start
			================================================== -->
			<div class="container maxw_1600">
				<div class="f2_breadcrumb_nav_wrap mt-0 sec_ptb_50">
					<ul class="ce_breadcrumb_nav ul_li clearfix">
						<li><a href="#!">Home</a></li>
						<li>Shop</li>
						<li>Electronic</li>
						<li>Shop Details</li>
					</ul>
				</div>
			</div>
			<!-- breadcrumb_section - end
			================================================== -->


			<!-- electronic_details - start
			================================================== -->
			<section class="electronic_details clearfix">
				<div class="container maxw_1600">
					<div class="row mb_50 justify-content-lg-between">
						<div class="col-lg-5">
							<div class="details_image mb_30 position-relative">
								<div class="tab-content">
									<div id="di_tab_1" class="tab-pane active">
										<div class="image_wrap">
											<img src="assets/images/details/electronic/img_01.png" alt="image_not_found">
										</div>
									</div>
									<div id="di_tab_2" class="tab-pane fade">
										<div class="image_wrap">
											<img src="assets/images/details/electronic/img_01.png" alt="image_not_found">
										</div>
									</div>
									<div id="di_tab_3" class="tab-pane fade">
										<div class="image_wrap">
											<img src="assets/images/details/electronic/img_01.png" alt="image_not_found">
										</div>
									</div>
									<div id="di_tab_4" class="tab-pane fade">
										<div class="image_wrap">
											<img src="assets/images/details/electronic/img_01.png" alt="image_not_found">
										</div>
									</div>
								</div>
								<ul class="nav ul_li clearfix" role="tablist">
									<li>
										<a class="active" data-toggle="tab" href="#di_tab_1">
											<img src="assets/images/details/electronic/img_02.png" alt="image_not_found">
										</a>
									</li>
									<li>
										<a data-toggle="tab" href="#di_tab_2">
											<img src="assets/images/details/electronic/img_03.png" alt="image_not_found">
										</a>
									</li>
									<li>
										<a data-toggle="tab" href="#di_tab_3">
											<img src="assets/images/details/electronic/img_04.png" alt="image_not_found">
										</a>
									</li>
									<li>
										<a data-toggle="tab" href="#di_tab_4">
											<img src="assets/images/details/electronic/img_05.png" alt="image_not_found">
										</a>
									</li>
								</ul>
							</div>
						</div>

						<div class="col-lg-7">
							<div class="details_content">
								<div class="d-flex align-items-center justify-content-between mb_15">
									<span class="item_brand text-uppercase">
										<img src="assets/images/details/electronic/brand_01.png" alt="image_not_found">
										Smartphones
									</span>
									<span class="instock_text">Availability: <strong data-text-color="#5bb300">In stock</strong></span>
								</div>
								<h2 class="item_title mb_15">Ultra Wireless S50 Headphones S50</h2>
								<div class="rating_review_wrap d-flex align-items-center clearfix">
									<ul class="rating_star ul_li">
										<li><i class="fas fa-star"></i></li>
										<li><i class="fas fa-star"></i></li>
										<li><i class="fas fa-star"></i></li>
										<li><i class="fas fa-star"></i></li>
										<li><i class="fas fa-star"></i></li>
									</ul>
									<button type="button" class="add_review_btn">Read all 3 reviews</button>
								</div>
								<hr>
								<div class="action_btns d-flex align-items-center mb_15 clearfix">
									<a href="#!"><span><i class="far fa-retweet"></i></span> Compare</a>
									<a href="#!"><span><i class="far fa-heart"></i></span> Add to Wishlist</a>
								</div>
								<ul class="product_info_list ul_li_block mb_15 clearfix">
									<li>4.5 inch HD Touch Screen (1280 x 720)</li>
									<li>Android 4.4 KitKat OS</li>
									<li>1.4 GHz Quad Core™ Processor</li>
									<li>20 MP front and 28 megapixel CMOS rear camera</li>
								</ul>
								<p class="mb-2">
									Nullam mollis vel ipsum sit amet fringilla. Suspendisse mattis tortor a dui euismod finibus ac eget metus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. 
								</p>
								<span class="item_price mb_15 d-flex align-items-center"><strong>$1 215,00</strong> <del>$2 299,00</del></span>
								<ul class="btns_group ul_li mb_15 clearfix">
									<li>
										<div class="quantity_input">
											<form action="#">
												<input class="input_number" type="text" value="1">
												<span class="input_number_decrement">–</span>
												<span class="input_number_increment">+</span>
											</form>
										</div>
									</li>
									<li><a class="custom_btn bg_electronic_blue" href="#!"><i class="fas fa-cart-arrow-down mr-2"></i>Add to Cart</a></li>
									<li>
										<ul class="post_share ul_li clearfix">
											<li><a href="#!" data-text-color="#405aa6"><span><i class="fab fa-facebook-square mr-1"></i> Share</span> <small>0</small></a></li>
											<li><a href="#!" data-text-color="#00acee"><span><i class="fab fa-twitter-square mr-1"></i> Tweet</span> <small>0</small></a></li>
											<li><a href="#!" data-text-color="#bc1221"><span><i class="fab fa-pinterest-p mr-1"></i> Pin It</span></a></li>
										</ul>
									</li>
								</ul>
								<div class="row align-items-center">
									<div class="col-lg-5">
										<div class="product_tag_list d-flex align-items-center clearfix">
											<h4 class="list_title">Tags:</h4>
											<ul class="ul_li clearfix">
												<li><a href="#!">Fast</a></li>
												<li><a href="#!">Gaming</a></li>
												<li><a href="#!">Strong</a></li>
											</ul>
										</div>
									</div>

									<div class="col-lg-5">
										<div class="product_category_list d-flex align-items-center clearfix">
											<h4 class="list_title">Categories:</h4>
											<ul class="ul_li clearfix">
												<li><a href="#!">-50% Sale</a></li>
												<li><a href="#!">Gaming</a></li>
												<li><a href="#!">Desktop PC</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="electronic_details_description">
						<ul class="nav ul_li bg_electronic_blue" role="tablist">
							<li>
								<a class="active" data-toggle="tab" href="#accesories_tab">Accesories</a>
							</li>
							<li>
								<a data-toggle="tab" href="#description_tab">Description</a>
							</li>
							<li>
								<a data-toggle="tab" href="#specification_tab">Specification</a>
							</li>
							<li>
								<a data-toggle="tab" href="#reviews_tab">Reviews</a>
							</li>
						</ul>

						<!-- Tab panes -->
						<div class="tab-content">
							<div id="accesories_tab" class="tab-pane active">
								<h4 class="title_text mb_15">Perfectly Done</h4>
								<p class="mb_30">
									Praesent ornare, ex a interdum consectetur, lectus diam sodales elit, vitae egestas est enim ornare nisl. Nullam in lectus nec sem semper viverra. In lobortis egestas massa. Nam nec massa nisi. Suspendisse potenti. Quisque suscipit vulputate dui quis volutpat. Ut id elit facilisis, feugiat est in, tempus lacus. Ut ultrices dictum metus, a ultricies ex vulputate ac. Ut id cursus tellus, non tempor quam. Morbi porta diam nisi, id finibus nunc tincidunt eu. 
								</p>
								<div class="row mb_15 justify-content-lg-between">
									<div class="col-lg-6">
										<div class="description_image mb_30">
											<img src="assets/images/details/electronic/img_06.jpg" alt="image_not_found">
										</div>
									</div>

									<div class="col-lg-6">
										<div class="description_content">
											<h4 class="title_text mb_15">Wireless</h4>
											<p class="mb_30">
												Fusce vitae nibh mi. Integer posuere, libero et ullamcorper facilisis, enim eros tincidunt orci, eget vestibulum sapien nisi ut leo. Cras finibus vel est ut mollis. 
											</p>

											<h4 class="title_text mb_15">Fresh Design</h4>
											<p class="mb_30">
												Integer bibendum aliquet ipsum, in ultrices enim sodales sed. Quisque ut urna vitae lacus laoreet malesuada eu at massa. Pellentesque nibh augue, pellentesque nec dictum vel, pretium a arcu. Duis eu urna suscipit, lobortis elit quis, ullamcorper massa. 
											</p>

											<h4 class="title_text mb_15">Fabolous Sound</h4>
											<p class="mb_30">
												Cras rutrum, nibh a sodales accumsan, elit sapien ultrices sapien, eget semper lectus ex congue elit. Nullam dui elit, fermentum a varius at, iaculis non dolor. In hac habitasse platea dictumst. 
											</p>
										</div>
									</div>
								</div>

								<div class="description_image mb_30">
									<img src="assets/images/details/electronic/img_07.jpg" alt="image_not_found">
									<a class="play_btn" href="http://www.youtube.com/watch?v=0O2aH4XLbto">
										<i class="fas fa-play"></i>
									</a>
								</div>
								<h4 class="title_text mb_15">Perfectly Done</h4>
								<p class="mb_30">
									Praesent ornare, ex a interdum consectetur, lectus diam sodales elit, vitae egestas est enim ornare nisl. Nullam in lectus nec sem semper viverra. In lobortis egestas massa. Nam nec massa nisi. Suspendisse potenti. Quisque suscipit vulputate dui quis volutpat. Ut id elit facilisis, feugiat est in, tempus lacus. Ut ultrices dictum metus, a ultricies ex vulputate ac. Ut id cursus tellus, non tempor quam. Morbi porta diam nisi, id finibus nunc tincidunt eu. 
								</p>
							</div>

							<div id="description_tab" class="tab-pane fade">
								<div class="row mb_15 justify-content-lg-between">
									<div class="col-lg-6">
										<div class="description_image mb_30">
											<img src="assets/images/details/electronic/img_06.jpg" alt="image_not_found">
										</div>
									</div>

									<div class="col-lg-6">
										<div class="description_content">
											<h4 class="title_text mb_15">Wireless</h4>
											<p class="mb_30">
												Fusce vitae nibh mi. Integer posuere, libero et ullamcorper facilisis, enim eros tincidunt orci, eget vestibulum sapien nisi ut leo. Cras finibus vel est ut mollis. 
											</p>

											<h4 class="title_text mb_15">Fresh Design</h4>
											<p class="mb_30">
												Integer bibendum aliquet ipsum, in ultrices enim sodales sed. Quisque ut urna vitae lacus laoreet malesuada eu at massa. Pellentesque nibh augue, pellentesque nec dictum vel, pretium a arcu. Duis eu urna suscipit, lobortis elit quis, ullamcorper massa. 
											</p>

											<h4 class="title_text mb_15">Fabolous Sound</h4>
											<p class="mb_30">
												Cras rutrum, nibh a sodales accumsan, elit sapien ultrices sapien, eget semper lectus ex congue elit. Nullam dui elit, fermentum a varius at, iaculis non dolor. In hac habitasse platea dictumst. 
											</p>
										</div>
									</div>
								</div>

								<div class="description_image mb_30">
									<img src="assets/images/details/electronic/img_07.jpg" alt="image_not_found">
								</div>
								<h4 class="title_text mb_15">Perfectly Done</h4>
								<p class="mb_30">
									Praesent ornare, ex a interdum consectetur, lectus diam sodales elit, vitae egestas est enim ornare nisl. Nullam in lectus nec sem semper viverra. In lobortis egestas massa. Nam nec massa nisi. Suspendisse potenti. Quisque suscipit vulputate dui quis volutpat. Ut id elit facilisis, feugiat est in, tempus lacus. Ut ultrices dictum metus, a ultricies ex vulputate ac. Ut id cursus tellus, non tempor quam. Morbi porta diam nisi, id finibus nunc tincidunt eu. 
								</p>
							</div>

							<div id="specification_tab" class="tab-pane fade">
								<h4 class="title_text mb_15">Perfectly Done</h4>
								<p class="mb_30">
									Praesent ornare, ex a interdum consectetur, lectus diam sodales elit, vitae egestas est enim ornare nisl. Nullam in lectus nec sem semper viverra. In lobortis egestas massa. Nam nec massa nisi. Suspendisse potenti. Quisque suscipit vulputate dui quis volutpat. Ut id elit facilisis, feugiat est in, tempus lacus. Ut ultrices dictum metus, a ultricies ex vulputate ac. Ut id cursus tellus, non tempor quam. Morbi porta diam nisi, id finibus nunc tincidunt eu. 
								</p>
								<div class="row mb_15 justify-content-lg-between">
									<div class="col-lg-6">
										<div class="description_content">
											<h4 class="title_text mb_15">Wireless</h4>
											<p class="mb_30">
												Fusce vitae nibh mi. Integer posuere, libero et ullamcorper facilisis, enim eros tincidunt orci, eget vestibulum sapien nisi ut leo. Cras finibus vel est ut mollis. 
											</p>

											<h4 class="title_text mb_15">Fresh Design</h4>
											<p class="mb_30">
												Integer bibendum aliquet ipsum, in ultrices enim sodales sed. Quisque ut urna vitae lacus laoreet malesuada eu at massa. Pellentesque nibh augue, pellentesque nec dictum vel, pretium a arcu. Duis eu urna suscipit, lobortis elit quis, ullamcorper massa. 
											</p>

											<h4 class="title_text mb_15">Fabolous Sound</h4>
											<p class="mb_30">
												Cras rutrum, nibh a sodales accumsan, elit sapien ultrices sapien, eget semper lectus ex congue elit. Nullam dui elit, fermentum a varius at, iaculis non dolor. In hac habitasse platea dictumst. 
											</p>
										</div>
									</div>
								</div>

							</div>

							<div id="reviews_tab" class="tab-pane fade">
								<form action="#">
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
											<div class="form_item">
												<input type="text" name="name" placeholder="Your Name">
											</div>
										</div>

										<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
											<div class="form_item">
												<input type="email" name="email" placeholder="Your Email">
											</div>
										</div>

										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div class="form_item">
												<input type="text" name="subject" placeholder="Subject">
											</div>
										</div>
									</div>

									<div class="form_item">
										<textarea name="message" placeholder="Your Message"></textarea>
									</div>
									<button type="submit" class="custom_btn bg_default_red text-uppercase">Submit Review</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- electronic_details - end
			================================================== -->


			<!-- product_section - start
			================================================== -->
			<section class="product_section sec_ptb_100 clearfix">
				<div class="container maxw_1600">
					<div class="electronic_related_products position-relative">
						<h2 class="title_text mb_30">Related Products</h2>
						<div class="slideshow5_slider row" data-slick='{"dots": false}'>
							<div class="item col">
								<div class="electronic_product_item">
									<ul class="product_label ul_li clearfix">
										<li>-$30</li>
									</ul>
									<div class="item_image">
										<img src="assets/images/shop/electronic/img_02.png" alt="image_not_found">
									</div>
									<div class="item_content">
										<span class="item_name">Speakers</span>
										<h3 class="item_title">
											<a href="#!">Wireless Audio System Multiroom 360</a>
										</h3>
										<span class="item_price">$685.00</span>
									</div>
								</div>
							</div>

							<div class="item col">
								<div class="electronic_product_item">
									<ul class="product_label ul_li clearfix">
										<li>-$30</li>
									</ul>
									<div class="item_image">
										<img src="assets/images/shop/electronic/img_03.png" alt="image_not_found">
									</div>
									<div class="item_content">
										<span class="item_name">Speakers</span>
										<h3 class="item_title">
											<a href="#!">Wireless Audio System Multiroom 360</a>
										</h3>
										<span class="item_price">$685.00</span>
									</div>
								</div>
							</div>

							<div class="item col">
								<div class="electronic_product_item">
									<ul class="product_label ul_li clearfix">
										<li>-$30</li>
									</ul>
									<div class="item_image">
										<img src="assets/images/shop/electronic/img_04.png" alt="image_not_found">
									</div>
									<div class="item_content">
										<span class="item_name">Speakers</span>
										<h3 class="item_title">
											<a href="#!">Wireless Audio System Multiroom 360</a>
										</h3>
										<span class="item_price">$685.00</span>
									</div>
								</div>
							</div>

							<div class="item col">
								<div class="electronic_product_item">
									<ul class="product_label ul_li clearfix">
										<li>-$30</li>
									</ul>
									<div class="item_image">
										<img src="assets/images/shop/electronic/img_05.png" alt="image_not_found">
									</div>
									<div class="item_content">
										<span class="item_name">Speakers</span>
										<h3 class="item_title">
											<a href="#!">Wireless Audio System Multiroom 360</a>
										</h3>
										<span class="item_price">$685.00</span>
									</div>
								</div>
							</div>

							<div class="item col">
								<div class="electronic_product_item">
									<ul class="product_label ul_li clearfix">
										<li>-$30</li>
									</ul>
									<div class="item_image">
										<img src="assets/images/shop/electronic/img_02.png" alt="image_not_found">
									</div>
									<div class="item_content">
										<span class="item_name">Speakers</span>
										<h3 class="item_title">
											<a href="#!">Wireless Audio System Multiroom 360</a>
										</h3>
										<span class="item_price">$685.00</span>
									</div>
								</div>
							</div>

							<div class="item col">
								<div class="electronic_product_item">
									<ul class="product_label ul_li clearfix">
										<li>-$30</li>
									</ul>
									<div class="item_image">
										<img src="assets/images/shop/electronic/img_03.png" alt="image_not_found">
									</div>
									<div class="item_content">
										<span class="item_name">Speakers</span>
										<h3 class="item_title">
											<a href="#!">Wireless Audio System Multiroom 360</a>
										</h3>
										<span class="item_price">$685.00</span>
									</div>
								</div>
							</div>

							<div class="item col">
								<div class="electronic_product_item">
									<ul class="product_label ul_li clearfix">
										<li>-$30</li>
									</ul>
									<div class="item_image">
										<img src="assets/images/shop/electronic/img_04.png" alt="image_not_found">
									</div>
									<div class="item_content">
										<span class="item_name">Speakers</span>
										<h3 class="item_title">
											<a href="#!">Wireless Audio System Multiroom 360</a>
										</h3>
										<span class="item_price">$685.00</span>
									</div>
								</div>
							</div>

							<div class="item col">
								<div class="electronic_product_item">
									<ul class="product_label ul_li clearfix">
										<li>-$30</li>
									</ul>
									<div class="item_image">
										<img src="assets/images/shop/electronic/img_05.png" alt="image_not_found">
									</div>
									<div class="item_content">
										<span class="item_name">Speakers</span>
										<h3 class="item_title">
											<a href="#!">Wireless Audio System Multiroom 360</a>
										</h3>
										<span class="item_price">$685.00</span>
									</div>
								</div>
							</div>
						</div>
						<div class="carousel_nav">
							<button type="button" class="left_arrow5"><i class="fal fa-angle-left"></i></button>
							<button type="button" class="right_arrow5"><i class="fal fa-angle-right"></i></button>
						</div>
					</div>
				</div>
			</section>
			<!-- product_section - end
			================================================== -->


@endsection