<?php
	$masp= $_POST['masp'];
	if($masp==0){
		unset($_SESSION['giohang']);
	}
	else{
		unset($_SESSION['giohang'][$masp]);
	}
	echo "<script> location.href='javascript: history.back(-1);'; </script>";
?>