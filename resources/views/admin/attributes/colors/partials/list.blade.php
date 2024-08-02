<tbody id="attributes-body">
    @foreach ($colors as $index => $item)
        <tr class="hover:bg-gray-50">
            <td class="py-4 px-6 border-b border-gray-200">
                {{  $index + 1 }}</td>
            <td class="py-4 px-6 border-b border-gray-200">{{ $item->id }}</td>
            <td class="py-4 px-6 border-b border-gray-200">{{ $item->name }}</td>
            <td class="py-4 px-6 border-b border-gray-200">{{ $item->code }}</td>
            <td class="py-4 px-6 border-b border-gray-200">
                    <button type="button"
                        class="inline-block text-indigo-600 hover:bg-red-900 hover:text-white focus:outline-none delete-btn bg-transparent border border-red-500 rounded-full px-3 py-1 "
                        onclick="confirmDeletion(event, '{{ route('color.destroy',  $item->id) }}')">Xóa</button>
                    <button
                        class="inline-block text-indigo-600 hover:bg-yellow-500 hover:text-white focus:outline-none delete-btn bg-transparent border border-yellow-500 rounded-full px-3 py-1 ml-2"><a
                            href="{{ route('color.edit',  $item->id) }}"
                            class="text-indigo-600 hover:text-indigo-900">Sửa</a></button>
            </td>
        </tr>
    @endforeach
</tbody>