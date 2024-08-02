<tbody>
    @foreach ($proFeatured as $index => $item)
        <tr class="hover:bg-gray-50">
            <td class="py-4 px-6 border-b border-gray-200">
                {{ ($proFeatured->currentPage() - 1) * $proFeatured->perPage() + $index + 1 }}</td>
            <td class="py-4 px-6 border-b border-gray-200">{{ $item->id }}</td>
            <td class="py-4 px-6 border-b border-gray-200">{{ $item->product->name }}</td>
            <td class="py-4 px-6 border-b border-gray-200">{{ $item->product->description }}</td>
            <td class="py-4 px-6 border-b border-gray-200">{{ $item->product->category->name }}</td>
            <td class="py-4 px-6 border-b border-gray-200">
                <button type="button"
                    class="inline-block text-indigo-600 hover:bg-red-900 hover:text-white focus:outline-none delete-btn bg-transparent border border-red-500 rounded-full px-3 py-1 "
                    onclick="confirmDeletion(event, '{{ route('products.featured.destroy', ['id' => $item->id]) }}')">
                    <a href="{{route('products.destroy',['id'=>$item->id])}}" class="text-indigo-600 hover:text-white">Xóa</a>
                </button>
                
            </td>
        </tr>
    @endforeach
</tbody>
