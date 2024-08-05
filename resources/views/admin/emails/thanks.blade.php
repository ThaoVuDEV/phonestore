<!DOCTYPE html>
<html>
<head>
    <title>Cảm ơn đã đặt  Đơn Hàng</title>
</head>
<body>
    <h1>Chào {{ $user->name }},</h1>
    <p>Cảm ơn bạn đã đặt hàng tại cửa hàng của chúng tôi. Dưới đây là thông tin đơn hàng của bạn:</p>

    <h2>Chi Tiết Đơn Hàng:</h2>
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Tên Sản Phẩm</th>
                <th>Số Lượng</th>
                <th>Giá</th>
                <th>Tổng</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartItems as $item)
                <tr>
                    <td>{{ $item->variant->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->variant->price, 0, ',', '.') }} VNĐ</td>
                    <td>{{ number_format($item->total_price, 0, ',', '.') }} VNĐ</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p><strong>Tổng Tiền:</strong> {{ number_format($totalAmount, 0, ',', '.') }} VNĐ</p>
    <p><strong>Giảm Giá:</strong> {{ $discount }} VNĐ</p>
    <p><strong>Tổng Giỏ Hàng:</strong> {{ number_format($cartTotal, 0, ',', '.') }} VNĐ</p>
    

    <p>Chúng tôi sẽ gửi cho bạn thông tin cập nhật về đơn hàng qua email này.</p>

    <p>Cảm ơn bạn đã mua sắm với chúng tôi!</p>
</body>
</html>
