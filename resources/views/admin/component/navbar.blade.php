<nav class="text-white text-base font-semibold pt-3">
    <a href="{{route('dashboard.index')}}" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
        <i class="fas fa-tachometer-alt mr-3"></i>
        Dashboard
    </a>
    <a href="{{ route('categories.index') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
        <i class="fas fa-th-list mr-3"></i>
        Danh mục
    </a>
    <a href="{{ route('products.index') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
        <i class="fas fa-box mr-3"></i>
        Sản phẩm
    </a>
    <a href="{{ route('products.featured.index') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
        <i class="fas fa-star mr-3"></i>
        Sản phẩm đặc sắc
    </a>
    <a href="{{ route('products.best-sale.index') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
        <i class="fas fa-fire mr-3"></i>
        Sản phẩm bán chạy
    </a>
    <a href="{{ route('special-prices.index') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
        <i class="fas fa-tags mr-3"></i>
        Sản phẩm đang giảm
    </a>
    <a href="{{ route('deals-of-the-week.index') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
        <i class="fas fa-calendar-week mr-3"></i>
        Ưu đãi trong tuần
    </a>
    <a href="{{ route('banners.index') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
        <i class="fas fa-ad mr-3"></i>
        Banner
    </a>
    <a href="{{ route('color.index') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
        <i class="fas fa-palette mr-3"></i>
        Màu sắc
    </a>
    <a href="{{ route('capacities.index') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
        <i class="fas fa-hdd mr-3"></i>
       Dung lượng
    </a>
    <a href="{{ route('discounts.index') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
        <i class="fas fa-percent mr-3"></i>
        Giảm Giá
    </a>
    <a href="" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
        <i class="fas fa-calendar-alt mr-3"></i>
        Reviews
    </a>
    <a href="{{ route('orders.index') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
        <i class="fas fa-shopping-cart mr-3"></i>
        Orders
    </a>
</nav>
