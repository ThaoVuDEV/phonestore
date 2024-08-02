<!-- fraimwork - jquery include -->
<script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<!-- mobile menu - jquery include -->
<script src="{{ asset('assets/js/mCustomScrollbar.js') }}"></script>

<!-- animation - jquery include -->
<script src="{{ asset('assets/js/parallaxie.js') }}"></script>
<script src="{{ asset('assets/js/wow.min.js') }}"></script>

<!-- nice select - jquery include -->
<script src="{{ asset('assets/js/nice-select.min.js') }}"></script>

<!-- carousel - jquery include -->
<script src="{{ asset('assets/js/slick.min.js') }}"></script>

<!-- countdown timer - jquery include -->
<script src="{{ asset('assets/js/countdown.js') }}"></script>

<!-- popup images & videos - jquery include -->
<script src="{{ asset('assets/js/magnific-popup.min.js') }}"></script>

<!-- filtering & masonry layout - jquery include -->
<script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/js/masonry.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>

<!-- jquery ui - jquery include -->
<script src="{{ asset('assets/js/jquery-ui.js') }}"></script>

<!-- custom - jquery include -->
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cartSidebar = document.getElementById('cart-sidebar');
        const closeCartBtn = document.getElementById('close-cart-btn');
        const overlay = cartSidebar.querySelector('.overlay');

        // Hàm mở giỏ hàng
        function openCartSidebar() {
            // Gọi API để lấy dữ liệu giỏ hàng (cập nhật đường dẫn theo thực tế)
            fetch('/cart/data')
                .then(response => response.json())
                .then(data => {
                    updateCartSidebar(data);
                    cartSidebar.style.display = 'block';
                })
                .catch(error => console.error('Error fetching cart data:', error));
        }

        // Hàm đóng giỏ hàng
        function closeCartSidebar() {
            cartSidebar.style.display = 'none';
        }

        // Thêm sự kiện cho nút mở giỏ hàng (thay đổi ID này theo nút mở giỏ hàng của bạn)
        const openCartBtn = document.getElementById('open-cart-btn'); // Thay đổi ID nếu cần
        if (openCartBtn) {
            openCartBtn.addEventListener('click', openCartSidebar);
        }

        // Thêm sự kiện cho nút đóng giỏ hàng
        if (closeCartBtn) {
            closeCartBtn.addEventListener('click', closeCartSidebar);
        }
        overlay.addEventListener('click', closeCartSidebar);

        // Cập nhật nội dung giỏ hàng
        function updateCartSidebar(data) {
            const cartItemsList = document.getElementById('cart-items-list');
            const totalPrice = document.getElementById('total-price');

            // Cập nhật danh sách các mục giỏ hàng
            cartItemsList.innerHTML = data.items.map(item => `
            <li>
                <div class="item_image">
                    <img src="${item.image}" alt="image_not_found">
                </div>
                <div class="item_content">
                    <h4 class="item_title">${item.title}</h4>
                    <span class="item_price">$${item.price}</span>
                </div>
                <button type="button" class="remove_btn" data-id="${item.id}"><i class="fal fa-trash-alt"></i></button>
            </li>
        `).join('');

            // Cập nhật tổng giá
            totalPrice.innerHTML = `
            <li><span>Subtotal:</span><span>$${data.subtotal.toFixed(2)}</span></li>
            <li><span>Vat 5%:</span><span>$${data.vat.toFixed(2)}</span></li>
            <li><span>Discount 20%:</span><span>- $${data.discount.toFixed(2)}</span></li>
            <li><span>Total:</span><span>$${(data.subtotal - data.discount + data.vat).toFixed(2)}</span></li>
        `;
        }
    });
</script>

<script>
    $(document).ready(function() {
        $('.user_btn').on('click', function() {
            var $dropdownMenu = $(this).siblings('.dropdown-menu');
            $('.dropdown-menu').not($dropdownMenu).slideUp(); // Đóng tất cả các dropdown khác
            $dropdownMenu.slideToggle(); // Hiện hoặc ẩn dropdown hiện tại
        });

        // Đóng dropdown khi nhấp ra ngoài
        $(document).on('click', function(event) {
            if (!$(event.target).closest('.dropdown').length) {
                $('.dropdown-menu').slideUp();
            }
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('[data-start-date]').forEach(function(element) {
            var startDate = new Date(element.getAttribute('data-start-date')).getTime();
            var endDate = new Date(element.getAttribute('data-end-date')).getTime();

            function updateCountdown() {
                var now = new Date().getTime();
                var distance = endDate - now;
                
                if (distance < 0) {
                    clearInterval(interval);
                    element.innerHTML = "<li>Time's up!</li>";
                    return;
                }
                
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                element.querySelector('.days').textContent = days + "d";
element.querySelector('.hours').textContent = hours.toString().padStart(2, '0') + "h";
element.querySelector('.minutes').textContent = minutes.toString().padStart(2, '0') + "m";
element.querySelector('.seconds').textContent = seconds.toString().padStart(2, '0') + "s";

            }

            var interval = setInterval(updateCountdown, 1000);
            updateCountdown(); // Run once immediately
        });
    });
</script>
