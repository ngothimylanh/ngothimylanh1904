<?php
	if(!isset($login)){exit();}
?>
<table style="width:90%;margin-left:70px; border-collapse: collapse;">
<tr align="center">
<p style="font-weight: bold; font-size: 25px;text-align: center; margin-top:40px;">CHI TIẾT SẢN PHẨM </p>
<?php 
	include('../connect.php');
	$sl= 'select * from san_pham join cau_hinh on san_pham.masp= cau_hinh.masp where san_pham.masp='.$_GET['masp'];
	$exec= mysqli_query($connect, $sl);
	$row= mysqli_fetch_array($exec);
?>
<tr>
	<td>
		<label>Tên sản phẩm: </label><br>
		<label>Giá sản phẩm: </label><br>
		<label>Số lượng sản phẩm: </label><br>
		<label>Loại sản phẩm: </label>
	</td>
		<td>
			<?php echo $row['tensp']; ?><br>
			<?php echo number_format($row['giasp'],0,",",".")."đ"; ?><br>
			<?php echo $row['soluong']; ?><br>
			<?php echo $row['loaisp']; ?>
		</td>
</tr>
<tr>
						<td>
							<label>Hệ điều hành:</label><br>
							<label>Ngôn ngữ:</label>
						</td>
						<td>
							<?php echo $row['he_dieu_hanh']; ?><br>
							<?php echo $row['ngon_ngu']; ?>
						</td>
					</tr>
					<tr>
						<td>
							<label>Màn hình:</label><br>
							<label>Loại màn hình:</label><br>
							<label>Độ phân giải:</label><br>
							<label>Màn hình rộng:</label>
						</td>
						<td>
							<?php echo $row['man_hinh']; ?><br>
							<?php echo $row['loai_man_hinh']; ?><br>
							<?php echo $row['do_phan_giai']; ?><br>
							<?php echo $row['kich_thuoc_man_hinh']; ?>
						</td>
					</tr>
					<tr>
						<td>
							<label>CPU:</label><br>
							<label>Tốc độ CPU:</label><br>
							<label>Chipset:</label><br>
							<label>Số nhân:</label><br>
							<label>RAM:</label><br>
							<label>Chip đồ họa:</label>
						</td>
						<td>
							<?php echo $row['cpu']; ?><br>
							<?php echo $row['toc_do_cpu']; ?><br>
							<?php echo $row['chipset']; ?><br>
							<?php echo $row['so_nhan']; ?><br>
							<?php echo $row['ram']; ?><br>
							<?php echo $row['chip_do_hoa']; ?>
						</td>
					</tr>
					<tr>
						<td>
							<label>Bộ nhớ trong:</label><br>
							<label>Thẻ nhớ:</label>
						</td>
						<td>
							<?php echo $row['bo_nho_trong']; ?><br>
							<?php echo $row['the_nho']; ?>
						</td>
					</tr>
					<tr>
						<td>
							<label>Camera trước:</label><br>
							<label>Camera sau:</label><br>
							<label>Quay phim:</label><br>
							<label>Video call:</label><br>
							<label>Đèn Flash:</label>
						</td>
						<td>
							<?php echo $row['camera_truoc']; ?><br>
							<?php echo $row['camera_sau']; ?><br>
							<?php echo $row['quay_phim']; ?><br>
							<?php echo $row['video_call']; ?><br>
							<?php echo $row['den_flash']; ?>
						</td>
					</tr>
					<tr>
						<td>
							<label>Loại sim:</label><br>
							<label>Số sim:</label><br>
							<label>3G/4G:</label><br>
							<label>GPRS/EDGE:</label><br>
							<label>Bluetooth:</label><br>
							<label>GPS:</label><br>
							<label>Wifi:</label><br>
							<label>Danh bạ:</label>
						</td>
						<td>
							<?php echo $row['loai_sim']; ?><br>
							<?php echo $row['so_sim']; ?><br>
							<?php echo $row['single3g4g']; ?><br>
							<?php echo $row['gprs_edge']; ?><br>
							<?php echo $row['bluetooth']; ?><br>
							<?php echo $row['gps']; ?><br>
							<?php echo $row['wifi']; ?><br>
							<?php echo $row['danh_ba']; ?>
						</td>
					</tr>
					<tr>
						<td>
							<label>Đa phương tiện:</label><br>
							<label>Chức năng khác:</label><br>
							<label>Kích thước:</label><br>
							<label>Khối lượng:</label><br>
							<label>Pin:</label>
						</td>
						<td>
							<?php echo $row['da_phuong_tien']; ?><br>
							<?php echo $row['chuc_nang_khac']; ?><br>
							<?php echo $row['kich_thuoc']; ?><br>
							<?php echo $row['khoi_luong']; ?><br>
							<?php echo $row['pin']; ?>
						</td>
					</tr>
</table>
