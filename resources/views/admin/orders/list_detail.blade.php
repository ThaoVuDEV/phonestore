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
                <a href="{{ route('orders.index') }}">List</a>
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
                            Tên sản phẩm</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            Số lượng</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            Giá sản phẩm</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            Tổng tiền sản phẩm</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ordersDetail as $index => $item)
                        <tr class="hover:bg-grey-lighter">
                            <td class="py-4 px-6 border-b border-grey-light">{{ $item->id }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $item->variant->product->name }} {{ $item->variant->color->name }} {{ $item->variant->capacity->value }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $item->quantity }} </td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $item->price }} VNĐ</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $item->subtotal }}VNĐ</td>
                           
                            

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
