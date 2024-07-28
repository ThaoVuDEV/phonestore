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

                    <!-- Chọn thuộc tính -->
                    <div id="attributes-section" class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Chọn Thuộc Tính:</label>
                        <div id="attributes-container">
                            <div class="flex items-center space-x-2 mb-2">
                                <select name="attributes[]" class="p-2 border border-gray-300 rounded-md w-full">
                                    <option value="">Chọn thuộc tính</option>
                                    @foreach ($attributes as $attribute)
                                        <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                    @endforeach
                                </select>
                                <button type="button" id="add-attribute"
                                    class="px-2 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600">+</button>
                            </div>
                        </div>
                        <button type="button" id="generate-variants"
                            class="mt-2 px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">Tạo Sản Phẩm Biến
                            Thể</button>
                    </div>

                    <!-- Thông tin biến thể -->
                    <div id="variant-details" class="space-y-4">
                        <!-- Các trường nhập liệu cho biến thể sẽ được thêm vào đây bởi JavaScript -->
                    </div>

                    <button type="submit" class="mt-4 px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">Tạo
                        Sản Phẩm</button>
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
                        option.style.display = selectedAttributes.includes(option.value) && option
                            .value ? 'none' : 'block';
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
                const selectedAttributes = Array.from(document.querySelectorAll(
                        'select[name="attributes[]"]'))
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
                                    const detailDiv = document.createElement('div');
                                    detailDiv.className = 'mb-4';

                                    const label = document.createElement('label');
                                    label.className = 'block text-sm font-medium text-gray-700';
                                    label.textContent = `Sản Phẩm Biến Thể: ${variant.name}`;
                                    label.name = `variant_names[${variant.name}]`;

                                    const nameInput = document.createElement('input');
                                    nameInput.type = 'hidden';
                                    nameInput.name =
                                        `variant_names[${variant.id}]`; // Sử dụng ID hoặc mã hóa
                                    nameInput.value =
                                        `${variant.name}`; // Lưu giá trị tên biến thể
                                    nameInput.className =
                                        'mt-1 p-2 border border-gray-300 rounded-md w-full';

                                    const priceInput = document.createElement('input');
                                    priceInput.type = 'number';
                                    priceInput.name = `variant_prices[${variant.id}]`;
                                    priceInput.placeholder = 'Nhập giá biến thể';
                                    priceInput.className =
                                        'mt-1 p-2 border border-gray-300 rounded-md w-full';

                                    const quantityInput = document.createElement('input');
                                    quantityInput.type = 'number';
                                    quantityInput.name = `variant_quantities[${variant.id}]`;
                                    quantityInput.placeholder = 'Nhập số lượng';
                                    quantityInput.className =
                                        'mt-1 p-2 border border-gray-300 rounded-md w-full';

                                    const imageInput = document.createElement('input');
                                    imageInput.type = 'file';
                                    imageInput.name =
                                        `variant_images[${variant.id}][]`; // Cho phép nhiều ảnh
                                    imageInput.className =
                                        'mt-1 p-2 border border-gray-300 rounded-md w-full';
                                    imageInput.multiple = true; // Cho phép chọn nhiều ảnh

                                    detailDiv.appendChild(nameInput);
                                    detailDiv.appendChild(label);
                                    detailDiv.appendChild(priceInput);
                                    detailDiv.appendChild(quantityInput);
                                    detailDiv.appendChild(imageInput);

                                    variantDetailsContainer.appendChild(detailDiv);
                                });
                            } else {
                                console.error('Dữ liệu không đúng định dạng hoặc trống');
                            }
                        })
                        .catch(error => {
                            console.error('Lỗi khi fetch:', error);
                            alert('Đã xảy ra lỗi khi tải thông tin biến thể. Vui lòng thử lại.');
                        });
                } else {
                    alert('Vui lòng chọn ít nhất một thuộc tính.');
                }
            });

            form.addEventListener('submit', (event) => {
                let hasValidVariant = false;

                // Kiểm tra các trường dữ liệu của biến thể
                const validVariants = [];
                variantDetailsContainer.querySelectorAll('div.mb-4').forEach(detailDiv => {
                    const nameInput = detailDiv.querySelector('input[name^="variant_names"]');
                    const priceInput = detailDiv.querySelector('input[name^="variant_prices"]');
                    const quantityInput = detailDiv.querySelector(
                        'input[name^="variant_quantities"]');
                    const imageInput = detailDiv.querySelector('input[name^="variant_images"]');

                    // Kiểm tra nếu ít nhất một trường có dữ liệu
                    if ((priceInput && priceInput.value) ||
                        (quantityInput && quantityInput.value) ||
                        (imageInput && imageInput.files.length > 0) ||
                        (nameInput && nameInput.value)) {
                        validVariants.push(detailDiv); // Lưu biến thể hợp lệ
                        hasValidVariant = true;
                    }
                });

                // Xóa các biến thể không hợp lệ
                variantDetailsContainer.innerHTML = '';
                validVariants.forEach(validVariant => {
                    variantDetailsContainer.appendChild(validVariant);
                });

                if (!hasValidVariant) {
                    alert('Vui lòng nhập ít nhất một trường dữ liệu cho các biến thể.');
                    event.preventDefault(); // Ngăn chặn việc gửi form nếu không có biến thể hợp lệ
                }
            });
        });
    </script>
@endsection
