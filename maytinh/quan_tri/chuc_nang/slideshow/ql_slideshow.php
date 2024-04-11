<?php
	if(!isset($login)){exit();}
?>
<table style="width:92%;margin-left:55px; border-collapse: collapse;">
<tr align="center">
<p style="font-weight: bold; font-size: 25px;text-align: center; margin-top:40px;">DANH SÁCH BANNER QUẢNG CÁO</p>
</tr>
	<tr>
		<td style="text-align: center;color: white; background-color: #ec522b; padding:15px;font-weight: bold;">TÊN FILE</td>
		<td style="text-align: center;color: white; background-color: #ec522b; padding:15px;font-weight: bold;">HÌNH ẢNH</td>
		<td style="text-align: center;color: white; background-color: #ec522b; padding:15px;font-weight: bold;">GHI CHÚ</td>
		<td colspan="2" align="center" style="text-align: center;background-color: #ec522b; padding:15px;font-weight: bold;"><a href="?menu=them_anh_slide" style="color: white;">THÊM</a></td>
	</tr>
<?php
	include('../connect.php');
	$sl= "select * from slideshow";
	$exec = mysqli_query($connect,$sl);
	while($row= mysqli_fetch_array($exec)){
?>
	<tr>
		<td style="text-align: center; height: 40px;"><?php echo $row['name']; ?></td>
		<td style="text-align: center;"><img src="../images/slideshow/<?php echo $row['name']; ?>" width="360px" height="150px" alt=""></td>
		<td style="text-align: center;"><?php echo $row['note']; ?></td>
		<td style="text-align: center;"><a href="?menu=sua_anh_slide&id=<?php echo $row['id']; ?>" style="  background-color:#ec522b; color:#fff; padding:5px 20px;">Sửa</a></td>
		<td style="text-align: center;"><a onclick="return confirm('Bạn có mún xóa ảnh này?');" href="?menu=xoa_anh_slide&id=<?php echo $row['id']; ?>" style="background-color:#ec522b; color:#fff;padding:5px 20px;">Xóa</a></td>
	</tr>
<?php } ?>
</table