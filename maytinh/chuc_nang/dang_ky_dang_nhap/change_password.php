<?php
	include('connect.php');
	$sl = "select * from thanh_vien where username='" . $_SESSION['username'] . "'";
	$exec = mysqli_query($connect, $sl);
	$row = mysqli_fetch_array($exec); 
?>
<div class="panel panel-primary" style="border: 0.1px solid #ec522b;">
	<div class="panel-heading" style="cursor: pointer; border: 0.1px solid #ec522b; background-color: #ec522b;">ĐỔI MẬT KHẨU</div>
	<div class="panel-body">
		<form action="?menu=exec_change_password" method="post">
			<table class="table">
				<tr>
					<td><label for="old_password">Mật khẩu cũ: </label></td>
					<td><input class="form-control" type="password" name="old_password" id="old_password" placeholder="Nhập mật khẩu cũ..." required style="width:470px; margin-left:20px;"></td>
				</tr>
				<tr>
					<td><label for="new_password">Mật khẩu mới: </label></td>
					<td><input class="form-control" type="password" name="new_password" id="new_password" placeholder="Nhập mật khẩu mới..." required style="width:470px; margin-left:20px;"></td>
				</tr>
				<tr>
					<td><label for="re_password">Mật khẩu mới: </label></td>
					<td><input class="form-control" type="password" name="re_password" id="re_password" placeholder="Nhập lại mật khẩu mới..." required style="width:470px; margin-left:20px;"></td>
				</tr>
			</table>
			<div class="button-container">
				<input type="submit" class="btn btn-capnhat" name="submit" value="Cập nhật" style="width: 100px; color: #fff; background-color: #337ab7; margin-left: 250px; margin-top: -15px">
				<form action="?menu=exec_dang_ky" method="post">
					<input type="submit" class="btn btn-huy" name="cancel" value="Hủy" style="width: 100px; color: #fff; background-color: #dc143c; margin-top: -15px">
				</form>
			</div>
		</form>
	</div>
</div>
