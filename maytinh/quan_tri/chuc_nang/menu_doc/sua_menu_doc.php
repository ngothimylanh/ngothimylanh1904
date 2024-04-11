<?php
	if(!isset($login)){exit();}
?>
<?php 
	include('../connect.php');
	$id= $_GET['id'];
	$sl='select * from menu_doc where id='.$id;
	$exec= mysqli_query($connect,$sl);
	$row= mysqli_fetch_array($exec);	
?>
<div class="sua_menu">
<form action="?menu=exec_sua_menu_doc" method="post">
	<table style="width:92%;margin-left:55px; border-collapse: collapse;">
	<tr align="center">
<p style="font-weight: bold; font-size: 25px;text-align: center; margin-top:40px;">SỬA MENU DỌC</p>
</tr>
	<tr>
			<td class="right" style="width:50%;"><label for="title">Tên menu: </label></td>
			<td style="width:50%;"><input type="hidden" name="id" value="<?php echo $row['id']; ?>"><input type="text" id="title" name="title" value="<?php echo $row['title']; ?>"></td>
		</tr>
		<tr>
			<td class="right" style="width:50%;"><label for="sub_1">Sub_Menu 1:</label></td>
			<td style="width:50%;"><input type="text" id="sub_1" name="sub_1" value="<?php echo $row['sub_1']; ?>"></td>
		</tr>
		<tr>
			<td class="right" style="width:50%;"><label for="sub_1_kink">Sub_Menu 1 (link):</label></td>
			<td style="width:50%;"><input type="text" id="sub_1_link" name="sub_1_link" value="<?php echo $row['sub_1_link']; ?>"></td>
		</tr>
		<tr>
			<td class="right" style="width:50%;"><label for="sub_2">Sub_Menu 2:</label></td>
			<td style="width:50%;"><input type="text" id="sub_2" name="sub_2" value="<?php echo $row['sub_2']; ?>"></td>
		</tr>
		<tr>
			<td class="right" style="width:50%;"><label for="sub_2_kink">Sub_Menu 2 (link):</label></td>
			<td style="width:50%;"><input type="text" id="sub_2_link" name="sub_2_link" value="<?php echo $row['sub_2_link']; ?>"></td>
		</tr>
		<tr>
			<td class="right" style="width:50%;"><label for="sub_3">Sub_Menu 3:</label></td>
			<td style="width:50%;"><input type="text" id="sub_3" name="sub_3" value="<?php echo $row['sub_3']; ?>"></td>
		</tr>
		<tr>
			<td class="right" style="width:50%;"><label for="sub_3_kink">Sub_Menu 3 (link):</label></td>
			<td style="width:50%;"><input type="text" id="sub_3_link" name="sub_3_link" value="<?php echo $row['sub_3_link']; ?>"></td>
		</tr>
		<tr>
			<td class="right" style="width:50%;"><label for="sub_4">Sub_Menu 4:</label></td>
			<td style="width:50%;"><input type="text" id="sub_4" name="sub_4" value="<?php echo $row['sub_4']; ?>"></td>
		</tr>
		<tr>
			<td class="right" style="width:50%;"><label for="sub_4_kink">Sub_Menu 4 (link):</label></td>
			<td style="width:50%;"><input type="text" id="sub_4_link" name="sub_4_link" value="<?php echo $row['sub_4_link']; ?>"></td>
		</tr>
		<tr>
			<td class="right" style="width:50%;"><input type="submit" name="submit" value="Sửa"></td>
			<td style="width:50%;"><input type="submit" name="cancel" value="Hủy"></td>
		</tr>
	</table>
</form>
</div>