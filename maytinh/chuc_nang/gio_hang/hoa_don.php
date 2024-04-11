<?php
	include('connect.php');
	if(isset($_POST['submit'])){
	$tenkh= $_POST['tenkh'];
	$cmnd= $_POST['cmnd'];
	$email= $_POST['email'];
	$sdt= $_POST['sdt'];
	$diachi= $_POST['diachi'];
if(isset($_SESSION['username'])){
	$sp_mua=$_POST['sp_mua'];
	$list_id= $_POST['list_id'];
}
else{
	$xaphuong = $_POST['xaphuong'];
	$sqll= "select ward.type as wardtype, ward.name as wardname , district.type as districttype, district.name districtname, province.type  as provincetype, province.name as provincename from province join district on province.provinceid=district.provinceid join ward on ward.districtid=district.districtid where ward.wardid='".$xaphuong."'";
	$exc= mysqli_query($connect,$sqll);
	$row1= mysqli_fetch_array($exc); 
	$diachi= $diachi.", ".$row1['wardtype']." ".$row1['wardname'].", ".$row1['districttype']." ".$row1['districtname'].", ".$row1['provincetype']." ".$row1['provincename'];
	foreach($_SESSION['giohang'] as $masp=> $sp){
		$id_array[]= $masp;
		}
	$list_id= implode(',',$id_array);
	$sl= 'select * from san_pham where masp in ('.$list_id.')';
	$exec= mysqli_query($connect, $sl);
	$sp_mua="";
	while($row= mysqli_fetch_array($exec)){
		$soluong= $_SESSION['giohang'][$row['masp']];
		$gia_sp=$row['giasp'];
		$sp_mua= $sp_mua.$row['masp'].",".$soluong.",".$gia_sp."|";		
	}
}
	$sql1= "insert into hoa_don(cmnd,tenkh,email,sdt,dia_chi,sp_mua,xu_ly) values('".$cmnd."','".$tenkh."','".$email."','".$sdt."','".$diachi."','".$sp_mua."','Chưa')";
	$exec1= mysqli_query($connect,$sql1);
		if($exec1){
	$sql= "update san_pham set mua_nhieu=mua_nhieu + 1 where masp in (".$list_id.")";
	$ex= mysqli_query($connect, $sql);
			unset($_SESSION['giohang']);
		echo '<p class="alert alert-success" style=" background-color: #ec522b; color: #fff;">Mua hàng thành công! Cảm ơn bạn đã tin tưởng và chọn TECHNOLOGY. Chúng tôi sẽ chuẩn bị kỹ lưỡng để gửi sản phẩm chất lượng đến tay bạn. Kiểm tra email để xác nhận thông tin và theo dõi đơn hàng. Giữ liên lạc, nhân viên giao hàng sẽ liên hệ để sắp xếp thời gian phù hợp. Hy vọng sản phẩm sẽ làm bạn hài lòng. Liên hệ nếu cần hỗ trợ. Chúc bạn có một trải nghiệm mua sắm tuyệt vời!</p>';
		echo '<p class="alert alert-success" style=" background-color: #ec522b; color: #fff;">Bấm <a href="?menu=san_pham" style="color: #337ab7;">vào đây</a> để tiếp tục cuộc hành trình mua sắm. TECHNOLOGY sẵn sàng đồng hành, <br>mang đến trải nghiệm mua sắm tuyệt vời và sản phẩm chất lượng. Chúng tôi mong rằng <br>việc mua sắm tại TECHNOLOGY sẽ là trải nghiệm đáng nhớ và đáp ứng mong đợi của bạn. <br>Trân trọng cảm ơn!</p>';
	}
	else{
		echo "<script> alert('Mua hàng không thành công'); location.href='?menu=san_pham'; </script>";
	}
}
else{
	echo "<script> location.href='index.php'; </script>";
}
?>