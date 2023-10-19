<?php
include('ketnoi.php');
$prd_id=$_GET['id'];
$email = "khách";
if (isset($_SESSION['email']) && $_SESSION['email']) {
    $email = $_SESSION['email'];
}
$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from cart where prd_id=$prd_id and username='$email'"));
$quantity = $row['quantity'] + 1;
$sql_up = "UPDATE cart SET quantity = $quantity where prd_id = $prd_id and username='$email'";
$query_up = mysqli_query($conn, $sql_up);
header('location: index.php?quanly=giohang')
?>