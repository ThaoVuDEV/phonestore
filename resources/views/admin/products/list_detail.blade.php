@extends('admin.layouts.master')
@section('title')
    List Products Iphone
@endsection
@section('content')
    <div class="w-full mt-12">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> List Products Iphone
        </p>
        <!-- Form Tìm Kiếm -->
        <div class="mb-4">
            <input type="text" id="search-input" placeholder="Tìm kiếm sản phẩm..."
                class="w-full px-4 py-2 border border-gray-300 rounded-l-lg">
        </div>
        <div class="mt-4 gap-4">
            <button type="submit"
                class="inline-block text-indigo-600 hover:bg-red-600 hover:text-white focus:outline-none delete-btn bg-transparent border border-red-500 rounded-full px-3 py-1 mb-4">
                <a href="{{ route('products.index') }}">List</a>
            </button>
        </div>
        <div class="bg-white overflow-auto">
            <table id="products-table" class="text-left w-full border-collapse">
                <thead>
                    <tr>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            ID</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            PRODUCT</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            NAME</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            PRICE</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            STOCK</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            IMAGE</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productDetail as $index => $item)
                        <tr class="hover:bg-grey-lighter">
                            <td class="py-4 px-6 border-b border-grey-light">{{ $item->id }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $item->product_name }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $item->name }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $item->price }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $item->stock }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">
                                @php
                                    $images = json_decode($item->image, true) ?? [];
                                @endphp
                                <div class="relative w-32">
                                    <div class="overflow-hidden" style="width: 150px;">
                                        @if (!empty($images) && is_array($images))
                                            <div class="flex transition-transform duration-300" id="image-slider-{{ $index }}" style="width: {{ count($images) * 100 }}%;">
                                                @foreach ($images as $image)
                                                    <img src="{{ asset('storage/uploads/' . basename($image)) }}" alt="Hình ảnh sản phẩm" class="w-32 h-32 mx-2 gap-2">
                                                @endforeach
                                            </div>
                                        @else
                                            <p>Không có hình ảnh để hiển thị.</p>
                                        @endif
                                    </div>
                                    @if (count($images) > 0)
                                        <div class="absolute inset-y-0 left-0 flex items-center" style="margin-left: -40px;"> <!-- Thêm khoảng cách margin -->
                                            <button
                                                class="bg-gray-800 text-white p-2 rounded-r"
                                                onclick="slide(-1, {{ $index }})">
                                                &lt;
                                            </button>
                                        </div>
                                        <div class="absolute inset-y-0 right-0 flex items-center" style="margin-right: -40px;"> <!-- Thêm khoảng cách margin -->
                                            <button
                                                class="bg-gray-800 text-white p-2 rounded-l"
                                                onclick="slide(1, {{ $index }})">
                                                &gt;
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            </td>
                            

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function slide(direction, index) {
            const slider = document.getElementById('image-slider-' + index);
            const images = slider.children;
            const totalImages = images.length;
            const imageWidth = images[0].clientWidth;
            const maxIndex = totalImages - 1;

            slider.index = slider.index || 0;
            slider.index += direction;

            if (slider.index < 0) {
                slider.index = maxIndex;
            } else if (slider.index > maxIndex) {
                slider.index = 0;
            }

            const offset = -slider.index * (imageWidth + 16); // Adjust for image width and margin
            slider.style.transform = `translateX(${offset}px)`;
        }
    </script>
@endsection
