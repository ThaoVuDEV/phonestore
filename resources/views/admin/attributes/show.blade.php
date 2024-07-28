@extends('admin.layouts.master')
@section('title')
    Show Detail Attribute
@endsection
@section('content')
    <div class="w-full mt-12">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> {{ $attributeDetail->isNotEmpty() ? $attributeDetail->first()->attribute_name : 'No Attribute Details' }}
        </p>
        <div>
            <button type="submit"
                class="inline-block text-indigo-600 hover:bg-red-600 hover:text-white focus:outline-none delete-btn bg-transparent border border-red-500 rounded-full px-3 py-1 mb-4">
                <a href="{{ route('attributes.index') }}">Back</a></button>
            @if ($attributeDetail->isNotEmpty())
                <button
                class="inline-block text-indigo-600 hover:bg-yellow-500 hover:text-white focus:outline-none delete-btn bg-transparent border border-yellow-500 rounded-full px-3 py-1 ml-2">
                <a href="{{ route('attributeDetail.create', ['id' => $attributeDetail->first()->product_attribute_id]) }}"
                    class="text-indigo-600 hover:text-indigo-900">Thêm biến thể con</a>
                </button>
            @endif
        </div>
        @if ($attributeDetail->isNotEmpty())
            <div class="bg-white overflow-auto">
                <table class="min-w-full bg-white border-collapse rounded-md">
                    <thead>
                        <tr class="bg-blue-100">
                            <th class="py-3 px-6 text-left text-xs font-medium text-gray-700 uppercase border-b border-gray-200">
                                STT</th>
                            <th
                                class="py-3 px-6 text-left text-xs font-medium text-gray-700 uppercase border-b border-gray-200">
                                Name Attribute</th>
                            <th
                                class="py-3 px-6 text-left text-xs font-medium text-gray-700 uppercase border-b border-gray-200">
                                Name Detail Attribute</th>
                            <th
                                class="py-3 px-6 text-left text-xs font-medium text-gray-700 uppercase border-b border-gray-200">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attributeDetail as $index => $item)
                            <tr class="hover:bg-gray-50">
                                <td class="py-4 px-6 border-b border-gray-200">{{ $index + 1 }}</td>
                                <td class="py-4 px-6 border-b border-gray-200">{{ $item->attribute_name }}</td>
                                <td class="py-4 px-6 border-b border-gray-200">{{ $item->value }}</td>
                                <td class="py-4 px-6 border-b border-gray-200">
                                    <button type="button"
                                        class="inline-block text-indigo-600 hover:bg-red-900 hover:text-white focus:outline-none delete-btn bg-transparent border border-red-500 rounded-full px-3 py-1 "
                                        onclick="confirm('Bạn có chắc xóa không?')">
                                        <a href="{{route('attributeDetail.delete',['id'=>$item->id])}}" class="text-indigo-600 hover:text-white">Xóa</a>
                                    </button>
                                    <button
                                        class="inline-block text-indigo-600 hover:bg-yellow-500 hover:text-white focus:outline-none delete-btn bg-transparent border border-yellow-500 rounded-full px-3 py-1 ml-2">
                                        <a href="{{ route('attributeDetail.edit', ['id' => $item->id]) }}"
                                            class="text-indigo-600 hover:text-indigo-900">Sửa</a>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-center mt-4">Không có biến thể nào được tìm thấy.</p>
        @endif
    </div>
@endsection
