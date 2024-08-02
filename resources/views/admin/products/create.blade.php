@extends('admin.layouts.master')

@section('title')
    Create Products
@endsection

@section('content')
    <div class="w-full mt-12">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> Tạo Sản Phẩm
        </p>
        <div class="bg-white overflow-auto">
            <div class="container mx-auto p-6">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('POST')

                    <!-- Danh mục -->
                    <div class="mb-4">
                        <label for="category" class="block text-sm font-medium text-gray-700">Danh Mục:</label>
                        <select name="category_id" id="category" class="mt-1 p-2 border border-gray-300 rounded-md w-full"
                            required>
                            <option value="">Chọn danh mục</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Tên sản phẩm -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Tên Sản Phẩm:</label>
                        <input type="text" name="name" id="name" autocomplete="off"
                            placeholder="Nhập tên sản phẩm" class="mt-1 p-2 border border-gray-300 rounded-md w-full"
                            required>
                    </div>

                    <!-- Mô tả sản phẩm -->
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Mô Tả Sản Phẩm:</label>
                        <textarea name="description" id="description" rows="3" class="mt-1 p-2 border border-gray-300 rounded-md w-full"
                            placeholder="Nhập mô tả sản phẩm"></textarea>
                    </div>

                    <!-- Ảnh đại diện -->
                    <div class="mb-4">
                        <label for="image" class="block text-sm font-medium text-gray-700">Ảnh đại diện:</label>
                        <input type="file" name="image_pro" id="image" autocomplete="off"
                            class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                    </div>

                    <!-- Chọn màu sắc -->
                    <div id="colors-section" class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Chọn Màu Sắc:</label>
                        <div id="colors-container">
                            @foreach ($colors as $color)
                                <div class="flex items-center space-x-2 mb-2">
                                    <input type="checkbox" name="variant_colors[]" value="{{ $color->id }}"
                                        class="color-checkbox">
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
                                        class="capacity-checkbox">
                                    <label>{{ $capacity->value }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Thông tin biến thể -->
                    <div id="variant-details" class="space-y-4">
                        <!-- Các trường nhập liệu cho biến thể sẽ được thêm vào đây bởi JavaScript -->
                    </div>

                    <button type="submit" class="mt-4 px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">
                        Tạo Sản Phẩm
                    </button>
                </form>
            </div>
        </div>
    </div>

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

                    // Tạo chuỗi ID cho thuộc tính
                    const combinationIds = `${combination.color.id},${combination.capacity.id}`;

                    variantFieldset.innerHTML = `
                        <legend class="text-sm font-medium text-gray-700">Biến thể: ${combinationName}</legend>
                        <div class="space-y-2">
                            <input type="hidden" name="variant_attributes[]" value="${combinationIds}">
                            <input type="hidden" name="variant_color_ids[${index}]" value="${combination.color.id}">
                            <input type="hidden" name="variant_capacity_ids[${index}]" value="${combination.capacity.id}">
                            <input type="text" name="variant_prices[]" placeholder="Giá" class="p-2 border border-gray-300 rounded-md w-full">
                            <input type="text" name="variant_quantities[]" placeholder="Số lượng" class="p-2 border border-gray-300 rounded-md w-full">
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Hình ảnh:</label>
                                <input type="file" name="variant_images[${index}][]" multiple class="p-2 border border-gray-300 rounded-md w-full">
                            </div>
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

            // Tự động tạo biến thể khi trang được tải
            generateVariantFields();
        });
    </script>
@endsection
