
<div class="panel panel-primary"; style="border: 0.1px solid #ec522b;">
    <div class="panel-heading"; style="cursor: pointer; border: 0.1px solid #ec522b; background-color: #ec522b;">ĐĂNG KÝ TÀI KHOẢN</div>
    <div class="panel-body">
    <p class="alert alert-warning" style=" background-color: #ec522b; color: #fff;"><strong>Lưu ý: </strong>Các thông tin có dấu <span style="color: #DC143C;">(*)</span> đều là bắt buộc.</p>
    <form action="?menu=exec_dang_ky" method="post" role="form" data-toggle="validator">
	<table class="table">
		<tr>
			<td><label for="user">Tên đăng nhập:</label> <span style="color: #DC143C;">(*)</span></td>
			<td><input type="text" name="username" id="user" class="form-control" placeholder="Nhập tên đăng nhập.." required ></td>
		</tr>
		<tr>
			<td><label for="pass">Mật khẩu:</label> <span style="color: #DC143C;">(*)</span></td>
			<td><input type="password" name="password" id="pass" class="form-control" placeholder="Nhập mật khẩu.." required ></td>
		</tr>
		<tr>
			<td><label for="repass">Nhập lại mật khẩu:</label> <span style="color: #DC143C;">(*)</span></td>
			<td><input type="password" name="re-pass" class="form-control" id="repass" placeholder="Nhập lại mật khẩu.." required ></td>
		</tr>
		<tr>
			<td><label for="hoten">Họ và tên:</label> <span style="color:#DC143C;">(*)</span></td>
			<td><input type="text" name="hoten" id="hoten" class="form-control"  placeholder="Nhập họ và tên bạn.." required ></td>
		</tr>
		<tr>
			<td><label for="cmnd">Số CMND: </label> <span style="color: #DC143C;">(*)</span></td>
			<td><input type="text" name="cmnd" id="cmnd" class="form-control"  placeholder="Nhập số CMND.." required ></td>
		</tr>
		<tr>
			<td><label>Ngày sinh: </label> <span style="color: #DC143C;">(*)</span></td>
			<td>
				<select style="width: 100px; height: 36px; border: 0.1px solid silver; border-radius: 5px; padding-left: 10px;" name="ngay" id="ngaysinh" required >
				<?php for($i=1; $i<=31; $i++){ ?>
					<option value="<?php echo $i; ?>"><?php echo "Ngày ".$i; ?></option>
				<?php }?>
				</select>
				<select style="width: 100px; height: 36px; border: 0.1px solid silver; border-radius: 5px; padding-left: 10px;" name="thang" required >
				<?php for($j=1; $j<=12; $j++){ ?>
					<option value="<?php echo $j; ?>"><?php echo "Tháng ".$j; ?></option>
				<?php }?>
				</select>
				<select style="width: 120px; height: 36px; border: 0.1px solid silver; border-radius: 5px; padding-left: 10px;" name="nam" required >
				<?php for($y=1946; $y<=date('Y'); $y++){
					if($y==1997){
						$selected= "selected"; 
						}
					else{
						$selected= "";
						} ?>
					<option value="<?php echo $y; ?>" <?php echo $selected; ?> ><?php echo "Năm ".$y; ?></option>
				<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td><label for="gioitinh">Giới tính:</label> <span style="color: #DC143C;">(*)</span></td>
			<td>
				<select  class="form-control"  name="gioitinh" id="gioitinh" required >
					<option value="Nam">Nam</option>
					<option value="Nữ">Nữ</option>
					<option value="Khác">Khác</option>
				</select>
			</td>
		</tr>
		<tr>
			<td><label for="email">Email:</label> <span style="color: #DC143C;">(*)</span></td>
			<td><input type="email" name="email" id="email" class="form-control"  placeholder="Nhập địa chỉ Email..." required ></td>
		</tr>
		<tr>
			<td><label for="sdt">Số điện thoại:</label> <span style="color: #DC143C;">(*)</span></td>
			<td><input type="text" name="sdt" id="sdt" class="form-control"  placeholder="Nhập số điện thoại..." required ></td>
		</tr>
		<tr>
			<td><label for="diachi">Địa chỉ:</label> <span style="color: #DC143C;">(*)</span></td>
			<td><input type="text" name="diachi" id="diachi" class="form-control"  placeholder="Tổ, thôn..." required ></td>
		</tr>
		<tr>
			<td><label for="tinhtp">Tỉnh/Thành phố:</label> <span style="color: #DC143C;">(*)</span></td>
			<td>
				<select  class="form-control"  name="tinhtp" id="tinhtp" required >
					<option value="">--Tỉnh/Thành phố--</option>
					<?php 
						include('connect.php');
						$sl= "select * from province";
						$exec= mysqli_query($connect, $sl);
						while($row= mysqli_fetch_array($exec)){	
					?>
					<option value="<?php echo $row['provinceid']; ?>"><?php echo $row['type']." ".$row['name']; ?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td><label for="quanhuyen">Quận/Huyện:</label> <span style="color: #DC143C;">(*)</span></td>
			<td>
				<select  class="form-control"  name="quanhuyen" id="quanhuyen" required >
					<option value="">--Quận/Huyện--</option>
				</select>
			</td>
		</tr>
		<tr>
			<td><label for="xaphuong">Xã/Phường: </label> <span style="color: #DC143C;">(*)</span></td>
			<td>
				<select class="form-control"  name="xaphuong" id="xaphuong" required >
					<option value="">--Xã/Phường--</option>
				</select>
			</td>
		</tr>
	</table>
<div class="button-container">
    <input type="submit" class="btn btn-dangky" name="submit" value="Đăng ký" style="width: 100px; color: #fff; background-color: #337ab7; margin-left: 250px; margin-top: -15px;">
<form action="?menu=exec_dang_ky" method="post">
    <input type="submit" class="btn btn-huy" name="cancel" value="Hủy" style="width: 100px; color: #fff; background-color: #DC143C; margin-top: -15px;">
</form>
</div>
	</form>
	</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
    	document.title = 'Đăng ký';
    });
</script>