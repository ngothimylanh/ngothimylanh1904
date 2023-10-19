<?php
include('ketnoi.php');
$id=$_GET['id'];
$sql = "DELETE from products where prd_id=$id";
$query = mysqli_query($conn, $sql);
header('location: index.php?quanly=indexad');
?>