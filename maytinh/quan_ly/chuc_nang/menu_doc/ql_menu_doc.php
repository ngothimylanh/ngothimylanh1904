<?php
	if(!isset($login)){exit();}
?>
<div class="ql_menu_doc">
	<table style="width:95%;margin-left:20px; border-collapse: collapse;">
	<tr align="center">
<p style="font-weight: bold; font-size: 25px;text-align: center; margin-top:40px;">DANH SÁCH MENU DỌC</p>
</tr>
		<tr>
			<td style="text-align: center;color: white; background-color: #337ab7; padding:6px;font-weight: bold;">TÊN MENU</td>
			<td style="text-align: center;color: white; background-color: #337ab7; padding:6px;font-weight: bold;">MENU_1</td>
			<td style="text-align: center;color: white; background-color: #337ab7; padding:6px;font-weight: bold;">MENU_1(LINK)</td>
			<td style="text-align: center;color: white; background-color: #337ab7; padding:6px;font-weight: bold;">MENU_2</td>
			<td style="text-align: center;color: white; background-color: #337ab7; padding:6px;font-weight: bold;">MENU_2(LINK)</td>
			<td style="text-align: center;color: white; background-color: #337ab7; padding:6px;font-weight: bold;">MENU_3</td>
			<td style="text-align: center;color: white; background-color: #337ab7; padding:6px;font-weight: bold;">MENU_3(LINK)</td>
			<td style="text-align: center;color: white; background-color: #337ab7; padding:6px;font-weight: bold;">MENU_4</td>
			<td style="text-align: center;color: white; background-color: #337ab7; padding:6px;font-weight: bold;">MENU_4(LINK)</td>
			<td colspan="2" align="center" style="text-align: center;background-color: #337ab7; padding:6px;font-weight: bold;"><a href="?menu=them_menu_doc" style="color: white;">THÊM</a></td>
		</tr>
<?php 
	include('../connect.php');
	$sl="select * from menu_doc";
	$exec= mysqli_query($connect,$sl);
	while($row= mysqli_fetch_array($exec)){
?>
		<tr>
			<td style="text-align: center; height: 40px;"><?php echo $row['title']; ?></td>
			<td style="text-align: center;"><?php echo $row['sub_1']; ?></td>
			<td style="text-align: center;"><?php echo $row['sub_1_link']; ?></td>
			<td style="text-align: center;"><?php echo $row['sub_2']; ?></td>
			<td style="text-align: center;"><?php echo $row['sub_2_link']; ?></td>
			<td style="text-align: center;"><?php echo $row['sub_3']; ?></td>
			<td style="text-align: center;"><?php echo $row['sub_3_link']; ?></td>
			<td style="text-align: center;"><?php echo $row['sub_4']; ?></td>
			<td style="text-align: center;"><?php echo $row['sub_4_link']; ?></td>
			<td style="text-align: center;"><a href="?menu=sua_menu_doc&id=<?php echo $row['id']; ?>" style="  background-color:#337ab7; color:#fff; padding:5px 20px;">Sửa</a></td>
			<td style="text-align: center;"><a onclick="return confirm('Bạn có muốn xóa menu này không?');" href="?menu=xoa_menu_doc&id=<?php echo $row['id']; ?>"style="background-color:#337ab7; color:#fff;padding:5px 20px;">Xóa</a></td>
		</tr>
<?php } ?>
	</table>
</div>