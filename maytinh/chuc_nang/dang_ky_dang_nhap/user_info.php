<?php
	include('connect.php');
	$sl= "select * from thanh_vien where username='".$_SESSION['username']."'";
	$exec= mysqli_query($connect, $sl);
	$row= mysqli_fetch_array($exec);
?>
<div class="panel panel-primary"; style="width: 280px; margin-left: 5px; margin-top:15px; border: 0.1px solid #ec522b;">
<div class="panel-heading"; style="cursor: pointer; border: 0.1px solid #ec522b; background-color: #ec522b; text-align: center;">THÀNH VIÊN</div>
<table class="table" >
	<tr>
		<td ><p style=" text-align: center;padding-left: 2px;font-weight: bold;color: #000000">KH: <?php echo $row['hoten']; ?></p></td>
	</tr> 
	<tr>
		<td ><p style="text-align: center;font-weight: bold;"><a href="?menu=change_password" style="color: #000000">Đổi mật khẩu</a></p></td>
	</tr>
	<tr>
		<td ><p style="text-align: center;font-weight: bold;"><a href="?menu=thanh_vien" style="color: #000000">Thông tin thành viên</a></p></td>
	</tr>
	<tr>
		<td><p style="text-align: center;padding-left: 2px;font-weight: bold;">Giỏ hàng: <a href="?menu=gio_hang"><?php echo $cart; ?></a> SP</p></td>
	</tr>
	<tr>
		<td><p style="width: 100px; margin-left: 80px; margin-top: 15px;"><a class="btn btn-primary" href="?menu=logout" style="background-color: #ec522b; border: 0.1px solid #ec522b;">ĐĂNG XUẤT</a></p></td>
	</tr>
</table>
</div>