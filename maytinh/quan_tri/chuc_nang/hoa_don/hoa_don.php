<?php
	if(!isset($login)){exit();}
?>
<table style="width:92%; margin-left:55px; text-align: center;">
<tr align="center">
<p style="font-weight: bold; font-size: 25px;text-align: center; margin-top:40px;">DANH SÁCH ĐƠN HÀNG</p>
</tr>
<tr >
		<td style="color: white; background-color: #ec522b; padding:15px;"><label>MÃ HOÁ ĐƠN</label></td>
		<td style="color: white; background-color: #ec522b; padding:15px;"><label>TÊN KHÁCH HÀNG</label></td>
		<td style="color: white; background-color: #ec522b; padding:15px;"><label>NGÀY MUA</label></td>
		<td style="color: white; background-color: #ec522b; padding:15px;"><label>XỬ LÝ</label></td>
		<td style="color: white; background-color: #ec522b; padding:15px;"><label>XOÁ</label></td>
	</tr>
<?php 
	include('../connect.php');
	$sl="select * from hoa_don";
	$exec= mysqli_query($connect, $sl);
	while($row=mysqli_fetch_array($exec)){ 
?>
	<tr>
		<td style="padding:15px;"><?php echo $row['ma_hoadon']; ?></td>
		<td style="padding:15px;"><a href="?menu=chi_tiet_hoa_don&ma_hoadon=<?php echo $row['ma_hoadon']; ?>"><?php echo $row['tenkh']; ?></a></td>
		<td style="padding:15px;"><?php echo $row['ngay_mua']; ?></td>
		<td style="padding:15px;"><?php echo $row['xu_ly']; ?></td>
		<td style="padding:15px;"><a  style="text-decoration: none; padding: 5px 15px; background-color: #ec522b; color: #fffafa;" onclick="return confirm('Bạn có muốn xóa hóa đơn?');" href="?menu=xoa&ma_hoadon=<?php echo $row['ma_hoadon']; ?>">Xóa</a></td>
	</tr>
	<?php } ?>
</table>