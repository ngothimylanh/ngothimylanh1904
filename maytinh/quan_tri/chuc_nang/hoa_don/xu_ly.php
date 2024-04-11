<?php
	if(!isset($login)){exit();}
?>
<?php 
	include('../connect.php');
	$sl='update hoa_don set xu_ly="Đã xử lý" where ma_hoadon='.$_GET['ma_hoadon'];
	$exec= mysqli_query($connect,$sl);
	if($exec){
		echo "<script> alert('Đã xử lý hóa đơn'); location.href='?menu=hoa_don'; </script>";
	}else{
		echo "<script> alert('Hóa đơn chưa được xử lý'); location.href='?menu=hoa_don'; </script>";
	}
?>