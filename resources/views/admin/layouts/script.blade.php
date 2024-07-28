<!-- AlpineJS -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<!-- Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
    integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
<!-- ChartJS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
    integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>

<script>
    var chartOne = document.getElementById('chartOne');
    var myChart = new Chart(chartOne, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var chartTwo = document.getElementById('chartTwo');
    var myLineChart = new Chart(chartTwo, {
        type: 'line',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
<script>
    // Tự động ẩn thông báo sau 5 giây
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            let alertSuccess = document.querySelector('.alert-success');
            if (alertSuccess) {
                alertSuccess.style.transition = 'opacity 1s';
                alertSuccess.style.opacity = '0';
                setTimeout(() => alertSuccess.remove(), 1000);
            }

            let alertDanger = document.querySelector('.alert-danger');
            if (alertDanger) {
                alertDanger.style.transition = 'opacity 1s';
                alertDanger.style.opacity = '0';
                setTimeout(() => alertDanger.remove(), 1000);
            }
        }, 3000); // 5 giây
    });
</script>
<script>
    function confirmDeletion(event, url) {
        event.preventDefault(); // Ngăn chặn hành động mặc định của thẻ <a>
        Swal.fire({
            title: 'Bạn có chắc xóa không?',
            text: "Bạn sẽ không thể khôi phục lại dữ liệu này!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Có, xóa nó!',
            cancelButtonText: 'Hủy bỏ'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url; // Điều hướng đến URL xóa nếu người dùng xác nhận
            }
        });
    }
</script>
<script>
    // Hiển thị thông báo thành công nếu có
    if (successMessage) {
        Swal.fire({
            title: 'Thành công!',
            text: successMessage,
            icon: 'success',
            confirmButtonText: 'Đóng'
        });
    }

    // Hiển thị các thông báo lỗi nếu có
    if (errorMessages.length > 0) {
        Swal.fire({
            title: 'Lỗi!',
            html: errorMessages.map(error => `<div>${error}</div>`).join(''),
            icon: 'error',
            confirmButtonText: 'Đóng'
        });
    }

    function showAlert(title, text, type) {
        Swal.fire({
            title: title,
            text: text,
            icon: type,
            confirmButtonText: 'OK BRO'
        });
    }
    // Thay thế alert() bằng showAlert
    window.alert = function(message) {
        showAlert('Thông báo', message, 'info');
    };

    // Thay thế confirm() bằng showAlert
    window.confirm = function(message) {
        return Swal.fire({
            title: 'Xác nhận',
            text: message,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Có',
            cancelButtonText: 'Không'
        }).then(result => result.isConfirmed);
    };

    // Thay thế prompt() bằng showAlert
    window.prompt = function(message, defaultValue) {
        return Swal.fire({
            title: message,
            input: 'text',
            inputValue: defaultValue || '',
            showCancelButton: true,
            confirmButtonText: 'OK',
            cancelButtonText: 'Hủy'
        }).then(result => result.value);
    };
</script>



