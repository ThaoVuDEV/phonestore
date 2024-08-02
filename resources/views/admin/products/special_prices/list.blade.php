@extends('admin.layouts.master')
@section('title')
Special Prices
@endsection
@section('content')
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Special Prices</h1>
        <a href="{{ route('special-prices.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded mb-4 inline-block">Create New Special Price</a>

        @if(session('success'))
            <div class="bg-green-500 text-white p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 px-4 border-b text-left">ID</th>
                    <th class="py-2 px-4 border-b text-left">Product</th>
                    <th class="py-2 px-4 border-b text-left">Special Price</th>
                    <th class="py-2 px-4 border-b text-left">Start Date</th>
                    <th class="py-2 px-4 border-b text-left">End Date</th>
                    <th class="py-2 px-4 border-b text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($specialPrices as $specialPrice)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $specialPrice->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $specialPrice->product->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $specialPrice->special_price }}</td>
                        <td class="py-2 px-4 border-b">{{ $specialPrice->start_date }}</td>
                        <td class="py-2 px-4 border-b">{{ $specialPrice->end_date }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('special-prices.edit', $specialPrice->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-1 px-3 rounded">Edit</a>
                            <form action="{{ route('special-prices.destroy', $specialPrice->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
