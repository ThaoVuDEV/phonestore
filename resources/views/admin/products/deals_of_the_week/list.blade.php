@extends('admin.layouts.master')

@section('title')
    Deals of the Week
@endsection

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-4">Deals of the Week</h1>
        <a href="{{ route('deals-of-the-week.create') }}"
            class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded mb-4 inline-block">Create New
            Deal</a>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-2 px-4 border-b text-left">ID</th>
                        <th class="py-2 px-4 border-b text-left">Product</th>
                        <th class="py-2 px-4 border-b text-left">Price Old</th>
                        <th class="py-2 px-4 border-b text-left">Discount</th>
                        <th class="py-2 px-4 border-b text-left">Start Date</th>
                        <th class="py-2 px-4 border-b text-left">End Date</th>
                        <th class="py-2 px-4 border-b text-left">Time Left</th>
                        <th class="py-2 px-4 border-b text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($deals as $deal)
                    <tr class="hover:bg-gray-100">
                        <td class="py-2 px-4 border-b">{{ $deal->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $deal->variant->product->name }}-{{ $deal->variant->color->name }}-{{ $deal->variant->capacity->value }}</td>
                        <td class="py-2 px-4 border-b">{{ $deal->variant->price }}</td> <!-- Đảm bảo `price` tồn tại trong `product` -->
                        <td class="py-2 px-4 border-b">{{ $deal->discount }}</td>
                        <td class="py-2 px-4 border-b">{{ $deal->start_date }}</td>
                        <td class="py-2 px-4 border-b">{{ $deal->end_date }}</td>
                        <td class="py-2 px-4 border-b">
                            <div id="countdown-{{ $deal->id }}" class="font-mono"></div>
                            <script>
                                var countDownDate{{ $deal->id }} = new Date("{{ $deal->end_date }}").getTime();
                                var x{{ $deal->id }} = setInterval(function() {
                                    var now = new Date().getTime();
                                    var distance = countDownDate{{ $deal->id }} - now;
                                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                                    document.getElementById("countdown-{{ $deal->id }}").innerHTML = days + "d " + hours + "h "
                                    + minutes + "m " + seconds + "s ";
                                    if (distance < 0) {
                                        clearInterval(x{{ $deal->id }});
                                        document.getElementById("countdown-{{ $deal->id }}").innerHTML = "EXPIRED";
                                    }
                                }, 1000);
                            </script>
                        </td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('deals-of-the-week.edit', $deal->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-1 px-3 rounded">Edit</a>
                            <form action="{{ route('deals-of-the-week.destroy', $deal->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @if ($deals->isEmpty())
                <div class="mt-4 text-center">Không có sản phẩm nào đang giảm giá trong tuần này.</div>
            @endif
        </div>
    </div>
@endsection
