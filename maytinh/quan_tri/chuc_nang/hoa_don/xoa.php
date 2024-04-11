<?php
	if(!isset($login)){exit();}
?>
<?php 
	include('../connect.php');
	$sl= "delete from hoa_don where ma_hoadon=".$_GET['ma_hoadon'];
	$exec= mysqli_query($connect, $sl);
	if($exec){
		echo "<script> alert('Xóa hóa đơn thành công'); location.href='?menu=hoa_don'; </script>";
	}else{
		echo "<script> alert('Xóa hóa đơn không thành công'); location.href='?menu=hoa_don'; </script>";
	}
?>