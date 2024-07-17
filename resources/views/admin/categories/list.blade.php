@extends('admin.layouts.master')
@section('title')
    List Categories
@endsection
@section('content')
    
<div class="w-full mt-12">
    <p class="text-xl pb-3 flex items-center">
        <i class="fas fa-list mr-3"></i> {{$title}}
       
    </p>
    <div class="mt-4 gap-4">
        <button type="submit" class="inline-block text-indigo-600 hover:bg-red-600 hover:text-white focus:outline-none delete-btn bg-transparent border border-red-500 rounded-full px-3 py-1 mb-4"> <a href="{{ route('categories.index') }}" >List</a></button>
        <button type="submit" class="inline-block text-indigo-600 hover:bg-red-600 hover:text-white focus:outline-none delete-btn bg-transparent border border-red-500 rounded-full px-3 py-1 mb-4"> <a href="{{ route('category.create') }}" >Thêm mới</a></button>
        <button type="submit" class="inline-block text-indigo-600 hover:bg-red-600 hover:text-white focus:outline-none delete-btn bg-transparent border border-red-500 rounded-full px-3 py-1 mb-4"> <a href="{{ route('categories_trash') }}" >Thùng rác</a></button>

    </div>
    
    <div class="bg-white overflow-auto">
        <table class="text-left w-full border-collapse">
            <thead>
                <tr>
                    <th class="py-4 px-6 bg-gray-200 text-gray-600 font-bold uppercase text-sm border-b border-gray-300">STT</th>
                    <th class="py-4 px-6 bg-gray-200 text-gray-600 font-bold uppercase text-sm border-b border-gray-300">ID</th>
                    <th class="py-4 px-6 bg-gray-200 text-gray-600 font-bold uppercase text-sm border-b border-gray-300">NAME</th>     
                    <th class="py-4 px-6 bg-gray-200 text-gray-600 font-bold uppercase text-sm border-b border-gray-300">ACTIONS</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($categories as $index => $item)
                <tr class="hover:bg-grey-lighter">
                    <td class="py-4 px-6 border-b border-grey-light">{{ ($categories->currentPage() - 1) * $categories->perPage() + $index + 1 }}</td>
                    <td class="py-4 px-6 border-b border-grey-light">{{ $item->id }}</td>
                    <td class="py-4 px-6 border-b border-grey-light">{{ $item->name }}</td>
                    <td class="py-4 px-6 border-b border-gray-200">
                        @if ($item->deleted_at)
                        <form action="{{ route('categories.restore', ['id' => $item->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="inline-block text-indigo-600  hover:bg-blue-600 hover:text-white focus:outline-none delete-btn bg-transparent border border-red-500 rounded-full px-3 py-1">Khôi phục</button>
                        </form>
                        @else
                        <button type="button"
                            class="inline-block text-indigo-600 hover:bg-red-600 hover:text-white focus:outline-none delete-btn bg-transparent border border-red-500 rounded-full px-3 py-1"
                            onclick="confirm('Bạn có chắc xóa không?')">
                            <a href="{{ route('category.delete', ['id' => $item->id]) }}" class="text-indigo-600 hover:text-white">Xóa</a>
                        </button>
                        <button
                            class="inline-block text-indigo-600 hover:bg-yellow-500 hover:text-white focus:outline-none delete-btn bg-transparent border border-yellow-500 rounded-full px-3 py-1 ml-2">
                            <a href="{{ route('category.edit', ['id' => $item->id]) }}" class="text-indigo-600 hover:text-white">Sửa</a>
                        </button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="flex justify-start mt-4">
            {{ $categories->links('pagination::tailwind') }}
        </div>
    </div>
</div>
@endsection
