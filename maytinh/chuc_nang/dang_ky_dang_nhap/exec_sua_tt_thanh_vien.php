<?php
	if(isset($_POST['submit'])){
	include('connect.php');
	$cmnd= $_POST['cmnd'];
	$hoten = $_POST['hoten'];
	$ngaysinh = "'".$_POST['nam']."-".$_POST['thang']."-".$_POST['ngay']."'";
	$gioitinh = $_POST['gioitinh'];
	$email = $_POST['email'];
	$sdt = $_POST['sdt'];
	$diachi = $_POST['diachi'];
	$diachi = $_POST['diachi'];
	$xaphuong = $_POST['xaphuong'];
	$sqll= "select ward.type as wardtype, ward.name as wardname , district.type as districttype, district.name districtname, province.type  as provincetype, province.name as provincename from province join district on province.provinceid=district.provinceid join ward on ward.districtid=district.districtid where ward.wardid='".$xaphuong."'";
	$exc= mysqli_query($connect,$sqll);
	$row1= mysqli_fetch_array($exc); 
	$diachi= $diachi.", ".$row1['wardtype']." ".$row1['wardname'].", ".$row1['districttype']." ".$row1['districtname'].", ".$row1['provincetype']." ".$row1['provincename'];

	
	$sl="update thanh_vien set cmnd='".$cmnd."',hoten='".$hoten."',ngaysinh=".$ngaysinh.",gioitinh='".$gioitinh."',email='".$email."',sdt='".$sdt."',diachi='".$diachi."' where username='".$_SESSION['username']."'";
	$exec= mysqli_query($connect,$sl);
	if($exec){ ?>
		<p class="alert alert-success" style=" background-color: #ec522b; color: #fff;">Thông tin đã cập nhật thành công. Chúng tôi sẽ chỉnh sửa hồ sơ của bạn. Cảm ơn bạn đã tin tưởng và sử dụng dịch vụ.<br>Bấm<a href="?menu=thanh_vien" style="color: #337ab7;"> vào đây </a> để xem</p>
	<?php }
	else{
		echo $sl;
		echo "Chỉnh sửa thất bại <br>";
		echo 'Bấm<a href="javascript:history.back(-1);"> vào đây </a> để quay lại trang sửa chữa';
	}
	}
	if(isset($_POST['cancel'])){
	echo "<script> location.href='index.php'; </script>";
}
?>