@extends('admin.layouts.master')
@section('title')
    Edit Category
@endsection
@section('content')
    
<div class="w-full mt-12 bg-gray-100 p-4">
    <p class="text-xl pb-3 flex items-center">
        <i class="fas fa-list mr-3"></i> Edit Category
    </p>
    <div>
        <button type="submit" class="inline-block text-indigo-600 hover:bg-red-600 hover:text-white focus:outline-none delete-btn bg-transparent border border-red-500 rounded-full px-3 py-1 mb-4"> <a href="{{ route('categories.index') }}" >List</a></button>
    </div>
    <div id="success-message" class="hidden bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
        <p class="font-bold">Cập nhật thành công</p>
        <p>{{ session('success') }}</p>
    </div>
    <div class="bg-white overflow-hidden shadow-md rounded-lg">
        <div class="container mx-auto p-4">
            <form id="edit-category-form" action="{{ route('category.update', ['id' => $category->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="category_name" class="block text-lg font-medium text-gray-700">Category Name</label>
                    <input type="text" name="category_name" id="category_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full px-3 py-2 placeholder-gray-400 border-gray-300 rounded-md focus:outline-none sm:text-sm" placeholder="Enter category name" value="{{ old('category_name', $category->name) }}">
                </div>
                <div class="flex items-center justify-end">
                    <button type="submit" id="submit-button" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Apply
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
