@extends('client.layouts.master')
@section('title')
    Chi tiết sản phẩm
@endsection
@section('content')




    <!-- breadcrumb_section - start
                                                                                                                                                                                                                               ================================================== -->
    <div class="container maxw_1600">
        <div class="f2_breadcrumb_nav_wrap mt-0 sec_ptb_50">
            <ul class="ce_breadcrumb_nav ul_li clearfix">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Shop</li>
                <li>Electronic</li>
                <li>{{ $proDetail->name }}</li>
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
                        <div class="tab-content" id="product-images">
                            @php
                                $images = $proDetail->productVariants->first()
                                    ? json_decode($proDetail->productVariants->first()->image, true)
                                    : [];
                            @endphp

                            @if (count($images) > 0)
                                @foreach ($images as $index => $image)
                                    <div id="di_tab_{{ $index + 1 }}"
                                        class="tab-pane {{ $index === 0 ? 'active' : 'fade' }}">
                                        <div class="image_wrap">
                                            <img src="{{ asset('storage/uploads/' . basename($image)) }}"
                                                alt="image_not_found">
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div id="di_tab_1" class="tab-pane active">
                                    <div class="image_wrap">
                                        <img src="{{ asset('path/to/default/image.png') }}" alt="image_not_found">
                                    </div>
                                </div>
                            @endif
                        </div>

                        <ul class="nav ul_li clearfix" id="image-tabs" role="tablist">
                            @if (count($images) > 0)
                                @foreach ($images as $index => $image)
                                    <li>
                                        <a class="{{ $index === 0 ? 'active' : '' }}" data-toggle="tab"
                                            href="#di_tab_{{ $index + 1 }}">
                                            <img src="{{ asset('storage/uploads/' . basename($image)) }}"
                                                alt="image_not_found">
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="details_content">
                        <div class="d-flex align-items-center justify-content-between mb_15">
                            <span class="item_brand text-uppercase">
                                <img src="{{ asset('assets/images/details/electronic/brand_01.png') }}"
                                    alt="image_not_found">
                                {{ $proDetail->category->parent->name }}
                            </span>
                            <span class="instock_text" id="stock-status"
                                data-stock="{{ $proDetail->productVariants->first()->stock }}">
                                Tình trạng: <strong id="stock-text"
                                    data-text-color="{{ $proDetail->productVariants->first()->stock > 0 ? '#5bb300' : '#ff0000' }}">
                                    {{ $proDetail->productVariants->first()->stock > 0 ? 'Còn hàng' : 'Hết hàng' }}
                                </strong>
                            </span>

                        </div>
                        <h2 class="item_title mb_15">{{ $proDetail->name }}</h2>
                        <div class="rating_review_wrap d-flex align-items-center clearfix">
                            <ul class="rating_star ul_li">
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                            </ul>
                            <button type="button" class="add_review_btn">Đọc tất cả 3 đánh giá</button>
                        </div>
                        <hr>
                        <ul class="product_info_list ul_li_block mb_15 clearfix">
                            <li>{{ $proDetail->description }}</li>
                        </ul>
                        <p class="mb-2">
                            Nullam mollis vel ipsum sit amet fringilla. Suspendisse mattis tortor a dui euismod finibus ac
                            eget metus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis
                            egestas.
                        </p>

                        <!-- Button chọn màu sắc -->
                        <div class="mb_15">
                            <label for="color" class="font-bold">Màu sắc</label>
                            <div id="color" class="flex flex-col attribute-group">
                                @foreach ($colors as $color)
                                    <input type="button" value="{{ $color->name }}" data-id="{{ $color->id }}"
                                        class="btn btn-outline-primary attribute-btn">
                                @endforeach
                            </div>
                        </div>

                        <!-- Button chọn dung lượng -->
                        <div class="mb_15">
                            <label for="capacity" class="font-bold">Dung lượng</label>
                            <div id="capacity" class="flex flex-col attribute-group">
                                @foreach ($capacities as $capacity)
                                    <input type="button" value="{{ $capacity->value }}" data-id="{{ $capacity->id }}"
                                        class="btn btn-outline-primary attribute-btn">
                                @endforeach
                            </div>
                        </div>

                        <span class="item_price mb_15 d-flex align-items-center">
                            <strong id="price">{{ $proDetail->productVariants->first()->price }} VNĐ</strong>
                            <del id="original-price"></del>
                        </span>

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
                            <li><a id="add-to-cart" class="custom_btn bg_electronic_blue"><i
                                        class="fas fa-cart-arrow-down mr-2"></i>Thêm vào giỏ</a></li>
                        </ul>

                        <!-- Hidden fields to store selected variant information -->
                        <input type="hidden" id="selected-variant-id"
                            value="{{ $proDetail->productVariants->first()->id }}">
                        <input type="hidden" id="selected-variant-price"
                            value="{{ $proDetail->productVariants->first()->price }}">
                        <input type="hidden" id="selected-variant-original-price"
                            value="{{ $proDetail->productVariants->first()->price }}">

                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                        <script>
                            $(document).ready(function() {
                                let selectedAttributes = {};
                                let selectedVariant = null;

                                function updateVariant() {
                                    const colorId = selectedAttributes.color_id || '';
                                    const capacityId = selectedAttributes.capacity_id || '';
                                    const productId = "{{ $proDetail->id }}"; // Lấy product_id từ PHP

                                    // Kiểm tra nếu tất cả các thuộc tính đã được chọn
                                    if (colorId && capacityId) {
                                        $.ajax({
                                            url: "{{ route('getProductVariant') }}",
                                            type: 'POST',
                                            data: JSON.stringify({
                                                product_id: productId, // Thêm product_id vào dữ liệu gửi đi
                                                color_id: colorId,
                                                capacity_id: capacityId
                                            }),
                                            contentType: 'application/json',
                                            headers: {
                                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                            },
                                            success: function(data) {
                                                console.log('Response data:', data); // Kiểm tra dữ liệu phản hồi
                                                const variant = data.variant;
                                                if (variant) {
                                                    selectedVariant = variant;
                                                    $('#price').text(` ${variant.price} VNĐ`);
                                                    $('#original-price').text(`${variant.original_price}`);
                                                    $('#stock').text(`${variant.stock}`);
                                                    updateStockStatus(variant.stock);
                                                    updateImages(variant.images);

                                                } else {
                                                    $('#price').text('Hết hàng');
                                                    $('#stock').text('0');
                                                    updateStockStatus(0);
                                                }
                                            },
                                            error: function(xhr, status, error) {
                                                console.error('Error:', xhr.responseText); // Xem phản hồi lỗi chi tiết
                                                alert('Đã xảy ra lỗi khi tải dữ liệu. Vui lòng thử lại sau.');
                                            }
                                        });
                                    } else {
                                        // Không gửi dữ liệu nếu chưa chọn đủ thuộc tính
                                        $('#price').text('');
                                        $('#stock').text('');
                                    }
                                }

                                function updateCart() {
                                    $.ajax({
                                        url: "{{ route('showCart') }}",
                                        type: 'GET',
                                        success: function(response) {
                                            if (response.html) {
                                                $('#cart-items').html(response.html);
                                                location.reload();
                                            } else {
                                                console.error('No HTML content returned.');
                                            }
                                        },
                                        error: function(xhr, status, error) {
                                            console.error('Error:', xhr.responseText);
                                        }
                                    });
                                }

                                function updateStockStatus(stock) {
                                    if (stock > 0) {
                                        $('#stock-status').attr('data-stock', stock);
                                        $('#stock-text').text('Còn hàng').css('color', '#5bb300');
                                    } else {
                                        $('#stock-status').attr('data-stock', stock);
                                        $('#stock-text').text('Hết hàng').css('color', '#ff0000');
                                    }
                                }

                                function updateImages(images) {
                                    let imageTabs = $('#image-tabs');
                                    let tabContent = $('#product-images');

                                    imageTabs.empty();
                                    tabContent.empty();

                                    if (images && images.length > 0) {
                                        images.forEach((image, index) => {
                                            const imageName = image.substring(image.lastIndexOf('/') +
                                                1); // Lấy tên ảnh từ đường dẫn
                                            const imageUrl = `{{ asset('storage/uploads/') }}/${imageName}`;
                                            const tabId = `di_tab_${index + 1}`;
                                            imageTabs.append(`
                                                <li>
                                                    <a class="${index === 0 ? 'active' : ''}" data-toggle="tab" href="#${tabId}">
                                                        <img src="${imageUrl}" alt="image_not_found">
                                                    </a>
                                                </li>
                                            `);
                                            tabContent.append(`
                                            <div id="${tabId}" class="tab-pane ${index === 0 ? 'active' : 'fade'}">
                                                    <div class="image_wrap">
                                                        <img src="${imageUrl}" alt="image_not_found">
                                                    </div>
                                                </div>
                                            `);
                                            });
                                    } else {
                                        const defaultImage = "{{ asset('storage/uploads/default.png') }}";
                                        imageTabs.append(`
                                            <li>
                                                <a class="active" data-toggle="tab" href="#di_tab_1">
                                                    <img src="${defaultImage}" alt="image_not_found">
                                                </a>
                                            </li>
                                        `);
                                        tabContent.append(`
                                            <div id="di_tab_1" class="tab-pane active">
                                                <div class="image_wrap">
                                                    <img src="${defaultImage}" alt="image_not_found">
                                                </div>
                                            </div>
                                        `);
                                    }
                                }

                                $('.attribute-btn').on('click', function() {
                                    const type = $(this).parent().attr('id');
                                    const id = $(this).data('id');
                                    selectedAttributes[`${type}_id`] = id;

                                    $(`#${type} .btn`).removeClass('active');
                                    $(this).addClass('active');

                                    updateVariant();
                                });

                                $('#add-to-cart').on('click', function(e) {
                                    e.preventDefault();

                                    let variantId = selectedVariant ? selectedVariant.id : null;
                                    let quantity = $('.input_number').val();
                                    let price = parseFloat($('#price').text().replace('Giá: ', '')); // Lấy giá sản phẩm

                                    if (variantId) {
                                        // Tính tổng tiền
                                        let totalPrice = price * quantity;

                                        $.ajax({
                                            url: "{{ route('addToCart') }}",
                                            type: 'POST',
                                            data: {
                                                variant_id: variantId,
                                                quantity: quantity,
                                                total_price: totalPrice,
                                                price: price,
                                                _token: '{{ csrf_token() }}'
                                            },
                                            success: function(response) {
                                                if (response.success) {
                                                    Swal.fire({
                                                        icon: 'success',
                                                        title: 'Thành công',
                                                        text: response.success,
                                                        confirmButtonText: 'OK'
                                                    }).then(() => {
                                                        // Cập nhật giỏ hàng
                                                        updateCart();
                                                    });
                                                }
                                            },
                                            error: function(xhr, status, error) {
                                                if (xhr.status === 403) {
                                                    Swal.fire({
                                                        icon: 'error',
                                                        title: 'Lỗi',
                                                        text: 'Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.',
                                                        confirmButtonText: 'Đăng nhập'
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            window.location.href =
                                                                "{{ route('user.login') }}"; // Chuyển hướng đến trang đăng nhập
                                                        }
                                                    });
                                                } else {
                                                    Swal.fire({
                                                        icon: 'error',
                                                        title: 'Lỗi',
                                                        text: 'Đã xảy ra lỗi khi thêm vào giỏ hàng.',
                                                        confirmButtonText: 'OK'
                                                    });
                                                }
                                            }
                                        });
                                    } else {
                                        Swal.fire({
                                            icon: 'warning',
                                            title: 'Cảnh báo',
                                            text: 'Vui lòng chọn sản phẩm',
                                            confirmButtonText: 'OK'
                                        });
                                    }
                                });
                            });
                        </script>
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="product_tag_list d-flex align-items-center clearfix">
                                    <h4 class="list_title">Tags:</h4>
                                    <ul class="ul_li clearfix">
                                        <li><a href="#!">Nhanh</a></li>
                                        <li><a href="#!">Chơi game</a></li>
                                        <li><a href="#!">Mạnh</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-5">
                                <div class="product_category_list d-flex align-items-center clearfix">
                                    <h4 class="list_title">Danh mục:</h4>
                                    <ul class="ul_li clearfix">
                                        <li><a href="#!">Giảm giá 50%</a></li>
                                        <li><a href="#!">Chơi game</a></li>
                                        <li><a href="#!">Máy tính để bàn</a></li>
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
                            Praesent ornare, ex a interdum consectetur, lectus diam sodales elit, vitae egestas est enim
                            ornare nisl. Nullam in lectus nec sem semper viverra. In lobortis egestas massa. Nam nec massa
                            nisi. Suspendisse potenti. Quisque suscipit vulputate dui quis volutpat. Ut id elit facilisis,
                            feugiat est in, tempus lacus. Ut ultrices dictum metus, a ultricies ex vulputate ac. Ut id
                            cursus tellus, non tempor quam. Morbi porta diam nisi, id finibus nunc tincidunt eu.
                        </p>
                        <div class="row mb_15 justify-content-lg-between">
                            <div class="col-lg-6">
                                <div class="description_image mb_30">
                                    <img src="{{ asset('assets/images/details/electronic/img_06.jpg') }}"
                                        alt="image_not_found">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="description_content">
                                    <h4 class="title_text mb_15">Wireless</h4>
                                    <p class="mb_30">
                                        Fusce vitae nibh mi. Integer posuere, libero et ullamcorper facilisis, enim eros
                                        tincidunt orci, eget vestibulum sapien nisi ut leo. Cras finibus vel est ut mollis.
                                    </p>

                                    <h4 class="title_text mb_15">Fresh Design</h4>
                                    <p class="mb_30">
                                        Integer bibendum aliquet ipsum, in ultrices enim sodales sed. Quisque ut urna vitae
                                        lacus laoreet malesuada eu at massa. Pellentesque nibh augue, pellentesque nec
                                        dictum vel, pretium a arcu. Duis eu urna suscipit, lobortis elit quis, ullamcorper
                                        massa.
                                    </p>

                                    <h4 class="title_text mb_15">Fabolous Sound</h4>
                                    <p class="mb_30">
                                        Cras rutrum, nibh a sodales accumsan, elit sapien ultrices sapien, eget semper
                                        lectus ex congue elit. Nullam dui elit, fermentum a varius at, iaculis non dolor. In
                                        hac habitasse platea dictumst.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="description_image mb_30">
                            <img src="{{ asset('assets/images/details/electronic/img_07.jpg') }}" alt="image_not_found">
                            <a class="play_btn" href="http://www.youtube.com/watch?v=0O2aH4XLbto">
                                <i class="fas fa-play"></i>
                            </a>
                        </div>
                        <h4 class="title_text mb_15">Perfectly Done</h4>
                        <p class="mb_30">
                            Praesent ornare, ex a interdum consectetur, lectus diam sodales elit, vitae egestas est enim
                            ornare nisl. Nullam in lectus nec sem semper viverra. In lobortis egestas massa. Nam nec massa
                            nisi. Suspendisse potenti. Quisque suscipit vulputate dui quis volutpat. Ut id elit facilisis,
                            feugiat est in, tempus lacus. Ut ultrices dictum metus, a ultricies ex vulputate ac. Ut id
                            cursus tellus, non tempor quam. Morbi porta diam nisi, id finibus nunc tincidunt eu.
                        </p>
                    </div>

                    <div id="description_tab" class="tab-pane fade">
                        {{ $proDetail->description }}
                    </div>

                    <div id="specification_tab" class="tab-pane fade">
                        <h4 class="title_text mb_15">Perfectly Done</h4>
                        <p class="mb_30">
                            Praesent ornare, ex a interdum consectetur, lectus diam sodales elit, vitae egestas est enim
                            ornare nisl. Nullam in lectus nec sem semper viverra. In lobortis egestas massa. Nam nec massa
                            nisi. Suspendisse potenti. Quisque suscipit vulputate dui quis volutpat. Ut id elit facilisis,
                            feugiat est in, tempus lacus. Ut ultrices dictum metus, a ultricies ex vulputate ac. Ut id
                            cursus tellus, non tempor quam. Morbi porta diam nisi, id finibus nunc tincidunt eu.
                        </p>
                        <div class="row mb_15 justify-content-lg-between">
                            <div class="col-lg-6">
                                <div class="description_content">
                                    <h4 class="title_text mb_15">Wireless</h4>
                                    <p class="mb_30">
                                        Fusce vitae nibh mi. Integer posuere, libero et ullamcorper facilisis, enim eros
                                        tincidunt orci, eget vestibulum sapien nisi ut leo. Cras finibus vel est ut mollis.
                                    </p>

                                    <h4 class="title_text mb_15">Fresh Design</h4>
                                    <p class="mb_30">
                                        Integer bibendum aliquet ipsum, in ultrices enim sodales sed. Quisque ut urna vitae
                                        lacus laoreet malesuada eu at massa. Pellentesque nibh augue, pellentesque nec
                                        dictum vel, pretium a arcu. Duis eu urna suscipit, lobortis elit quis, ullamcorper
                                        massa.
                                    </p>

                                    <h4 class="title_text mb_15">Fabolous Sound</h4>
                                    <p class="mb_30">
                                        Cras rutrum, nibh a sodales accumsan, elit sapien ultrices sapien, eget semper
                                        lectus ex congue elit. Nullam dui elit, fermentum a varius at, iaculis non dolor. In
                                        hac habitasse platea dictumst.
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
                                <img src="{{ asset('assets/images/shop/electronic/img_02.png') }}" alt="image_not_found">
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
                                <img src="{{ asset('assets/images/shop/electronic/img_03.png') }}" alt="image_not_found">
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
                                <img src="{{ asset('assets/images/shop/electronic/img_04.png') }}" alt="image_not_found">
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
                                <img src="{{ 'assets/images/shop/electronic/img_05.png' }}" alt="image_not_found">
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
                                <img src="{{ asset('assets/images/shop/electronic/img_02.png') }}" alt="image_not_found">
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
                                <img src="{{ asset('assets/images/shop/electronic/img_03.png') }}" alt="image_not_found">
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
                                <img src="{{ asset('assets/images/shop/electronic/img_03.png') }}" alt="image_not_found">
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
                                <img src="{{ asset('assets/images/shop/electronic/img_03.png') }}" alt="image_not_found">
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
