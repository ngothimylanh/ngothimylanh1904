<?php
    if(isset($_SESSION['username'])){
        include('chuc_nang/gio_hang/thanh_vien_form.php');
    }
    else{
?>
        <p class="alert alert-warning" style=" background-color: #ec522b; color: #fff;">Vui lòng <a href="?menu=dang_nhap" style="color: #fff;">đăng nhập</a> để khám phá cơ hội tuyệt vời và chiêm ngưỡng những sản phẩm độc đáo của TECHNOLOGY. Chúng tôi đánh giá cao mỗi khách hàng và mong muốn mang đến một hành trình mua sắm thú vị, đáp ứng đúng mong đợi của bạn. Trân trọng cảm ơn!<br></p>
        <?php include('chuc_nang/dang_ky_dang_nhap/dang_nhap.php'); ?>
        <p class="alert alert-warning" style=" background-color: #ec522b; color: #fff;">
        Nếu bạn chưa có tài khoản, hãy nhấp <a href="?menu=dang_ky" style="color: #337ab7;">vào đây</a> để tạo một tài khoản mới và trở thành một phần của TECHNOLOGY. Chúng tôi sẽ mang đến những ưu đãi đặc biệt cho bạn. Mỗi tài khoản là một hành trình mới, và chúng tôi sẵn sàng đồng hành cùng bạn. Hãy bắt đầu chuyến đi mới của bạn ngay bây giờ và khám phá những điều tuyệt vời mà TECHNOLOGY mang lại. Chúng tôi chờ đón bạn!</p>

<?php
    }
    if (isset($_POST['thanh_toan'])) {
        include('connect.php'); 

        if (isset($_SESSION['giohang'])) {
            foreach ($_SESSION['giohang'] as $masp => $sp) {
                $sql = "UPDATE san_pham SET soluong = soluong - $sp WHERE masp = $masp";
                $exec = mysqli_query($connect, $sql);
                if (!$exec) {
                    echo "Lỗi cập nhật số lượng sản phẩm: " . mysqli_error($connect);
                    exit; 
                }
            }
            unset($_SESSION['giohang']);
            
        }
    }
?>
<script type="text/javascript">
    $(document).ready(function() {
        document.title = 'Giỏ hàng';
    });
</script>