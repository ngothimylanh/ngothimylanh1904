<?php
	if(isset($_POST['submit'])){
	include('connect.php');
	$kt = 0; 
	$sql = "SELECT * FROM thanh_vien";
	$execc = mysqli_query($connect, $sql);
	while ($row2 = mysqli_fetch_array($execc)) {
    	if ($row2['username'] == $_POST['username']) {
        	$kt = 1;
        	break; 
   		}
	}
$value = isset($_POST['value']) ? $_POST['value'] : '';
if($kt == 0){
	$cmnd= $_POST['cmnd'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password = md5($password);
	$password = md5($password);
	$repass= $_POST['re-pass'];
	$repass= md5($repass);
	$repass= md5($repass);
	if($password==$repass){
	$hoten = $_POST['hoten'];
	$ngaysinh = "'".$_POST['nam']."-".$_POST['thang']."-".$_POST['ngay']."'";
	$gioitinh = $_POST['gioitinh'];
	$email = $_POST['email'];
	$sdt = $_POST['sdt'];
	$diachi = $_POST['diachi'];
	$xaphuong = $_POST['xaphuong'];
	$sqll= "select ward.type as wardtype, ward.name as wardname , district.type as districttype, district.name districtname, province.type  as provincetype, province.name as provincename from province join district on province.provinceid=district.provinceid join ward on ward.districtid=district.districtid where ward.wardid='".$xaphuong."'";
	$exc= mysqli_query($connect,$sqll);
	$row1= mysqli_fetch_array($exc); 
	$diachi= $diachi.", ".$row1['wardtype']." ".$row1['wardname'].", ".$row1['districttype']." ".$row1['districtname'].", ".$row1['provincetype']." ".$row1['provincename'];
	$sl="insert into thanh_vien values('".$cmnd."','".$username."','".$password."','".$hoten."',".$ngaysinh.",'".$gioitinh."','".$email."','".$sdt."','".$diachi."')";
	$exec= mysqli_query($connect,$sl);
	if($exec){
	?>
		<p class="alert alert-success" style=" background-color: #ec522b; color: #fff;">Bạn đã đăng ký thành công. Kiểm tra email để nhận thông tin tài khoản và đăng nhập ngay. Cần hỗ trợ gì đừng ngần ngại hãy liên hệ với chúng tôi qua email. Trân trọng cảm ơn!<br> Bấm<a href="?menu=dang_nhap" style="color: #337ab7;"> vào đây </a> để đăng nhập và mua hàng.</p>
	<?php 
	}
	else{
		echo "Đăng ký thất bại <br>";
		echo 'Bấm<a href="javascript:history.back(-1);"> vào đây </a> để quay lại trang đăng ký';
	}}
	else{
		echo "<script> alert('Mật khẩu bạn nhập lại chưa chính xác'); location.href='?menu=dang_ky'; </script>";
	}
}else{
	echo "<script> alert('Tên đăng nhập đã có người sử dụng.'); location.href='?menu=dang_ky'; </script>";
}
	}
else{
	if(isset($_POST['cancel'])){
	echo "<script> location.href='index.php'; </script>";
}
}
?>