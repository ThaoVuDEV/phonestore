@extends('admin.layouts.master')

@section('title')
    Edit Products
@endsection

@section('content')
    <div class="w-full mt-12">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> Sửa Sản Phẩm
        </p>
        <div class="bg-white overflow-auto">
            <div class="container mx-auto p-6">
                <form action="{{ route('products.update', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Danh mục -->
                    <div class="mb-4">
                        <label for="category" class="block text-sm font-medium text-gray-700">Danh Mục:</label>
                        <select name="category_id" id="category" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                            <option value="">Chọn danh mục</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Tên sản phẩm -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Tên Sản Phẩm:</label>
                        <input type="text" name="name" id="name" autocomplete="off" placeholder="Nhập tên sản phẩm"
                            value="{{ $product->name }}" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                    </div>

                    <!-- Mô tả sản phẩm -->
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Mô Tả Sản Phẩm:</label>
                        <textarea name="description" id="description" rows="3" class="mt-1 p-2 border border-gray-300 rounded-md w-full"
                            placeholder="Nhập mô tả sản phẩm">{{ $product->description }}</textarea>
                    </div>

                    <!-- Ảnh sản phẩm -->
                    <div class="mb-4">
                        <label for="image_pro" class="block text-sm font-medium text-gray-700">Ảnh Sản Phẩm:</label>
                        @if ($product->image)
                            <img src="{{ Storage::url($product->image) }}" alt="Current Product Image" class="mb-4" style="max-width: 150px;">
                        @endif
                        <input type="file" name="image_pro" id="image_pro" class="mt-1 p-2 border border-gray-300 rounded-md w-full" accept="image/*">
                    </div>

                    <!-- Chọn màu sắc -->
                    <div id="colors-section" class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Chọn Màu Sắc:</label>
                        <div id="colors-container">
                            @foreach ($colors as $color)
                                <div class="flex items-center space-x-2 mb-2">
                                    <input type="checkbox" name="variant_colors[]" value="{{ $color->id }}"
                                        class="color-checkbox" {{ in_array($color->id, $selectedColorIds) ? 'checked' : '' }}>
                                    <label>{{ $color->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Chọn dung lượng -->
                    <div id="capacities-section" class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Chọn Dung Lượng:</label>
                        <div id="capacities-container">
                            @foreach ($capacities as $capacity)
                                <div class="flex items-center space-x-2 mb-2">
                                    <input type="checkbox" name="variant_capacities[]" value="{{ $capacity->id }}"
                                        class="capacity-checkbox" {{ in_array($capacity->id, $selectedCapacityIds) ? 'checked' : '' }}>
                                    <label>{{ $capacity->value }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Thông tin biến thể -->
                    <div id="variant-details" class="space-y-4">
                        @foreach ($product->productVariants as $variant)
                            <div class="mb-4" data-variant-id="{{ $variant->id }}">
                                <label class="block text-sm font-medium text-gray-700">Biến Thể: {{ $variant->color->name }} {{ $variant->capacity->value }}</label>
                                <input type="hidden" name="variant_ids[]" value="{{ $variant->id }}">
                                <input type="number" name="variant_prices[{{ $variant->id }}]" placeholder="Nhập giá biến thể" value="{{ $variant->price }}" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                                <input type="number" name="variant_quantities[{{ $variant->id }}]" placeholder="Nhập số lượng" value="{{ $variant->stock }}" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                                <div class="space-y-2 mt-2">
                                    <label class="block text-sm font-medium text-gray-700">Hình ảnh:</label>
                                    @if ($variant->image)
                                        <img src="{{ Storage::url($variant->image) }}" alt="Current Variant Image" class="mb-2" style="max-width: 150px;">
                                    @endif
                                    <input type="file" name="variant_images[{{ $variant->id }}][]" class="p-2 border border-gray-300 rounded-md w-full" multiple>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <button type="submit" class="mt-4 px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">Cập Nhật Sản Phẩm</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const colorCheckboxes = document.querySelectorAll('.color-checkbox');
            const capacityCheckboxes = document.querySelectorAll('.capacity-checkbox');
            const variantDetails = document.getElementById('variant-details');

            function generateCombinations(selectedColors, selectedCapacities) {
                const combinations = [];
                selectedColors.forEach(color => {
                    selectedCapacities.forEach(capacity => {
                        combinations.push({
                            color,
                            capacity
                        });
                    });
                });
                return combinations;
            }

            function generateVariantFields() {
                variantDetails.innerHTML = ''; // Xóa các trường biến thể trước đó
                const selectedColors = []; // Lưu trữ các màu sắc đã chọn
                const selectedCapacities = []; // Lưu trữ các dung lượng đã chọn

                // Lấy các màu sắc đã được chọn
                document.querySelectorAll('.color-checkbox:checked').forEach(checkbox => {
                    selectedColors.push({
                        id: checkbox.value,
                        name: checkbox.nextElementSibling.textContent
                    });
                });

                // Lấy các dung lượng đã được chọn
                document.querySelectorAll('.capacity-checkbox:checked').forEach(checkbox => {
                    selectedCapacities.push({
                        id: checkbox.value,
                        value: checkbox.nextElementSibling.textContent
                    });
                });

                console.log('Selected Colors:', selectedColors); // Kiểm tra dữ liệu đã lấy
                console.log('Selected Capacities:', selectedCapacities); // Kiểm tra dữ liệu đã lấy

                // Tạo các biến thể dựa trên các giá trị màu sắc và dung lượng đã chọn
                const combinations = generateCombinations(selectedColors, selectedCapacities);

                combinations.forEach((combination, index) => {
                    const variantFieldset = document.createElement('fieldset');
                    variantFieldset.classList.add('border', 'border-gray-300', 'p-4', 'rounded-md',
                        'space-y-2');

                    // Tạo tên biến thể chỉ từ giá trị màu sắc và dung lượng
                    const combinationName = `${combination.color.name}, ${combination.capacity.value}`;

                    // Thêm tên biến thể vào form
                    variantFieldset.innerHTML = `
                        <legend class="text-sm font-medium text-gray-700">Biến Thể: ${combinationName}</legend>
                        <input type="hidden" name="variant_names[]" value="${combinationName}">
                        <input type="number" name="variant_prices[]" placeholder="Nhập giá biến thể" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                        <input type="number" name="variant_quantities[]" placeholder="Nhập số lượng" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                        <div class="space-y-2 mt-2">
                            <label class="block text-sm font-medium text-gray-700">Hình ảnh:</label>
                            <input type="file" name="variant_images[]" class="p-2 border border-gray-300 rounded-md w-full" multiple>
                        </div>
                    `;

                    variantDetails.appendChild(variantFieldset);
                });
            }

            colorCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', generateVariantFields);
            });

            capacityCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', generateVariantFields);
            });

            // Sinh biến thể ban đầu khi trang tải
            generateVariantFields();
        });
    </script>
@endsection
