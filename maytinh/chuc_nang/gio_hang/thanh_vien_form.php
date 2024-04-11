<?php 
	$sql= "select * from thanh_vien where username='".$_SESSION['username']."'";
	$ex= mysqli_query($connect, $sql);
	$row2= mysqli_fetch_array($ex);
	$cmnd= $row2['cmnd'];
	$tenkh= $row2['hoten'];
	$email= $row2['email'];
	$sdt= $row2['sdt'];
	$diachi= $row2['diachi'];
	foreach($_SESSION['giohang'] as $masp=> $sp){
	$id_array[]= $masp;
}
$list_id= implode(',',$id_array);
$sl= 'select * from san_pham where masp in ('.$list_id.')';
$exec= mysqli_query($connect, $sl);
$sp_mua="";
$tg=0;
$list_product="";
	echo "Xin chào ".$tenkh.", TECHNOLOGY trân trọng cảm ơn sự lựa chọn của bạn. Cam kết <br> mang đến trải nghiệm tuyệt vời với sản phẩm chất lượng hàng đầu và ưu tiên sự hài lòng của <br> khách hàng. Liên hệ ngay nếu có câu hỏi hoặc cần hỗ trợ. Chúc bạn một ngày tuyệt vời!<br><br>";
?>
<div class="panel panel-primary" style="border: 0.1px solid #ec522b;">
	<div class="panel-heading" style="cursor: pointer; border: 0.1px solid #ec522b; background-color: #ec522b;">THÔNG TIN GIỎ HÀNG</div>
	<div class="panel-body">
<table style="border-collapse: collapse; width: 600px; ">
	<tr style="font-weight: bold; ">
		<td>Tên sản phẩm</td>
		<td>Đơn giá</td>
		<td>Số lượng</td>
		<td>Thành tiền</td>
	</tr>
<?php 
while($row= mysqli_fetch_array($exec)){
	$soluong= $_SESSION['giohang'][$row['masp']];
	$gia_sp=$row['giasp'];
	$masp= $row['masp'];
	$sp_mua= $sp_mua.$masp.",".$soluong.",".$gia_sp."|";
?>
	<tr>
		<td><?php echo $row['tensp']; ?></td>
		<td><?php echo number_format($gia_sp,0,",",".")."đ"; ?></td>
		<td><?php echo $soluong; ?></td>
		<td><?php echo number_format(($gia_sp*$soluong),0,",",".")."đ"; ?></td>
	</tr>
<?php
	$tg= $tg+ ($soluong*$gia_sp);
}
?>
	<tr height="40px" style="font-weight: bold;">
		<td colspan="3">TỔNG GIÁ TRỊ ĐƠN HÀNG:</td>
		<td><?php echo number_format($tg,0,",",".")."đ"; ?></td>
	</tr>
</table>
</div>
</div>
<p class="alert alert-success" style=" background-color: #ec522b; color: #fff;">Vui lòng bấm vào nút "Mua hàng" để xác nhận. TECHNOLOGY trân trọng cảm ơn bạn đã <br>tin tưởng và ủng hộ. Chúc bạn có một hành trình mua sắm đầy ý nghĩa!</p>
	
	<form id="form" action="?menu=hoa_don" method="post">
	<table style="width: 150px;">
		<tr>
			<td><input type="hidden" name="sp_mua" value="<?php echo $sp_mua; ?>">
			</td>
			<td><input type="hidden" name="tenkh" value="<?php echo $tenkh; ?>"></td>
			<td><input type="hidden" name="cmnd" value="<?php echo $cmnd; ?>">
			</td>
			<td><input type="hidden" name="email" value="<?php echo $email; ?>">
			</td>
			<td><input type="hidden" name="sdt" value="<?php echo $sdt; ?>">
			</td>
			<td><input type="hidden" name="diachi" value="<?php echo $diachi; ?>">
			<input type="hidden" name="list_id" value="<?php echo $list_id; ?>">
			</td>
		</tr>
		<tr >
			<td><input class="btn btn-primary" type="submit" name="submit" value="Mua hàng" style="width: 100px; color: #fff; background-color: #0074cc; margin-left: 250px; margin-right: 10px; margin-top: 10px;border:none;"></td>
			
			<td ><input class="btn btn-primary" type="submit" name="cancel" value="Hủy"  style="width: 100px; color: #fff; background-color: #DC143C; margin-top: 10px; border:none;"></td></tr>
	</table>
</form>
<script type="text/javascript">
    $(document).ready(function() {
        document.title = 'Giỏ hàng';
    });
</script>