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
					<option value="mobile">Điện thoại</option>
					<option value="laptop">Laptop</option>
					<option value="tablet">Tablet</option>
					<option value="phu_kien">Phụ kiện</option>
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