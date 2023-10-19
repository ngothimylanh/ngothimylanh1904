<?php
include('ketnoi.php');
$id=$_GET['id'];
if (isset($_SESSION['email']) && $_SESSION['email']) {
    $email = $_SESSION['email'];
}else{
    $email = "khách";
}
$sql = "DELETE from cart where prd_id=$id and username='$email'";
$query = mysqli_query($conn, $sql);
header('location: index.php?quanly=giohang');
?>