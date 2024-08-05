@extends('admin.layouts.master')

@section('title')
   Edit Banner
@endsection

@section('content')
    <div class="w-full mt-12">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-edit mr-3"></i> Edit Banner
        </p>

        <!-- Form Sửa Banner -->
        <form action="{{ route('banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name" value="{{ $banner->name }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" id="image" name="image" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                @if($banner->image)
                    <img src="{{ asset('storage/uploads/' . basename($banner->image)) }}" alt="Current Image" class="mt-2 w-32 h-auto">
                @endif
            </div>

            <button type="submit" class="inline-block text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none rounded-lg px-4 py-2">
                Update Banner
            </button>
        </form>
    </div>
@endsection
