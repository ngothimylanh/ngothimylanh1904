<?php 
	include('connect.php');
	$sl= "select * from thanh_vien where username='".$_SESSION['username']."'";
	$exec= mysqli_query($connect, $sl);
	$row = mysqli_fetch_array($exec); 
?>
<div class="panel panel-primary" style="border: 0.1px solid #ec522b;">
	<div class="panel-heading" style="cursor: pointer; border: 0.1px solid #ec522b; background-color: #ec522b;">THÔNG TIN THÀNH VIÊN</div>
	<div class="panel-body">
<table class="table">
	<tr>
		<td style="width: 20%;"><label>Họ và tên: </label></td>
		<td><?php echo $row['hoten']; ?></td>
	</tr>
	<tr>
		<td style="width: 20%;"><label>Ngày sinh: </label></td>
		<td>
			<?php 
				$ngaysinh= $row['ngaysinh']; 
				$array= explode("-",$ngaysinh);
				$nam= $array[0];
				$thang= $array[1];
				$ngay= $array[2];
				$ngaysinh= $ngay."-".$thang."-".$nam;
				echo $ngaysinh;
			?>
		</td>
	</tr>
	<tr>
		<td style="width: 20%;"><label>Giới tính: </label></td>
		<td><?php echo $row['gioitinh']; ?></td>
	</tr>
	<tr>
		<td style="width: 20%;"><label>Số CMND: </label></td>
		<td><?php echo $row['cmnd']; ?></td>
	</tr>
	<tr>
		<td style="width: 20%;"><label>Địa chỉ: </label></td>
		<td>
			<?php 
				echo $row['diachi'];
			?>				
		</td>
	</tr>
	
	<tr>
		<td style="width: 20%;"><label>Email: </label></td>
		<td><?php echo $row['email']; ?></td>
	</tr>
	<tr>
		<td style="width: 20%;"><label>Số điện thoại: </label></td>
		<td><?php echo $row['sdt']; ?></td>
	</tr>
	<tr align="center">
		<td colspan="2">
			<a class="btn btn-primary" href="?menu=sua_tt_thanh_vien" style="width: 100px; color: #fff;  margin-left: 30px;background-color: #337ab7; border:none; margin-top:30px;">Chỉnh sửa</a>
			<a class="btn btn-primary" href="?menu=thanh_vien" style="width: 100px; color: #fff;  margin-left: 30px;background-color: #DC143C; border:none; margin-top:30px;">Huỷ</a>
		</td>
	</tr>
</table>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        document.title = 'Thành viên';
    });
</script>