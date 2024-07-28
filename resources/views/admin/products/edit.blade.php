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
                <form action="{{ route('products.update', ['id'=>$product->id]) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT') <!-- Hoặc PATCH nếu route sử dụng PATCH -->

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

                  

                    <!-- Thông tin biến thể -->
                    <div id="variant-details" class="space-y-4">
                        <!-- Các trường nhập liệu cho biến thể sẽ được thêm vào đây bởi JavaScript -->
                        @foreach ($product->productVariants  as $variant)
                            <div class="mb-4" data-variant-id="{{ $variant->id }}">
                                <label class="block text-sm font-medium text-gray-700">Sản Phẩm Biến Thể: {{ $variant->name }}</label>
                                <input type="hidden" name="existing_variant_ids[]" value="{{ $variant->id }}">
                                <input type="hidden" name="variant_names[{{ $variant->id }}]" value="{{ $variant->name }}" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                                <input type="number" name="variant_prices[{{ $variant->id }}]" placeholder="Nhập giá biến thể" value="{{ $variant->price }}" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                                <input type="number" name="variant_quantities[{{ $variant->id }}]" placeholder="Nhập số lượng" value="{{ $variant->stock }}" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                                <input type="file" name="variant_images[{{ $variant->id }}][]" class="mt-1 p-2 border border-gray-300 rounded-md w-full" multiple>
                            </div>
                        @endforeach
                    </div>

                    <button type="submit" class="mt-4 px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">Cập Nhật Sản Phẩm</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const attributesContainer = document.getElementById('attributes-container');
            const variantDetailsContainer = document.getElementById('variant-details');
            const form = document.querySelector('form');

            function generateVariants(selectedAttributes, data) {
                let attributes = {};

                data.forEach(item => {
                    if (!attributes[item.product_attribute_id]) {
                        attributes[item.product_attribute_id] = [];
                    }
                    attributes[item.product_attribute_id].push(item);
                });

                let sortedAttributes = selectedAttributes.map(attrId => attributes[attrId] || []);

                let variants = [];

                function combineAttributes(attributesList, index = 0, currentVariant = []) {
                    if (index === attributesList.length) {
                        variants.push({
                            id: variants.length + 1,
                            name: currentVariant.join(' ')
                        });
                        return;
                    }

                    let attributeType = attributesList[index];
                    attributeType.forEach(attr => {
                        combineAttributes(attributesList, index + 1, [...currentVariant, attr.value]);
                    });
                }

                combineAttributes(sortedAttributes);

                return variants;
            }

            function updateAvailableAttributes() {
                const selectedAttributes = Array.from(document.querySelectorAll('select[name="attributes[]"]'))
                    .map(select => select.value)
                    .filter(value => value);

                Array.from(document.querySelectorAll('select[name="attributes[]"]')).forEach(select => {
                    Array.from(select.options).forEach(option => {
                        option.style.display = selectedAttributes.includes(option.value) && option.value ? 'none' : 'block';
                    });
                });
            }

            attributesContainer.addEventListener('change', updateAvailableAttributes);

            document.getElementById('add-attribute').addEventListener('click', () => {
                const newAttributeDiv = document.createElement('div');
                newAttributeDiv.className = 'flex items-center space-x-2 mb-2';

                const newSelect = document.createElement('select');
                newSelect.name = 'attributes[]';
                newSelect.className = 'p-2 border border-gray-300 rounded-md w-full';
                newSelect.innerHTML = `<option value="">Chọn thuộc tính</option>
                                        @foreach ($attributes as $attribute)
                                            <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                        @endforeach`;

                const removeButton = document.createElement('button');
                removeButton.type = 'button';
                removeButton.className = 'px-2 py-1 bg-red-500 text-white rounded-md hover:bg-red-600';
                removeButton.textContent = 'Xóa';
                removeButton.addEventListener('click', () => {
                    newAttributeDiv.remove();
                    updateAvailableAttributes();
                });

                newAttributeDiv.appendChild(newSelect);
                newAttributeDiv.appendChild(removeButton);

                attributesContainer.appendChild(newAttributeDiv);
                updateAvailableAttributes();
            });

            document.getElementById('generate-variants').addEventListener('click', () => {
                const selectedAttributes = Array.from(document.querySelectorAll('select[name="attributes[]"]'))
                    .map(select => select.value)
                    .filter(value => value);

                if (selectedAttributes.length > 0) {
                    fetch(`/admin/products/attribute-details/${selectedAttributes.join(',')}`)
                        .then(response => response.json())
                        .then(data => {
                            if (Array.isArray(data) && data.length > 0) {
                                const variants = generateVariants(selectedAttributes, data);

                                variantDetailsContainer.innerHTML = '';
                                variants.forEach(variant => {
                                    const variantDiv = document.createElement('div');
                                    variantDiv.className = 'mb-4';

                                    variantDiv.innerHTML = `<label class="block text-sm font-medium text-gray-700">Sản Phẩm Biến Thể: ${variant.name}</label>
                                                            <input type="hidden" name="new_variant_ids[]" value="${variant.id}">
                                                            <input type="text" name="variant_names[${variant.id}]" placeholder="Nhập tên biến thể" value="${variant.name}" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                                                            <input type="number" name="variant_prices[${variant.id}]" placeholder="Nhập giá biến thể" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                                                            <input type="number" name="variant_quantities[${variant.id}]" placeholder="Nhập số lượng" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                                                            <input type="file" name="variant_images[${variant.id}][]" class="mt-1 p-2 border border-gray-300 rounded-md w-full" multiple>`;

                                    variantDetailsContainer.appendChild(variantDiv);
                                });
                            }
                        });
                }
            });
        });
    </script>
@endsection
