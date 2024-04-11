<?php
	if(!isset($login)){exit();}
?>
<form action="?menu=exec_them_anh_slide" method="post" enctype="multipart/form-data">
	<table style="width:92%;margin-left:55px; border-collapse: collapse;">
	<tr align="center">
<p style="font-weight: bold; font-size: 25px;text-align: center; margin-top:40px;">THÊM BANNER QUẢNG CÁO</p>
</tr>
		<tr>
			<td class="right" style="width:50%; padding:15px;"><label for="image">Hình ảnh: </label></td>
			<td style="width:50%;"><input type="file" name="image" id="image"></td>
		</tr>
		<tr>
			<td class="right" style="width:50%;padding:15px;"><label for="note">Ghi chú:</label></td>
			<td style="width:50%;">
				<select name="note" id="note">
					<option value="">None</option>
					<option value="active">Active</option>	
				</select>
			</td>
		</tr>
		<tr>
			<td class="right" style="width:50%;"><input type="submit" name="submit" value="Thêm"></td>
			<td style="width:50%;"><input type="submit" name="cancel" value="Hủy"></td>
		</tr>
	</table>
</form>