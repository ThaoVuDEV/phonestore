@extends('admin.layouts.master')
@section('title')
    Create Attribute Capacities
@endsection
@section('content')
    <div class="w-full mt-12">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> Create Attribute Capacities
        </p>
        <div class="bg-white overflow-auto">
            <div class="container mx-auto p-6">
                <form action="{{ route('capacities.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label for="value" class="block text-sm font-medium text-gray-700">Capacities Name</label>
                            <input type="text" name="value" id="value"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full px-3 py-2 placeholder-gray-400 border-gray-300 rounded-md shadow-sm focus:outline-none sm:text-sm"
                                placeholder="Enter color name">
                            @error('value')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                    </div>
                    <div class="flex justify-end">
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Create Attribute Capacities
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
