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
                <li>{{ $proDetail->product->category->parent->name }}</li>
                <li>{{ $proDetail->product->category->name }}</li>
                <li> {{ $proDetail->product->name }}</li>
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
                                $images = json_decode($proDetail->image, true);
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
                                {{ $proDetail->product->category->parent->name }}
                            </span>
                            <span class="instock_text" id="stock-status" data-stock="{{ $proDetail->stock }}">
                                Tình trạng: <strong id="stock-text"
                                    data-text-color="{{ $proDetail->stock > 0 ? '#5bb300' : '#ff0000' }}">
                                    {{ $proDetail->stock > 0 ? 'Còn hàng' : 'Hết hàng' }}
                                </strong>
                            </span>

                        </div>
                        <h2 class="item_title mb_15">{{ $proDetail->product->name }}</h2>
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
                            <strong id="price">{{ $proDetail->price }} VNĐ</strong>



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
                        <input type="hidden" id="selected-variant-id" value="{{ $proDetail->id }}">
                        <input type="hidden" id="selected-variant-price" value="{{ $proDetail->price }}">
                        <input type="hidden" id="selected-variant-original-price" value="{{ $proDetail->price }}">

                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                        <script>
                            $(document).ready(function() {
                                let selectedAttributes = {};
                                let selectedVariant = null;

                                function updateVariant() {
                                    const colorId = selectedAttributes.color_id || '';
                                    const capacityId = selectedAttributes.capacity_id || '';
                                    const productId = "{{ $proDetail->product->id }}"; // Lấy product_id từ PHP

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
                                        $('#add-to-cart').prop('disabled', false); // Bỏ khóa nút "Thêm vào giỏ hàng"
                                    } else {
                                        $('#stock-status').attr('data-stock', stock);
                                        $('#stock-text').text('Hết hàng').css('color', '#ff0000');
                                        $('#add-to-cart').prop('disabled', true); // Khóa nút "Thêm vào giỏ hàng"
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
                                    let quantity = parseInt($('.input_number').val(),
                                        10); // Chuyển đổi số lượng thành số nguyên
                                    let price = parseFloat($('#price').text().replace('Giá: ', '').replace(' VNĐ',
                                        '')); // Lấy giá sản phẩm và loại bỏ ký tự không cần thiết
                                    let stock = parseInt($('#stock-status').attr('data-stock'),
                                        10); // Lấy số lượng tồn kho từ thuộc tính data

                                    if (variantId && quantity > 0) {
                                        // Kiểm tra số lượng không vượt quá tồn kho
                                        if (quantity > stock) {
                                            Swal.fire({
                                                icon: 'warning',
                                                title: 'Cảnh báo',
                                                text: `Số lượng không được vượt quá số lượng tồn kho (${stock}).`,
                                                confirmButtonText: 'OK'
                                            });
                                        } else if (stock === 0) {
                                            Swal.fire({
                                                icon: 'warning',
                                                title: 'Hết hàng',
                                                text: 'Sản phẩm này hiện tại đang hết hàng.',
                                                confirmButtonText: 'OK'
                                            });
                                        } else if (quantity <= 0) {
                                            Swal.fire({
                                                icon: 'warning',
                                                title: 'Cảnh báo',
                                                text: 'Số lượng phải lớn hơn 0.',
                                                confirmButtonText: 'OK'
                                            });
                                        } else {
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
                                        }
                                    } else {
                                        Swal.fire({
                                            icon: 'warning',
                                            title: 'Cảnh báo',
                                            text: 'Vui lòng chọn sản phẩm và nhập số lượng hợp lệ.',
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
                    {{-- <li>
                        <a class="active" data-toggle="tab" href="#accesories_tab">Accesories</a>
                    </li> --}}
                    <li>
                        <a class="active" data-toggle="tab" href="#description_tab">Description</a>
                    </li>
                    {{-- <li>
                        <a data-toggle="tab" href="#specification_tab">Specification</a>
                    </li> --}}
                    <li>
                        <a data-toggle="tab" href="#reviews_tab">Reviews</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <!-- Tab panes -->


                    <div id="description_tab" class="tab-pane fade active">
                        {{ $proDetail->product->description }}
                    </div>
                    <div id="reviews_tab" class="tab-pane fade">
                        @if (Auth::user())
                            <div>
                                <h2>Reviews</h2>
                                @foreach ($reviews as $review)
                                    <div class="review">
                                        <h3>{{ $review->subject }}</h3>
                                        <p>{{ $review->comment }}</p>
                                        <small>by {{ $review->user->name }} on
                                            {{ $review->created_at->format('d-m-Y') }}</small>
                                        <hr>
                                    </div>
                                @endforeach
                            </div>
                            <form action="{{ route('reviews.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $proDetail->product->id }}">

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <input type="text" name="name" placeholder="Your Name"
                                                value="{{ Auth::user()->name }}" required>
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form_item">
                                            <input type="email" name="email" placeholder="Your Email"
                                                value="{{ Auth::user()->email }}" required>
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>


                                </div>

                                <div class="form_item">
                                    <textarea name="message" placeholder="Your Message" required>{{ old('message') }}</textarea>
                                    @error('message')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="custom_btn bg_default_red text-uppercase">Submit
                                    Review</button>
                            </form>
                    </div>
                @else
                    <h1>Bạn hãy đăng nhập để bình luận</h1>
                    @endif
                </div>


            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('#review-form').on('submit', function(e) {
                    e.preventDefault(); // Ngăn không gửi form theo cách truyền thống

                    // Xóa các lỗi cũ
                    $('.text-danger').text('');

                    // Lấy dữ liệu từ form
                    let formData = $(this).serialize();

                    $.ajax({
                        url: $(this).attr('action'),
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Thành công',
                                    text: response.success,
                                    confirmButtonText: 'OK'
                                }).then(() => {
                                    // Xóa form sau khi gửi thành công
                                    $('#review-form')[0].reset();
                                    // Bạn có thể cập nhật danh sách bình luận ở đây nếu cần
                                });
                            } else if (response.errors) {
                                // Hiển thị lỗi
                                for (let [key, value] of Object.entries(response.errors)) {
                                    $(`#${key}-error`).text(value);
                                }
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', xhr.responseText);
                            Swal.fire({
                                icon: 'error',
                                title: 'Lỗi',
                                text: 'Đã xảy ra lỗi khi gửi bình luận. Vui lòng thử lại sau.',
                                confirmButtonText: 'OK'
                            });
                        }
                    });
                });
            });
        </script>
    </section>
    <!-- electronic_details - end
                                                                                                                                                                                                                                       ================================================== -->


    <!-- product_section - start
                                                                                                                                                                                                                                       ================================================== -->

    <!-- product_section - end
                                                                                                                                                                                                                                       ================================================== -->


@endsection
