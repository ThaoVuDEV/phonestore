@extends('admin.layouts.master')

@section('title')
    Create Category
@endsection

@section('content')
    <div class="w-full mt-12 bg-gray-100">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> Create Category
        </p>
        <div>
            <button type="submit" class="inline-block text-indigo-600 hover:bg-red-600 hover:text-white focus:outline-none delete-btn bg-transparent border border-red-500 rounded-full px-3 py-1 mb-4">
                <a href="{{ route('categories.index') }}">List</a>
            </button>
        </div>
        <div class="bg-white overflow-auto">
            <div class="container w-3xl">
                <form action="{{ route('categories.store') }}" method="POST" class="p-4">
                    @csrf
                    @method('POST')
                    
                    <div class="mb-3">
                        <label for="category_name" class="block text-xl font-medium text-gray-700">Category Name</label>
                        <div class="border border-dark mt-2">        
                            <input type="text" name="category_name" id="category_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full px-3 py-2 placeholder-gray-400 border-gray-300 rounded-md shadow-sm focus:outline-none sm:text-sm" placeholder="Nhập tên danh mục">
                        </div>
                        @error('category_name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Thêm trường chọn danh mục cha -->
                    <div class="mb-3">
                        <label for="parent_id" class="block text-xl font-medium text-gray-700">Parent Category</label>
                        <div class="border border-dark mt-2">
                            <select name="parent_id" id="parent_id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full px-3 py-2 border-gray-300 rounded-md shadow-sm focus:outline-none sm:text-sm">
                                <option value="">-- None --</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('parent_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="inline-flex items-center px-3 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Create
                        </button>
                    </div>
                </form>
            </div>
        </div>    
    </div>
@endsection
