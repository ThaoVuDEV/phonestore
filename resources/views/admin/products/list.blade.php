@extends('admin.layouts.master')

@section('title')
    List Products
@endsection

@section('content')
    <div class="w-full mt-12">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> List Brands
        </p>
        <div class="mt-4 gap-4">
            <button type="submit"
                class="inline-block text-indigo-600 hover:bg-red-600 hover:text-white focus:outline-none delete-btn bg-transparent border border-red-500 rounded-full px-3 py-1 mb-4">
                <a href="{{ route('products.index') }}">List</a>
            </button>
            <button type="submit"
                class="inline-block text-indigo-600 hover:bg-red-600 hover:text-white focus:outline-none delete-btn bg-transparent border border-red-500 rounded-full px-3 py-1 mb-4">
                <a href="{{ route('products.create') }}">Thêm mới</a>
            </button>
            <button type="submit"
                class="inline-block text-indigo-600 hover:bg-red-600 hover:text-white focus:outline-none delete-btn bg-transparent border border-red-500 rounded-full px-3 py-1 mb-4">
                <a href="{{ route('products_trash') }}">Thùng rác</a>
            </button>
        </div>

        <!-- Form Tìm Kiếm -->
        <div class="mb-4">
            <input type="text" id="search-input" placeholder="Tìm kiếm sản phẩm..."
                value="{{ request('search') }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-l-lg">
        </div>

        <div class="bg-white overflow-auto">
            <table id="product-table" class="min-w-full bg-white border-collapse rounded-md">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-700 uppercase border-b border-gray-200">
                            STT
                        </th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-700 uppercase border-b border-gray-200">
                            ID
                        </th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-700 uppercase border-b border-gray-200">
                            NAME
                        </th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-700 uppercase border-b border-gray-200">
                            DESCRIPTION
                        </th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-700 uppercase border-b border-gray-200">
                            DANH MỤC
                        </th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-700 uppercase border-b border-gray-200">
                            ACTION
                        </th>
                    </tr>
                </thead>
                @include('admin.products.partials.list')
            </table>
            <div class="flex justify-start mt-4">
                {{ $products->appends(['search' => request('search')])->links('pagination::tailwind') }}
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search-input');

            searchInput.addEventListener('input', function() {
                const searchTerm = searchInput.value.toLowerCase();
                fetchProducts(searchTerm);
            });

            function fetchProducts(searchTerm) {
                fetch(`{{ route('products.index') }}?search=${searchTerm}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.text())
                .then(data => {
                    document.querySelector('#product-table tbody').innerHTML = data;
                });
            }
        });
    </script>
@endsection
