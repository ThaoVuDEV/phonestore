@extends('admin.layouts.master')
@section('title')
    List Products Iphone
@endsection
@section('content')
    <div class="w-full mt-12">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> List Products Iphone
        </p>
        <div class="bg-white overflow-auto">
            <table class="text-left w-full border-collapse">
                <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                <thead>
                    <tr>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            STT</th>

                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            NAME</th>
                            <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            PRICE</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            STOCK</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            PRODUCT</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            ACTION</th>

                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-grey-light">1</td>
                        <td class="py-4 px-6 border-b border-grey-light">IPHONE 15</td>
                        <td class="py-4 px-6 border-b border-grey-light">10000000</td>
                        <td class="py-4 px-6 border-b border-grey-light"> 10</td>
                        <td class="py-4 px-6 border-b border-grey-light">IPHONE</td>
                        <td class="py-4 px-6 border-b border-gray-200">
                            <button type="button"
                                class="inline-block text-indigo-600 hover:bg-red-900 hover:text-white focus:outline-none delete-btn bg-transparent border border-red-500 rounded-full px-3 py-1 "
                                onclick="confirm('Bạn có chắc xóa không?')">
                                <a href="#" class="text-indigo-600 hover:text-white">Xóa</a>
                            </button>
                            <button
                                class="inline-block text-indigo-600 hover:bg-yellow-500 hover:text-white focus:outline-none delete-btn bg-transparent border border-yellow-500 rounded-full px-3 py-1 ml-2">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Sửa</a>
                            </button>
                            <button
                                class="inline-block text-indigo-600 hover:bg-blue-500 hover:text-white focus:outline-none delete-btn bg-transparent border border-yellow-500 rounded-full px-3 py-1 ml-2">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Xem chi tiết</a>
                            </button>
                        </td>
                    </tr>
                 
                </tbody>
            </table>
        </div>
    </div>
@endsection
