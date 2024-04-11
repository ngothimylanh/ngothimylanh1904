<?php
	if(!isset($login)){exit();}
?>
<div class="them_menu">
<form action="?menu=exec_them_menu_ngang" method="post">
	<table style="width:92%;margin-left:55px; border-collapse: collapse;">
	<tr align="center">
<p style="font-weight: bold; font-size: 25px;text-align: center; margin-top:40px;">THÊM MENU NGANG</p>
</tr>
		<tr>
			<td class="right" style="width:50%;"><label for="title">Tên menu: </label></td>
			<td style="width:50%;"><input type="text" id="title" name="title"></td>
		</tr>
		<tr>
			<td class="right" style="width:50%;"><label for="content">Nội dung: </label></td>
			<td style="width:50%;"><input type="text" id="content" name="content"></td>
		</tr>
		<tr>
			<td class="right" style="width:50%;"><label for="loaimenu">Loại menu: </label></td>
			<td style="width:50%;"><select name="loaimenu" id="loaimenu">
					<option value="none">None</option>
					<option value="san_pham">Danh Mục Sản Phẩm</option>
					<option value="thongtinweb">Thông Tin Trang Web</option>
					<option value="lienhe">Liên Hệ</option>
					<option value="tintuc">Tin Tức</option>
				</select>
			</td>
		</tr>
		<tr>
			<td class="right"><input type="submit" name="submit" value="Thêm"></td>
			<td><input type="submit" name="cancel" value="Hủy"></td>
		</tr>
	</table>
</form>
</div>