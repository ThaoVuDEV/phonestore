@extends('admin.layouts.master')
@section('title')
Special Prices
@endsection
@section('content')
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Create Special Price</h1>

        <form action="{{ route('special-prices.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="product_id" class="block text-sm font-medium text-gray-700">Product</label>
                <select name="product_id" id="product_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
                @error('product_id')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="special_price" class="block text-sm font-medium text-gray-700">Special Price</label>
                <input type="text" name="special_price" id="special_price" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" value="{{ old('special_price') }}">
                @error('special_price')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                <input type="datetime-local" name="start_date" id="start_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" value="{{ old('start_date') }}">
            </div>

            <div class="mb-4">
                <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                <input type="datetime-local" name="end_date" id="end_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" value="{{ old('end_date') }}">
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Create Special Price</button>
        </form>
    </div>
@endsection
