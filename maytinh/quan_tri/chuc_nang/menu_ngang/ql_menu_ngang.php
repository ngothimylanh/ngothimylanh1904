<?php
	if(!isset($login)){exit();}
?>
<div class="ql_menu_ngang">
	<table style="width:92%;margin-left:55px; border-collapse: collapse;">
	<tr align="center">
<p style="font-weight: bold; font-size: 25px;text-align: center; margin-top:40px;">DANH SÁCH MENU NGANG</p>
</tr>
		<tr>
			<td style="text-align: center;color: white; background-color: #ec522b; padding:15px;font-weight: bold;">TÊN MENU</td>
			<td style="text-align: center;color: white; background-color: #ec522b; padding:15px;font-weight: bold;">NỘI DUNG</td>
			<td style="text-align: center;color: white; background-color: #ec522b; padding:15px;font-weight: bold;">LOẠI MENU</td>
			<td colspan="2" align="center" style="text-align: center;background-color: #ec522b; padding:15px;font-weight: bold;" ><a href="?menu=them_menu_ngang" style="color: white;">THÊM</a></td>
		</tr>
<?php 
	include('../connect.php');
	$sl="select * from menu_ngang";
	$exec= mysqli_query($connect,$sl);
	while($row= mysqli_fetch_array($exec)){
?>
		<tr>
			<td style="text-align: center; height: 40px;"><?php echo $row['title']; ?></td>
			<td style="text-align: center;"><?php echo $row['content']; ?></td>
			<td style="text-align: center;"><?php echo $row['loaimenu']; ?></td>
			<td style="text-align: center;"><a href="?menu=sua_menu_ngang&id=<?php echo $row['id']; ?>" style="  background-color:#ec522b; color:#fff; padding:5px 20px;">Sửa</a></td>
			<td style="text-align: center;"><a onclick="return confirm('Bạn có muốn xóa menu này không?');" href="?menu=xoa_menu_ngang&id=<?php echo $row['id']; ?>"style="background-color:#ec522b; color:#fff;padding:5px 20px;">Xóa</a></td>
		</tr>
<?php } ?>
	</table>
</div>