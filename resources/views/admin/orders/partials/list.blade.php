<tbody>
    @foreach ($orders as $index => $item)
        <tr class="hover:bg-gray-50">

            <td class="py-4 px-6 border-b border-gray-200">{{ $item->id }}</td>
            <td class="py-4 px-6 border-b border-gray-200">{{ $item->total_amount }} VNĐ</td>
            <td class="py-4 px-6 border-b border-gray-200">
                @switch($item->status)
                    @case(App\Models\Order::STATUS_PENDING)
                        <span class="text-yellow-500">Chờ xác nhận</span>
                    @break

                    @case(App\Models\Order::STATUS_CONFIRMED)
                        <span class="text-blue-500">Đã xác nhận</span>
                    @break

                    @case(App\Models\Order::STATUS_SHIPPED)
                        <span class="text-orange-500">Đang giao hàng</span>
                    @break

                    @case(App\Models\Order::STATUS_COMPLETED)
                        <span class="text-green-500">Đã giao hàng</span>
                    @break

                    @default
                        <span class="text-gray-500">Không xác định</span>
                @endswitch
            </td>
            <td class="py-4 px-6 border-b border-gray-200">{{ $item->payment_method }}</td>
            <td class="py-4 px-6 border-b border-gray-200">{{ $item->user->name }}</td>
            <td class="py-4 px-6 border-b border-gray-200">{{ $item->created_at }}</td>
            <td class="py-4 px-6 border-b border-gray-200">
                @if ($item->status == App\Models\Order::STATUS_PENDING)
                    <!-- Chờ xác nhận -->
                    <form action="{{ route('order.confirm', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit"
                            class="inline-block text-indigo-600 hover:bg-red-600 hover:text-white focus:outline-none delete-btn bg-transparent border border-red-500 rounded-full px-3 py-1 mb-4">Xác
                            nhận</button>
                    </form>
                @elseif ($item->status == App\Models\Order::STATUS_CONFIRMED)
                    <!-- Đã xác nhận -->
                    <form action="{{ route('order.ship', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit"
                            class="inline-block text-indigo-600 hover:bg-red-600 hover:text-white focus:outline-none delete-btn bg-transparent border border-red-500 rounded-full px-3 py-1 mb-4">Giao
                            hàng</button>
                    </form>
                @elseif ($item->status == App\Models\Order::STATUS_SHIPPED)
                    <!-- Đang giao hàng -->
                    <form action="{{ route('order.complete', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit"
                            class="inline-block text-indigo-600 hover:bg-red-600 hover:text-white focus:outline-none delete-btn bg-transparent border border-red-500 rounded-full px-3 py-1 mb-4">Hoàn
                            thành</button>
                    </form>
                @endif
            </td>
            <td>
                <form action="{{ route('orders.show', $item->id) }}"  style="display:inline;">
                    @csrf
                  
                    <button type="submit"
                        class="inline-block text-indigo-600 hover:bg-red-600 hover:text-white focus:outline-none delete-btn bg-transparent border border-red-500 rounded-full px-3 py-1 mb-4">
                        Xem chi tiết</button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>
