<section class="product_section mb_50 clearfix">
    <div class="container maxw_1600">
        <div class="electronic_content_container">
            <div class="row justify-content-lg-between">

                <div class="col-lg-4">
                    <div class="electronic_deals_slider">
                        <div class="item_header">
                            <h2 class="title_text text-white mb-0"><strong>Deals</strong> of the week</h2>
                        </div>
                        <div class="weekly_deals_carousel position-relative">
                            <div class="slideshow1_slider" data-slick='{"dots": false}'>
                                @foreach ($dealOfTheWeek as $item)
                                    <div class="item">
                                        <div class="electronic_deals_item">
                                            <ul class="item_variations ul_li clearfix">
                                                @php
                                                    $images = json_decode($item->variant->image, true) ?? [];
                                                    $firstImage = !empty($images) ? $images[0] : 'default-image.jpg';
                                                @endphp
                                                @foreach ($images as $image)
                                                    <li>
                                                        <button type="button">
                                                            <img src="{{ asset('storage/uploads/' . basename($image)) }}"
                                                                alt="image_not_found">
                                                        </button>
                                                    </li>
                                                @endforeach

                                            </ul>
                                            <div class="item_price">
                                                <strong>{{ $item->variant->price }}</strong>
                                                <del>{{ $item->variant->price }}</del>
                                            </div>
                                            <h3 class="item_title mb-0">
                                                <a
                                                    href="#!">{{ $item->variant->product->name }}{{ $item->variant->capacity->value }}</a>
                                            </h3>
                                            <div class="item_image">
                                                <img src="{{ asset('storage/uploads/' . basename($firstImage)) }}"
                                                    alt="image_not_found">
                                            </div>
                                            <div class="countdown_wrap">
                                                <div class="countdown_content">
                                                    <h4>Nhanh lên!</h4>
                                                    <p>Đến hết:</p>
                                                </div>
                                                <ul class="list-unstyled d-flex gap-3" data-start-date="{{ $item->variant->start_date }}" data-end-date="{{ $item->end_date }}">
                                                    <li class="days">Days: 0</li>
                                                    <li class="hours">Hours: 0</li>
                                                    <li class="minutes">Minutes: 0</li>
                                                    <li class="seconds">Seconds: 0</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                               


                            </div>
                            <div class="carousel_nav clearfix">
                                <button type="button" class="left_arrow d-inline-block"><i
                                        class="fal fa-angle-left mr-1"></i> Previous deal</button>
                                <button type="button" class="right_arrow d-inline-block">Next deal <i
                                        class="fal fa-angle-right ml-1"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="electronic_product_group clearfix">
                        <ul class="electronic_tabs_nav nav ul_li_right clearfix">
                            <li><a class="active" data-toggle="tab" href="#featured_tab">Đặc sắc</a></li>
                            <li><a data-toggle="tab" href="#onsale_tab"> Đang giảm giá
                                </a></li>
                            {{-- <li><a data-toggle="tab" href="#toprated_tab">Sản phẩm bán chạy</a></li> --}}
                        </ul>
                        <div class="tab-content">
                            <div id="featured_tab" class="tab-pane fade active">
                                <ul class="electronic_product_columns ul_li has_4columns clearfix">
                                    @foreach ($proFeatured as $index => $item)
                                        <li>
                                            <div class="electronic_product_item">
                                                <ul class="product_label ul_li clearfix">
                                                    <li>-$30</li>
                                                </ul>
                                                <div class="item_image">
                                                    <img src="{{ asset('storage/products/' . basename($item->product->image)) }}"
                                                        alt="image_not_found">
                                                </div>
                                                <div class="item_content">
                                                    <span class="item_name">{{ $item->product->name }}</span>
                                                    <h3 class="item_title">
                                                        <a
                                                            href="{{ route('getProList', ['id' => $item->product->id]) }}">{{ $item->product->name }}</a>
                                                    </h3>
                                                    <span class="item_price">$685.00</span>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach



                                </ul>
                            </div>

                            <div id="onsale_tab" class="tab-pane fade">
                                <ul class="electronic_product_columns ul_li has_4columns clearfix">
                                    @foreach ($onSaleProducts as $item)
                                        <li>
                                            <div class="electronic_product_item">
                                                <ul class="product_label ul_li clearfix">
                                                    <li>-$30</li>
                                                </ul>
                                                <div class="item_image">
                                                    <img src="{{ asset('storage/products/' . basename($item->product->image)) }}"
                                                        alt="image_not_found">
                                                </div>
                                                <div class="item_content">
                                                    <span class="item_name">{{ $item->product->category->name }}</span>
                                                    <h3 class="item_title">
                                                        <a href="#!">{{ $item->product->name }}</a>
                                                    </h3>
                                                    <span class="item_price">{{ $item->special_price }}</span>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div id="toprated_tab" class="tab-pane fade">

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
