@extends('admin.layouts.master')

@section('title')
    Deals of the Week
@endsection

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">Create Deal of the Week</h1>
        <form action="{{ route('deals-of-the-week.store') }}" method="POST"
            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf

            <div class="mb-4">
                <label for="product_variant_id" class="block text-sm font-medium text-gray-700">Product Variant</label>
                <select name="product_variant_id" id="product_variant_id"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Select Product Variant</option>
                    @foreach ($products as $product)
                        @foreach ($product->productVariants as $variant)
                            <option value="{{ $variant->id }}">
                                {{ $product->name }} - {{ $variant->color->name }} - {{ $variant->capacity->value }}
                            </option>
                        @endforeach
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="discount" class="block text-sm font-medium text-gray-700">Discount (%)</label>
                <input type="text" name="discount" id="discount"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                    required>
            </div>

            <div class="mb-4">
                <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                <input type="datetime-local" name="start_date" id="start_date"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                    required>
            </div>

           

            <button type="submit"
                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Create Deal</button>
        </form>
    </div>
@endsection
