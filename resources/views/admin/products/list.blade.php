@extends('admin.layouts.master')
@section('title')
    List Products
@endsection
@section('content')
    <div class="w-full mt-12">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> List Brands
        </p>
        <div class="bg-white overflow-auto">
            <table class="min-w-full bg-white border-collapse rounded-md">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-700 uppercase border-b border-gray-200">
                            STT
                        </th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-700 uppercase border-b border-gray-200">
                            ID
                        </th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-700 uppercase border-b border-gray-200">
                            BRAND
                        </th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-700 uppercase border-b border-gray-200">
                            DESCRIPTION
                        </th>
                        <th
                            class="py-3 px-6 text-left text-xs font-medium text-gray-700 uppercase border-b border-gray-200">
                            COUNTRY
                        </th>
                        <th
                            class="py-3 px-6 text-left text-xs font-medium text-gray-700 uppercase border-b border-gray-200">
                            ACTION
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-gray-50">
                        <td class="py-4 px-6 border-b border-gray-200">1</td>
                        <td class="py-4 px-6 border-b border-gray-200">1</td>
                        <td class="py-4 px-6 border-b border-gray-200">iPhone</td>
                        <td class="py-4 px-6 border-b border-gray-200">Công ty sản xuất điện thoại hàng đầu thế giới</td>
                        <td class="py-4 px-6 border-b border-gray-200">USA</td>
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
                    <tr class="hover:bg-gray-50">
                        <td class="py-4 px-6 border-b border-gray-200">2</td>
                        <td class="py-4 px-6 border-b border-gray-200">2</td>
                        <td class="py-4 px-6 border-b border-gray-200">Samsung</td>
                        <td class="py-4 px-6 border-b border-gray-200">Tập đoàn điện tử lớn nhất Hàn Quốc</td>
                        <td class="py-4 px-6 border-b border-gray-200">South Korea</td>
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
                    <tr class="hover:bg-gray-50">
                        <td class="py-4 px-6 border-b border-gray-200">3</td>
                        <td class="py-4 px-6 border-b border-gray-200">3</td>
                        <td class="py-4 px-6 border-b border-gray-200">Nokia</td>
                        <td class="py-4 px-6 border-b border-gray-200">Công ty điện tử hàng đầu Phần Lan</td>
                        <td class="py-4 px-6 border-b border-gray-200">Finland</td>
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
