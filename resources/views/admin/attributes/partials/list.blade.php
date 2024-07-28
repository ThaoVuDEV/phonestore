<tbody id="attributes-body">
    @foreach ($attributes as $index => $item)
        <tr class="hover:bg-gray-50">
            <td class="py-4 px-6 border-b border-gray-200">
                {{ ($attributes->currentPage() - 1) * $attributes->perPage() + $index + 1 }}</td>
            <td class="py-4 px-6 border-b border-gray-200">{{ $item->id }}</td>
            <td class="py-4 px-6 border-b border-gray-200">{{ $item->name }}</td>
            <td class="py-4 px-6 border-b border-gray-200">
                @if ($item->deleted_at)
                    <div class="flex space-x-2">
                        <form action="{{ route('attributes.restore', ['id' => $item->id]) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit"
                                class="inline-block text-indigo-600 hover:bg-blue-600 hover:text-white focus:outline-none bg-transparent border border-red-500 rounded-full px-3 py-1">Khôi
                                phục</button>
                        </form>
                    </div>
                @else
                    <button type="button"
                        class="inline-block text-indigo-600 hover:bg-red-900 hover:text-white focus:outline-none delete-btn bg-transparent border border-red-500 rounded-full px-3 py-1 "
                        onclick="confirmDeletion(event, '{{ route('attributes.delete', ['id' => $item->id]) }}')">Xóa</button>
                    <button
                        class="inline-block text-indigo-600 hover:bg-yellow-500 hover:text-white focus:outline-none delete-btn bg-transparent border border-yellow-500 rounded-full px-3 py-1 ml-2"><a
                            href="{{ route('attributes.edit', ['id' => $item->id]) }}"
                            class="text-indigo-600 hover:text-indigo-900">Sửa</a></button>
                    <button
                        class="inline-block text-indigo-600 hover:bg-yellow-500 hover:text-white focus:outline-none delete-btn bg-transparent border border-yellow-500 rounded-full px-3 py-1 ml-2"><a
                            href="{{ route('attributeDetail.show', ['id' => $item->id]) }}"
                            class="text-indigo-600 hover:text-indigo-900">Xem chi tiết</a></button>
                    <button
                        class="inline-block text-indigo-600 hover:bg-yellow-500 hover:text-white focus:outline-none delete-btn bg-transparent border border-yellow-500 rounded-full px-3 py-1 ml-2"><a
                            href="{{ route('attributeDetail.create', ['id' => $item->id]) }}"
                            class="text-indigo-600 hover:text-indigo-900">Thêm biến thể con</a></button>
                @endif
            </td>
        </tr>
    @endforeach
</tbody>