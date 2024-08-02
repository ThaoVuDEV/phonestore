@extends('admin.layouts.master')
@section('title')
   List Users
@endsection
@section('content')
    <div class="w-full mt-12">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> List Users
        </p>
        <!-- Form Tìm Kiếm -->
        <div class="mb-4">
            <input type="text" id="search-input" placeholder="Tìm kiếm sản phẩm..."
                class="w-full px-4 py-2 border border-gray-300 rounded-l-lg">
        </div>
        <div class="mt-4 gap-4">
            <button type="submit"
                class="inline-block text-indigo-600 hover:bg-red-600 hover:text-white focus:outline-none delete-btn bg-transparent border border-red-500 rounded-full px-3 py-1 mb-4">
                <a href="{{ route('products.index') }}">List</a>
            </button>
        </div>
        <div class="bg-white overflow-auto">
            <table id="products-table" class="text-left w-full border-collapse">
                <thead>
                    <tr>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            ID</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            NAME</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            EMAIL</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            PHONE</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            ADDRESS</th>
                            <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listUsers as $index => $item)
                        <tr class="hover:bg-grey-lighter">
                            <td class="py-4 px-6 border-b border-grey-light">{{ $item->id }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $item->name }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $item->email }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $item->phone }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $item->address }}</td>
                            <td class="py-4 px-6 border-b border-gray-200">
                                <button type="button"
                                    class="inline-block text-indigo-600 hover:bg-red-900 hover:text-white focus:outline-none delete-btn bg-transparent border border-red-500 rounded-full px-3 py-1 "
                                    onclick="confirm('Bạn có chắc xóa không?')">
                                    <a href="" class="text-indigo-600 hover:text-white">Xóa</a>
                                </button>
                                <button
                                    class="inline-block text-indigo-600 hover:bg-yellow-500 hover:text-white focus:outline-none delete-btn bg-transparent border border-yellow-500 rounded-full px-3 py-1 ml-2">
                                    <a href="{{route('users.edit',['id'=>$item->id])}}" class="text-indigo-600 hover:text-indigo-900">Sửa</a>
                                </button>
                                <button
                                    class="inline-block text-indigo-600 hover:bg-blue-500 hover:text-white focus:outline-none delete-btn bg-transparent border border-yellow-500 rounded-full px-3 py-1 ml-2">
                                    <a href="{{route('users.show',['id'=>$item->id])}}" class="text-indigo-600 hover:text-indigo-900">Xem chi tiết</a>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

  
@endsection
