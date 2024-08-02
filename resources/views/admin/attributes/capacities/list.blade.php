@extends('admin.layouts.master')

@section('title')
    List Attribute Capacities
@endsection

@section('content')
    <div class="w-full mt-12">
        <!-- Thông báo thành công và lỗi sẽ được hiển thị từ JavaScript -->

        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> {{ $title }}
        </p>

        <div class="mt-4 gap-4 flex">
            <button type="submit"
                class="inline-block text-indigo-600 hover:bg-red-600 hover:text-white focus:outline-none delete-btn bg-transparent border border-red-500 rounded-full px-3 py-1 mb-4">
                <a href="{{ route('capacities.index') }}">List</a>
            </button>
            <button type="submit"
                class="inline-block text-indigo-600 hover:bg-red-600 hover:text-white focus:outline-none delete-btn bg-transparent border border-red-500 rounded-full px-3 py-1 mb-4">
                <a href="{{ route('capacities.create') }}">Thêm mới</a>
            </button>
        </div>


        <div class="bg-white overflow-auto">
            <table id="attributes-table" class="min-w-full bg-white border-collapse rounded-md">
                <thead>
                    <tr class="bg-gray-100">
                        <th
                            class="py-3 px-6 text-left text-xs font-medium text-gray-700 uppercase border-b border-gray-200">
                            STT</th>
                        <th
                            class="py-3 px-6 text-left text-xs font-medium text-gray-700 uppercase border-b border-gray-200">
                            ID</th>
                        <th
                            class="py-3 px-6 text-left text-xs font-medium text-gray-700 uppercase border-b border-gray-200">
                            Name Capacities</th>
                       
                        <th
                            class="py-3 px-6 text-left text-xs font-medium text-gray-700 uppercase border-b border-gray-200">
                            Actions</th>
                    </tr>
                </thead>
                @include('admin.attributes.capacities.partials.list')
            </table>

        </div>
    </div>
@endsection
