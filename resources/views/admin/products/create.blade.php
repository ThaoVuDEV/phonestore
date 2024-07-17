@extends('admin.layouts.master')

@section('title')
Create Products
@section('content')
    
<div class="w-full mt-12">
    <p class="text-xl pb-3 flex items-center">
        <i class="fas fa-list mr-3"></i> Create Products
    </p>
    <div class="bg-white overflow-auto">
        <div class="container mx-auto p-6">
            <form action="" method="POST" class="space-y-6">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Product Name:</label>
                    <input type="text" name="name" id="name" autocomplete="off" placeholder="Enter product name" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Product Description:</label>
                    <textarea name="description" id="description" rows="3" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Enter product description"></textarea>
                </div>

                <hr class="my-6">

                <h3 class="text-lg font-medium">Add Product Variants</h3>

                <div id="variants" class="space-y-4">
                    <div class="variant border p-4 rounded-md bg-gray-100">
                        <div class="mb-2">
                            <label for="variant_name" class="block text-sm font-medium text-gray-700">Variant Name:</label>
                            <input type="text" name="variants[0][name]" id="variant_name" autocomplete="off" placeholder="Enter variant name" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                        </div>
                        <div class="mb-2">
                            <label for="variant_price" class="block text-sm font-medium text-gray-700">Variant Price:</label>
                            <input type="text" name="variants[0][price]" id="variant_price" autocomplete="off" placeholder="Enter variant price" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                        </div>
                        <div class="mb-2">
                            <label for="variant_attributes" class="block text-sm font-medium text-gray-700">Variant Attributes:</label>
                            @include('admin.attributes.select-attributes', ['attributes' => $attributes])
                        </div>
                    </div>
                </div>

                <button type="button" onclick="addVariant()" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Add Variant</button>

                <button type="submit" class="mt-4 px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">Create Product</button>
            </form>
        </div>
    </div>
</div>

<script>
    let variantIndex = 1;

    function addVariant() {
        let variantHtml = `
            <div class="variant border p-4 rounded-md bg-gray-100">
                <hr class="my-4">
                <div class="mb-2">
                    <label for="variant_name_${variantIndex}" class="block text-sm font-medium text-gray-700">Variant Name:</label>
                    <input type="text" name="variants[${variantIndex}][name]" id="variant_name_${variantIndex}" autocomplete="off" placeholder="Enter variant name" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                </div>
                <div class="mb-2">
                    <label for="variant_price_${variantIndex}" class="block text-sm font-medium text-gray-700">Variant Price:</label>
                    <input type="text" name="variants[${variantIndex}][price]" id="variant_price_${variantIndex}" autocomplete="off" placeholder="Enter variant price" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                </div>
                <div class="mb-2">
                    <label for="variant_attributes_${variantIndex}" class="block text-sm font-medium text-gray-700">Variant Attributes:</label>
                    @include('partials.select-attributes', ['attributes' => $attributes])
                </div>
            </div>
        `;
        document.getElementById('variants').insertAdjacentHTML('beforeend', variantHtml);
        variantIndex++;
    }
</script>

@endsection
