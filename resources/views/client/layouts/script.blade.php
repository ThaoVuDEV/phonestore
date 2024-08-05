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
<script>
       document.addEventListener('DOMContentLoaded', function () {
    var tabTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tab"]'));
    tabTriggerList.map(function (tabTriggerEl) {
        var tabTrigger = new bootstrap.Tab(tabTriggerEl);
        tabTrigger.show();
    });
});
</script>