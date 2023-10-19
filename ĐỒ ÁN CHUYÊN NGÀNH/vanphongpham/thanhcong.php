<?php
session_start();
include('ketnoi.php');
if (isset($_SESSION['email']) && $_SESSION['email']) {
    $email = $_SESSION['email'];
}else{
    $email = "khách";
}
$sql = "DELETE from cart where username = '$email'";
$query = mysqli_query($conn, $sql);
?>
<div class="thanhcong">
    <h2>ĐẶT HÀNG THÀNH CÔNG</h2>
    <a href="index.php">Về trang chủ</a>
</div>
