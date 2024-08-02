<tbody>
    @foreach ($products as $index => $item)
        <tr class="hover:bg-gray-50">
            <td class="py-4 px-6 border-b border-gray-200">
                {{ ($products->currentPage() - 1) * $products->perPage() + $index + 1 }}</td>
            <td class="py-4 px-6 border-b border-gray-200">{{ $item->id }}</td>
            <td class="py-4 px-6 border-b border-gray-200">{{ $item->name }}</td>
            <td class="py-4 px-6 border-b border-gray-200">{{ $item->description }}</td>
            <td class="py-4 px-6 border-b border-gray-200">{{ $item->cate_name }}</td>
            <td class="py-4 px-6 border-b border-gray-200"><img src="{{ asset('storage/products/' . basename($item->image)) }}" alt="" width="70px" height="50px"></td>
            <td class="py-4 px-6 border-b border-gray-200">
                @if ($item->deleted_at)
                    <div class="flex space-x-2">
                        <form action="{{ route('products.restore', ['id' => $item->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit"
                                class="inline-block text-indigo-600 hover:bg-blue-600 hover:text-white focus:outline-none bg-transparent border border-red-500 rounded-full px-3 py-1">Khôi
                                phục</button>
                        </form>
                    </div>
                @else
                    <div class="flex space-x-2">
                        <button type="button"
                            class="inline-block text-indigo-600 hover:bg-red-900 hover:text-white focus:outline-none delete-btn bg-transparent border border-red-500 rounded-full px-3 py-1 "
                            onclick="confirmDeletion(event, '{{ route('products.destroy', ['id' => $item->id]) }}')">
                            <a href="{{ route('products.destroy', ['id' => $item->id]) }}"
                                class="text-indigo-600 hover:text-white">Xóa</a>
                        </button>
                        <button
                            class="inline-block text-indigo-600 hover:bg-yellow-500 hover:text-white focus:outline-none delete-btn bg-transparent border border-yellow-500 rounded-full px-3 py-1 ml-2">
                            <a href="{{ route('products.edit', ['id' => $item->id]) }}"
                                class="text-indigo-600 hover:text-indigo-900">Sửa</a>
                        </button>
                        <button
                        class="inline-block text-indigo-600 hover:bg-yellow-500 hover:text-white focus:outline-none delete-btn bg-transparent border border-yellow-500 rounded-full px-3 py-1 ml-2">
                        <a href="{{ route('products.show', ['id' => $item->id]) }}"
                            class="text-indigo-600 hover:text-indigo-900">Xem Chi tiết</a>
                    </button>
                        <form action="{{ route('products.featured.create') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $item->id }}">
                            <button type="submit"
                                class="inline-block text-indigo-600 hover:bg-blue-500 hover:text-white focus:outline-none bg-transparent border border-yellow-500 rounded-full px-3 py-1 ml-2">
                                Thêm sản phẩm đặc sắc
                            </button>
                        </form>
                    </div>
                @endif
            </td>
        </tr>
    @endforeach
</tbody>
