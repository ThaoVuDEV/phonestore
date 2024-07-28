<tbody>
    @foreach ($products as $index => $item)
        <tr class="hover:bg-gray-50">
            <td class="py-4 px-6 border-b border-gray-200">
                {{ ($products->currentPage() - 1) * $products->perPage() + $index + 1 }}</td>
            <td class="py-4 px-6 border-b border-gray-200">{{ $item->id }}</td>
            <td class="py-4 px-6 border-b border-gray-200">{{ $item->name }}</td>
            <td class="py-4 px-6 border-b border-gray-200">{{ $item->description }}</td>
            <td class="py-4 px-6 border-b border-gray-200">{{ $item->cate_name }}</td>
            <td class="py-4 px-6 border-b border-gray-200">
                <button type="button"
                    class="inline-block text-indigo-600 hover:bg-red-900 hover:text-white focus:outline-none delete-btn bg-transparent border border-red-500 rounded-full px-3 py-1 "
                    onclick="confirm('Bạn có chắc xóa không?')">
                    <a href="" class="text-indigo-600 hover:text-white">Xóa</a>
                </button>
                <button
                    class="inline-block text-indigo-600 hover:bg-yellow-500 hover:text-white focus:outline-none delete-btn bg-transparent border border-yellow-500 rounded-full px-3 py-1 ml-2">
                    <a href="{{route('products.edit',['id'=>$item->id])}}" class="text-indigo-600 hover:text-indigo-900">Sửa</a>
                </button>
                <button
                    class="inline-block text-indigo-600 hover:bg-blue-500 hover:text-white focus:outline-none delete-btn bg-transparent border border-yellow-500 rounded-full px-3 py-1 ml-2">
                    <a href="{{route('products.show',['id'=>$item->id])}}" class="text-indigo-600 hover:text-indigo-900">Xem chi tiết</a>
                </button>
            </td>
        </tr>
    @endforeach
</tbody>
