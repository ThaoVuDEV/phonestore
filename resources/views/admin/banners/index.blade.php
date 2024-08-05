@extends('admin.layouts.master')

@section('title')
   List Banners
@endsection

@section('content')
    <div class="w-full mt-12">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> List Banner
        </p>
        
        <!-- Nút Thêm Banner -->
        <div class="mb-4">
            <a href="{{ route('banners.create') }}" class="inline-block text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none rounded-lg px-4 py-2">
                Add Banner
            </a>
        </div>

        <!-- Form Tìm Kiếm -->
        <div class="mb-4">
            <input type="text" id="search-input" placeholder="Tìm kiếm banner..."
                class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>

        <div class="bg-white overflow-auto">
            <table id="banners-table" class="text-left w-full border-collapse">
                <thead>
                    <tr>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">ID</th>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Name</th>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Image</th>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($banners as $banner)
                        <tr class="hover:bg-grey-lighter">
                            <td class="py-4 px-6 border-b border-grey-light">{{ $banner->id }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $banner->name }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">
                                <img src="{{ asset('storage/banners/' . basename($banner->image)) }}" alt="Banner Image" class="w-32 h-auto">
                            </td>
                            <td class="py-4 px-6 border-b border-gray-200">
                                <a href="{{ route('banners.edit', $banner->id) }}" class="inline-block text-indigo-600 hover:bg-indigo-700 hover:text-white rounded-full px-3 py-1">
                                    Edit
                                </a>
                                <form action="{{ route('banners.destroy', $banner->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-block text-red-600 hover:bg-red-700 hover:text-white rounded-full px-3 py-1" onclick="return confirm('Are you sure you want to delete this banner?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
