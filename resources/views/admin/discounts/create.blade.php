@extends('admin.layouts.master')

@section('title')
    Tạo Mã Giảm Giá
@endsection

@section('content')
    <div class="w-full mt-12 bg-gray-100">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> Tạo Mã Giảm Giá
        </p>
        <div class="mb-4">
            <a href="{{ route('discounts.index') }}" class="inline-block text-indigo-600 hover:bg-red-600 hover:text-white focus:outline-none delete-btn bg-transparent border border-red-500 rounded-full px-3 py-1 mb-4">
                <i class="fas fa-list mr-2"></i> Danh Sách
            </a>
        </div>
        <div class="bg-white overflow-auto">
            <div class="container mx-auto max-w-3xl p-6">
                <form action="{{ route('discounts.store') }}" method="POST" class="space-y-4">
                    @csrf

                    <div class="mb-4">
                        <label for="code" class="block text-lg font-medium text-gray-700">Mã Giảm Giá</label>
                        <input type="text" name="code" id="code" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Nhập mã giảm giá">
                        @error('code')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-lg font-medium text-gray-700">Mô Tả</label>
                        <textarea name="description" id="description" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Nhập mô tả"></textarea>
                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="discount_type" class="block text-lg font-medium text-gray-700">Loại Giảm Giá</label>
                        <select name="discount_type" id="discount_type" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="percentage">Phần Trăm</option>
                            <option value="fixed_amount">Số Tiền Cố Định</option>
                        </select>
                        @error('discount_type')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="value" class="block text-lg font-medium text-gray-700">Giá Trị Giảm Giá</label>
                        <input type="number" name="value" id="value" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Nhập giá trị giảm giá">
                        @error('value')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="start_date" class="block text-lg font-medium text-gray-700">Ngày Bắt Đầu</label>
                        <input type="date" name="start_date" id="start_date" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('start_date')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="end_date" class="block text-lg font-medium text-gray-700">Ngày Kết Thúc</label>
                        <input type="date" name="end_date" id="end_date" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('end_date')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="usage_limit" class="block text-lg font-medium text-gray-700">Giới Hạn Sử Dụng</label>
                        <input type="number" name="usage_limit" id="usage_limit" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Nhập giới hạn sử dụng">
                        @error('usage_limit')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Tạo Mã Giảm Giá
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
