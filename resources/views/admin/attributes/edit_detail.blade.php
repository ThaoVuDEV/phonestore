@extends('admin.layouts.master')
@section('title')
    Edit Detail Attribute
@endsection
@section('content')
    
<div class="w-full mt-12">
    <p class="text-xl pb-3 flex items-center">
        <i class="fas fa-list mr-3"></i> Edit Detail Attributes
    </p>
    <div class="mt-4 gap-4">
        <button type="submit"
            class="inline-block text-indigo-600 hover:bg-red-600 hover:text-white focus:outline-none delete-btn bg-transparent border border-red-500 rounded-full px-3 py-1 mb-4">
            <a href="{{ $previousUrl }}">Back</a>
        </button>   
    </div>
    <div class="bg-white overflow-auto">
        <div class="container mx-auto p-6">
            <form action="{{route('attributeDetail.update',['id'=>$attributeDetail->id])}}" id="" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                <div>
                    <h1 class="text-xl font-weight-bold">{{$attributeDetail->value}}</h1>
                </div>
                <div>      
                    <input type="text" name="attribute_detail_value" id="attribute_detail_value" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md h-10" placeholder="Nhập giá trị biến thể"  value="{{ old('value', $attributeDetail->value) }}">
                </div>
                <div class="flex justify-end">
                    <button type="submit" onclick="addDetailAttribute()" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Apply Detail Attribute
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection