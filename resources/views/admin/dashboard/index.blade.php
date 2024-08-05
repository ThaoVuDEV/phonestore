    @extends('admin.layouts.master')
    @section('title')
        Dashboard
    @endsection
    @section('content')
        <div class="container mx-auto p-6">
            <h1 class="text-3xl font-bold mb-6">Dashboard</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Doanh thu hôm nay -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-xl font-semibold mb-2">Doanh thu hôm nay</h2>
                    <p class="text-2xl">{{ number_format($dailyRevenue, 0, ',', '.') }} VNĐ</p>
                </div>

                <!-- Doanh thu tuần này -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-xl font-semibold mb-2">Doanh thu tuần này</h2>
                    <p class="text-2xl">{{ number_format($weeklyRevenue, 0, ',', '.') }} VNĐ</p>
                </div>

                <!-- Doanh thu tháng này -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-xl font-semibold mb-2">Doanh thu tháng này</h2>
                    <p class="text-2xl">{{ number_format($monthlyRevenue, 0, ',', '.') }} VNĐ</p>
                </div>

                <!-- Doanh thu năm nay -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-xl font-semibold mb-2">Doanh thu năm nay</h2>
                    <p class="text-2xl">{{ number_format($yearlyRevenue, 0, ',', '.') }} VNĐ</p>
                </div>

                <!-- Biểu đồ doanh thu -->
                <div class="bg-white p-6 rounded-lg shadow-lg mt-8">
                    <h2 class="text-xl font-semibold mb-4">Doanh thu theo thời gian</h2>
                    <canvas id="revenueChart" class="w-full h-80"></canvas>
                </div>
            </div>






            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Tổng đơn hàng -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-xl font-semibold mb-2">Tổng đơn hàng</h2>
                    <p class="text-2xl">Hoàn thành: {{ $totalOrders['completed'] }}</p>
                    <p class="text-lg">Đặt: {{ $totalOrders['pending'] }}</p>
                    <p class="text-lg">Đang giao: {{ $totalOrders['shipped'] }}</p>
                    <p class="text-lg">Xác nhận: {{ $totalOrders['confirmed'] }}</p>
                </div>

                <!-- Đơn hàng mới hôm nay -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-xl font-semibold mb-2">Đơn hàng mới hôm nay</h2>
                    <p class="text-2xl">Hoàn thành: {{ $newOrders['completed'] }}</p>
                    <p class="text-lg">Đặt: {{ $newOrders['pending'] }}</p>
                    <p class="text-lg">Đang giao: {{ $newOrders['shipped'] }}</p>
                    <p class="text-lg">Xác nhận: {{ $newOrders['confirmed'] }}</p>
                </div>
                <!-- Biểu đồ đơn hàng -->
                <div class="bg-white p-6 rounded-lg shadow-lg mt-8">
                    <h2 class="text-xl font-semibold mb-4">Đơn hàng theo trạng thái</h2>
                    <canvas id="ordersChart" class="w-full h-80"></canvas>
                </div>
                <!-- Khách hàng -->


                <!-- Sản phẩm và biến thể sản phẩm -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-xl font-semibold mb-2">Sản phẩm và Biến thể sản phẩm</h2>
                    <p class="text-2xl">Tổng số: {{ $totalProducts }}</p>
                    <p class="text-lg">Sắp hết hàng: {{ $lowStockProducts }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-xl font-semibold mb-2">Sản phẩm theo danh mục</h2>
                    <canvas id="categoriesChart" class="w-full h-80"></canvas>
                </div>
                <!-- Biểu đồ sản phẩm -->
                <div class="bg-white p-6 rounded-lg shadow-lg mt-8">
                    <h2 class="text-xl font-semibold mb-4">Sản phẩm theo trạng thái</h2>
                    <canvas id="productsChart" class="w-full h-80"></canvas>
                </div>

            </div>
            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Mã giảm giá -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-xl font-semibold mb-2">Mã giảm giá</h2>
                    <p class="text-2xl">Tổng số: {{ $totalDiscounts }}</p>
                    <p class="text-lg">Đã sử dụng: {{ $usedDiscounts }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-xl font-semibold mb-2">Khách hàng</h2>
                    <p class="text-2xl">Tổng: {{ $totalCustomers }}</p>
                    <p class="text-lg">Mới hôm nay: {{ $newCustomers }}</p>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const ctxRevenue = document.getElementById('revenueChart').getContext('2d');
                const ctxOrders = document.getElementById('ordersChart').getContext('2d');
                const ctxProducts = document.getElementById('productsChart').getContext('2d');
                const ctxCategories = document.getElementById('categoriesChart').getContext('2d');

                // Biểu đồ doanh thu
                // Biểu đồ doanh thu
                new Chart(ctxRevenue, {
                    type: 'line',
                    data: {
                        labels: ['Hôm nay', 'Tuần này', 'Tháng này', 'Năm nay'],
                        datasets: [{
                            label: 'Doanh thu',
                            data: [
                                {{ $dailyRevenue }},
                                {{ $weeklyRevenue }},
                                {{ $monthlyRevenue }},
                                {{ $yearlyRevenue }}
                            ],
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1,
                            fill: true
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    callback: function(value) {
                                        return value.toLocaleString('vi-VN', {
                                            style: 'currency',
                                            currency: 'VND'
                                        });
                                    }
                                }
                            }
                        }
                    }
                });

                // Biểu đồ đơn hàng
                new Chart(ctxOrders, {
                    type: 'pie',
                    data: {
                        labels: ['Hoàn thành', 'Đặt', 'Đang giao', 'Xác nhận'],
                        datasets: [{
                            label: 'Đơn hàng',
                            data: [
                                {{ $totalOrders['completed'] }},
                                {{ $totalOrders['pending'] }},
                                {{ $totalOrders['shipped'] }},
                                {{ $totalOrders['confirmed'] }}
                            ],
                            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0']
                        }]
                    },
                    options: {
                        responsive: true
                    }
                });

                // Biểu đồ sản phẩm
                new Chart(ctxProducts, {
                    type: 'bar',
                    data: {
                        labels: ['Sẵn có', 'Sắp hết hàng'],
                        datasets: [{
                            label: 'Sản phẩm',
                            data: [
                                {{ $availableProducts }},
                                {{ $lowStockProducts }},
                            ],
                            backgroundColor: ['#4BC0C0', '#FFCE56', '#FF6384']
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                // Biểu đồ sản phẩm theo danh mục
                new Chart(ctxCategories, {
                    type: 'doughnut',
                    data: {
                        labels: [
                            @foreach ($categoriesData as $category)
                                '{{ $category['name'] }}',
                            @endforeach
                        ],
                        datasets: [{
                            label: 'Sản phẩm theo danh mục',
                            data: [
                                @foreach ($categoriesData as $category)
                                    {{ $category['count'] }},
                                @endforeach
                            ],
                            backgroundColor: [
                                '#FF6384',
                                '#36A2EB',
                                '#FFCE56',
                                '#4BC0C0',
                                '#FF9F40'
                            ]
                        }]
                    },
                    options: {
                        responsive: true
                    }
                });
            });
        </script>
    @endsection
