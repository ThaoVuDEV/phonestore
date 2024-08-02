@extends('admin.layouts.master')

@section('title')
    List Discounts
@endsection

@section('content')
    <div class="w-full mt-12">
        <!-- Thông báo thành công và lỗi sẽ được hiển thị từ JavaScript -->
        @if (session('status'))
            <div class="bg-green-500 text-white p-4 mb-4 rounded">
                {{ session('status') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-500 text-white p-4 mb-4 rounded">
                {{ session('error') }}
            </div>
        @endif


        <div class="mt-4 gap-4">
            <button type="submit"
                class="inline-block text-indigo-600 hover:bg-red-600 hover:text-white focus:outline-none bg-transparent border border-red-500 rounded-full px-3 py-1 mb-4">
                <a href="{{ route('discounts.index') }}">List</a>
            </button>
            <button type="submit"
                class="inline-block text-indigo-600 hover:bg-red-600 hover:text-white focus:outline-none bg-transparent border border-red-500 rounded-full px-3 py-1 mb-4">
                <a href="{{ route('discounts.create') }}">Thêm mới</a>
            </button>
        </div>

        <!-- Form Tìm Kiếm -->
        <div class="mb-4">
            <input type="text" id="search-input" placeholder="Tìm kiếm mã giảm giá..." value="{{ request('search') }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-l-lg">
        </div>

        <div class="bg-white overflow-auto">
            <table id="discounts-table" class="min-w-full bg-white border-collapse rounded-md">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-700 uppercase border-b border-gray-200">STT</th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-700 uppercase border-b border-gray-200">ID</th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-700 uppercase border-b border-gray-200">Code</th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-700 uppercase border-b border-gray-200">Description</th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-700 uppercase border-b border-gray-200">Discount Type</th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-700 uppercase border-b border-gray-200">Value</th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-700 uppercase border-b border-gray-200">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($discounts as $index => $discount)
                        <tr>
                            <td class="py-4 px-6 border-b border-gray-200">{{ $index + 1 }}</td>
                            <td class="py-4 px-6 border-b border-gray-200">{{ $discount->id }}</td>
                            <td class="py-4 px-6 border-b border-gray-200">{{ $discount->code }}</td>
                            <td class="py-4 px-6 border-b border-gray-200">{{ $discount->description }}</td>
                            <td class="py-4 px-6 border-b border-gray-200">{{ $discount->discount_type }}</td>
                            <td class="py-4 px-6 border-b border-gray-200">{{ $discount->value }}</td>
                            <td class="py-4 px-6 border-b border-gray-200">
                                <a href="{{ route('discounts.edit', $discount->id) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                                <form action="{{ route('discounts.destroy', $discount->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 ml-2">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- <div class="flex justify-start mt-4">
                {{ $discounts->appends(['search' => request('search')])->links('pagination::tailwind') }}
            </div> --}}
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search-input');

            searchInput.addEventListener('input', function() {
                const searchTerm = searchInput.value.toLowerCase();
                fetchDiscounts(searchTerm);
            });

            function fetchDiscounts(searchTerm) {
                fetch(`{{ route('discounts.index') }}?search=${searchTerm}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(res => res.text())
                    .then(data => {
                        document.querySelector('#discounts-table tbody').innerHTML = data;
                    });
            }
        });
    </script>
@endsection
