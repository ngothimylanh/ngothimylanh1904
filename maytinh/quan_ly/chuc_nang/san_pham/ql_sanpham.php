<?php
	if(!isset($login)){exit();}
?>
<table style="width:92%; margin-left:55px; text-align: center;">
<tr align="center">
<p style="font-weight: bold; font-size: 25px;text-align: center; margin-top:40px;">DANH SÁCH SẢN PHẨM</p>
</tr>
	<tr>
		<td style="color: white; background-color: #337ab7; padding:15px;"><label>TÊN SẢN PHẨM</label></td>
		<td style="color: white; background-color: #337ab7; padding:15px;"><label>GIÁ SẢN PHẨM</label></td>
		<td style="color: white; background-color: #337ab7; padding:15px;"><label>HÌNH ẢNH</label></td>
		<td style="color: white; background-color: #337ab7; padding:15px;"><label>LOẠI SẢN PHẨM</label></td>
		<td style="color: white; background-color: #337ab7; padding:15px;" width="100px"><label>CHI TIẾT</label></td>
		<td style="color: white; background-color: #337ab7; padding:15px;" colspan="2" align="center"><a  style="font-weight: bold;text-decoration: none; padding: 5px 15px; background-color: #337ab7; color: #fffafa;"  href="?menu=them_sp">THÊM</a></td>
	</tr>
<?php 
	include('../connect.php');
	$sl= "select * from san_pham";
	$exec= mysqli_query($connect, $sl);
	while($row= mysqli_fetch_array($exec)){
?>
	<tr>
		<td><?php echo $row['tensp']; ?></td>
		<td><?php echo number_format($row['giasp'],0,",",".")."đ"; ?></td>
		<td>
			<img src="../images/<?php echo $row['img']; ?>"  width="60px" height="80px" alt="">
			<img src="../images/<?php echo $row['img1']; ?>"  width="60px" height="80px" alt="">
			<img src="../images/<?php echo $row['img2']; ?>"  width="60px" height="80px" alt="">
			<img src="../images/<?php echo $row['img3']; ?>"  width="60px" height="80px" alt="">
			<img src="../images/<?php echo $row['img4']; ?>"  width="60px" height="80px" alt="">
		</td>
		<td><?php echo $row['loaisp']; ?></td>
		<td><a style="text-decoration: none; padding: 5px 15px; background-color:#337ab7; color: #fffafa;"  href="?menu=chi_tiet&masp=<?php echo $row['masp']; ?>">Chi tiết</a></td>
		<td><a  style="text-decoration: none; padding: 5px 15px; background-color: #337ab7; color: #fffafa;"  href="?menu=sua_sp&masp=<?php echo $row['masp']; ?>">Sửa</a></td>
		<td><a  style="text-decoration: none; padding: 5px 15px; background-color: #337ab7; color: #fffafa;" onclick="return confirm('Bạn có mún xóa không?');" href="?menu=xoa_sp&masp=<?php echo $row['masp']; ?>">Xóa</a></td>
	</tr>
<?php  } ?>
</table>