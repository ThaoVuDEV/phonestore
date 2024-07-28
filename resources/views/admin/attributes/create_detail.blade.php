@extends('admin.layouts.master')
@section('title')
    Create Detail Attribute
@endsection
@section('content')
    <div class="w-full mt-12">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> Create Detail Attributes
        </p>
        <div>
            <button type="submit"
                class="inline-block text-indigo-600 hover:bg-red-600 hover:text-white focus:outline-none delete-btn bg-transparent border border-red-500 rounded-full px-3 py-1 mb-4">
                <a href="{{ route('attributes.index') }}">Back</a></button>
          
        </div>

        <div class="bg-white overflow-auto">
            <div class="container mx-auto p-6">
                <form action="{{ route('attributeDetail.store') }}" method="POST" class="space-y-6">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="attribute_id" value="{{ $attributeService->id }}">

                    <div>
                        <h1 class="text-xl font-weight-bold">THêm tên biến thể</h1>
                    </div>
                    <div>
                        <input type="text" name="attribute_value" id="attribute_value"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md h-10"
                            placeholder="Nhập giá trị biến thể">
                    </div>
                    <div class="flex justify-end">
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Add Detail Attribute
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
