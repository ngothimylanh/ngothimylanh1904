<?php
	include('connect.php'); 
	$masp=$_POST['masp'];
	$name=$_POST['nickname'];
	$noi_dung= $_POST['noi_dung'];
	$sl= "insert into binh_luan(masp,nickname,noi_dung) values(".$masp.",'".$name."','".$noi_dung."')";
	$exec= mysqli_query($connect, $sl);
	echo "<script> location.href='javascript: history.back(-1);'; </script>";
?>