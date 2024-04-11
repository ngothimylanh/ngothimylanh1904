<?php
	if(!isset($login)){exit();}
?>
<?php 
	include('../connect.php');
	$id= $_GET['id'];
	$sl='select * from menu_ngang where id='.$id;
	$exec= mysqli_query($connect,$sl);
	$row= mysqli_fetch_array($exec);	
?>
<div class="sua_menu">
<form action="?menu=exec_sua_menu_ngang" method="post">
	<table style="width:92%;margin-left:55px; border-collapse: collapse;">
	<tr align="center">
<p style="font-weight: bold; font-size: 25px;text-align: center; margin-top:40px;">SỬA MENU NGANG</p>
</tr>
	<tr>
			<td class="right" style="width:50%;"><label for="title">Tên menu: </label></td>
			<td style="width:50%;"><input type="hidden" name="id" value="<?php echo $row['id']; ?>"><input type="text" id="title" name="title" value="<?php echo $row['title']; ?>"></td>
		</tr>
		<tr>
			<td class="right" style="width:50%;"><label for="content">Nội dung: </label></td>
			<td style="width:50%;"><input type="text" id="content" name="content" value="<?php echo $row['content']; ?>"></td>
		</tr>
		<tr>
			<td class="right" style="width:50%;"><label for="loaimenu">Loại menu: </label></td>
			<td style="width:50%;"><select name="loaimenu" id="loaimenu">
					<option value="none" <?php if($row['loaimenu']== 'none') echo "selected"; ?> >None</option>
					<option value="san_pham" <?php if($row['loaimenu']== 'san_pham') echo "selected"; ?> >Danh Mục Sản Phẩm</option>
					<option value="thongtinweb" <?php if($row['loaimenu']== 'thongtinweb') echo "selected"; ?> >Thông Tin Trang Web</option>
					<option value="lienhe" <?php if($row['loaimenu']== 'lienhe') echo "selected"; ?> >Liên Hệ</option>
					<option value="tintuc" <?php if($row['loaimenu']== 'tintuc') echo "selected"; ?> >Tin Tức</option>
	
				</select>
			</td>
		</tr>
		<tr>
			<td class="right"><input type="submit" name="submit" value="Sửa"></td>
			<td><input type="submit" name="cancel" value="Hủy"></td>
		</tr>
	</table>
</form>
</div>