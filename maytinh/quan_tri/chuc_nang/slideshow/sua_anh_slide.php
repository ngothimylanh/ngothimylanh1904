<?php
	if(!isset($login)){exit();}
?>
<?php 
	include('../connect.php');
	$id=$_GET['id'];
	$sl= "select * from slideshow where id=".$id;
	$exec= mysqli_query($connect, $sl);
	$row= mysqli_fetch_array($exec);
?>
<form action="?menu=exec_sua_anh_slide" method="post" enctype="multipart/form-data">
	<table style="width:92%;margin-left:55px; border-collapse: collapse;">
	<tr align="center">
<p style="font-weight: bold; font-size: 25px;text-align: center; margin-top:40px;">SỬA BANNER QUẢNG CÁO</p>
</tr>
	<tr>
			<td class="right" style="width:50%; padding:15px;"><label for="image">Hình ảnh: </label></td>
			<td style="width:50%;"><img src="../images/slideshow/<?php echo $row['name']; ?>" width="200px" height="150px" alt=""><br><input type="file" name="image" id="image">
		</tr>
		<tr>
			<td class="right" style="width:50%; padding:15px;"><label for="note">Ghi chú:</label></td>
			<td style="width:50%;">
				<select name="note" id="note">
					<option value="" <?php if($row['note']==""){echo "selected";} ?> >None</option>
					<option value="active" <?php if($row['note']=="active"){echo "selected";} ?> >Active</option>	
				</select>
				<input type="hidden" name="imagename" value="<?php echo $row['name']; ?>">
				<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
			</td>
		</tr>
		<tr>
			<td class="right" style="width:50%; padding:15px;"><input type="submit" name="submit" value="Sửa"></td>
			<td style="width:50%;"><input type="submit" name="cancel" value="Hủy"></td>
		</tr>
	</table>
</form>