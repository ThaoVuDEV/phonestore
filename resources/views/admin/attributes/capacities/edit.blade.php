@extends('admin.layouts.master')
@section('title')
    Edit Attribute Capacity
@endsection
@section('content')
    <div class="w-full mt-12">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> Edit Attributes Capacity
        </p>
        <div>
            <button type="submit"
                class="inline-block text-indigo-600 hover:bg-red-600 hover:text-white focus:outline-none delete-btn bg-transparent border border-red-500 rounded-full px-3 py-1 mb-4">
                <a href="{{ route('capacities.index') }}">List</a></button>
        </div>
        <div class="bg-white overflow-auto">
            <div class="container mx-auto p-6">
                <form action="{{ route('capacities.update', $capacity->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label for="color_name" class="block text-lg font-medium text-gray-700">Capacity
                                {{ $capacity->name }}</label>
                            <input type="text" name="value" id="color"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full px-3 py-2 placeholder-gray-400 border border-black rounded-md shadow-sm focus:outline-none sm:text-sm"
                                placeholder="Nhập tên biến thể" value="{{ old('color', $capacity->name) }}">
                        </div>
                       
                    </div>
                    <div class="flex justify-end">
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150" ">
                                            Apply Capacity
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
@endsection
