<?php
if (isset($_GET['soluong'])) {
    $soluong = $_GET['soluong'];
} else {
    $soluong = 0; 
}

$masp = $_GET['masp'];
$sp = 0;

if (isset($_SESSION['giohang'][$masp])) {
    $sp = $_SESSION['giohang'][$masp] + $soluong;
} else {
    $sp = $soluong;
}

if ($soluong > 0) {
    $_SESSION['giohang'][$masp] = $sp;
    echo "<script> alert('Thêm vào giỏ hàng thành công'); location.href='?menu=san_pham'; </script>";
} else {
    echo '<p style="background-color: #ec522b; color: #fff; width: 100%; height: 105px;border: 5px solid  #ec522b;">Sản phẩm này hiện tại đã hết hàng. Chúng tôi rất tiếc về sự bất tiện này và đang tích cực nỗ lực để cung cấp thêm hàng sớm nhất có thể. Bạn có thể kiểm tra trang hệ thống hoặc liên hệ trực tiếp với chúng tôi để cập nhật thông tin về việc tái cung cấp sản phẩm hoặc tìm kiếm các sản phẩm thay thế khác. Chúng tôi xin chân thành cảm ơn.</p>';
}
?>