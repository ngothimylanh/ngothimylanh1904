<?php

$masp = isset($_GET['masp']) ? $_GET['masp'] : '';
$soluong = isset($_GET['soluong']) ? intval($_GET['soluong']) : 0; 
if (empty($masp) || $soluong <= 0) {
    echo '<script>alert("Dữ liệu không hợp lệ."); window.history.back();</script>';
    exit; 
}

include('connect.php');

$sql = "SELECT soluong FROM san_pham WHERE masp = '$masp'";
$exec = mysqli_query($connect, $sql);

if ($exec && mysqli_num_rows($exec) > 0) {
    $row = mysqli_fetch_assoc($exec);
    $soluongsan = $row['soluong'];

    if ($soluong <= $soluongsan) {
        $sp = isset($_SESSION['giohang'][$masp]) ? $_SESSION['giohang'][$masp] + $soluong : $soluong;
        $_SESSION['giohang'][$masp] = $sp;

        $soluongmoi = $soluongsan - $soluong;
        $sql = "UPDATE san_pham SET soluong = $soluongmoi WHERE masp = '$masp'";
        mysqli_query($connect, $sql);

        include('chuc_nang/gio_hang/thanh_toan.php');
    } else {
        echo '<p style="background-color: #ec522b; color: #fff; width: 100%; height: 105px;border: 5px solid  #ec522b;">Sản phẩm này hiện tại đã hết hàng. Chúng tôi rất tiếc về sự bất tiện này và đang tích cực nỗ lực để cung cấp thêm hàng sớm nhất có thể. Bạn có thể kiểm tra trang hệ thống hoặc liên hệ trực tiếp với chúng tôi để cập nhật thông tin về việc tái cung cấp sản phẩm hoặc tìm kiếm các sản phẩm thay thế khác. Chúng tôi xin chân thành cảm ơn.</p>';

    }
} else {
    echo "<p>Sản phẩm không tồn tại.</p>";
}
?>