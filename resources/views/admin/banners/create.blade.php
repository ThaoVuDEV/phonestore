@extends('admin.layouts.master')

@section('title')
   Add Banner
@endsection

@section('content')
    <div class="w-full mt-12">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-plus mr-3"></i> Add Banner
        </p>

        <!-- Form Thêm Banner -->
        <form action="{{ route('banners.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">title</label>
                <input type="text" id="title" name="title" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" id="image" name="image" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>

            <button type="submit" class="inline-block text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none rounded-lg px-4 py-2">
                Add Banner
            </button>
        </form>
    </div>
@endsection
