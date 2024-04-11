<?php
	if(!isset($login)){exit();}
?>
<?php
	include('../connect.php');
	$masp= $_GET['masp'];
	$sll= "select * from san_pham where masp=".$masp;
	$execc= mysqli_query($connect, $sll);
	$row= mysqli_fetch_array($execc);
	$img_link= '../images/'.$row['img'];
	if(is_file($img_link)){
		unlink($img_link);
	}
	$sl="delete from san_pham where masp=".$masp;
	$exec= mysqli_query($connect, $sl);
	if($exec){
		header('location:?menu=ql_sanpham');
	}
	else{
		echo "<script> alert('Xóa sản phẩm không thành công'); location.href='?menu=ql_sanpham'; </script>";
	}
?>