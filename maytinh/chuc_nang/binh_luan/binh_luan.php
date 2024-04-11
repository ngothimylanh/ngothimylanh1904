<form action="?menu=exec_binh_luan" method="post">
	<table class="table">
	<input type="hidden" name="masp" value="<?php echo $row['masp']; ?>">
		<tr><td colspan="2"><label>Bình luận</label></td></tr>
		<tr>
			<td>Tên tài khoản: </td>
			<td><input type="text" class="form-control" name="nickname" placeholder="Tên tài khoản..."></td>
		</tr>
		<tr>
			<td>Nội dung: </td>
			<td><textarea name="noi_dung" style="resize: none;" id="noi_dung" cols="40" rows="5" class="form-control" placeholder="Nhập nội dung bình luận..."></textarea></td>
		</tr>
		<tr class="text-center">
			<td colspan="2"><input class="btn btn-primary" type="submit" name="submit" value="Bình luận"></td>
		</tr>
	</table>
</form>