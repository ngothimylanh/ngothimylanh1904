<div class="product-info">
<?php
	include('connect.php');
	$sl= 'select * from san_pham join cau_hinh on san_pham.masp= cau_hinh.masp where san_pham.masp='.$_GET['masp'];
	$exec= mysqli_query($connect, $sl);
	$row= mysqli_fetch_array($exec);
	$sql= "update san_pham set xem_nhieu=xem_nhieu + 1 where masp=".$_GET['masp'];
	$ex= mysqli_query($connect, $sql);
	$tg= $row['rate1']+$row['rate2']+$row['rate3']+$row['rate4']+$row['rate5'];
	if($tg==0){
		$avg=0;
	}else{
	$avg= $row['rate1']/($tg*5)+$row['rate2']/($tg*4)+$row['rate3']/($tg*3)+$row['rate4']/($tg*2)+$row['rate5']/($tg*1);
	}
	$avg=$avg*10;
?>	
<script type="text/javascript">

    $(document).ready(function() {
        document.title = '<?php echo $row['tensp']; ?>';
    });
    

</script>
	<div class="panel panel-default">
      <div class="panel-heading"><span style="font-weight: bold; color: "><?php echo $row['tensp']; ?></span>
<script>
	$(document).ready(function(){
      $(".jRating").jRating();
    });

</script>
</div>
      <div class="panel-body">
	<form>
		<div class="img-sp col-xs-12 col-sm-12 col-md-6 col-lg-6">
		<script>
							function img1(){
								document.getElementById('img').src="images/<?php echo $row['img']; ?>";
							}
							function img2(){
								document.getElementById('img').src="images/<?php echo $row['img1']; ?>";
							}
							function img3(){
								document.getElementById('img').src="images/<?php echo $row['img2']; ?>";
							}
							function img4(){
								document.getElementById('img').src="images/<?php echo $row['img3']; ?>";
							}
							function img5(){
								document.getElementById('img').src="images/<?php echo $row['img4']; ?>";
							}
		</script>
			<img id="img" class="img-thumbnail" src="images/<?php echo $row['img']; ?>" alt="">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div style="margin-left: -10px; padding-top: 10px;">
					<img class="img-thumbnail" src="images/<?php echo $row['img']; ?>" style="width: 50px; height: 50px;" onclick="img1();" alt="">
					<img class="img-thumbnail" src="images/<?php echo $row['img1']; ?>" style="width: 50px; height: 50px;" onclick="img2();" alt="">
					<img class="img-thumbnail" src="images/<?php echo $row['img2']; ?>" style="width: 50px; height: 50px;" onclick="img3();" alt="">
					<img class="img-thumbnail" src="images/<?php echo $row['img3']; ?>" style="width: 50px; height: 50px;" onclick="img4();" alt="">
					<img class="img-thumbnail" src="images/<?php echo $row['img4']; ?>" style="width: 50px; height: 50px;" onclick="img5();" alt="">
				</div>
			</div>
		</div>
		<div class="info_sp col-xs-12 col-sm-12 col-md-6 col-lg-6">			
			<input type="hidden" name="menu" value="addcart">
			<input type="hidden" name="masp" value="<?php echo $row['masp'] ?>">
			<span style="font-size: 20px; font-weight: bold;"><?php echo $row['tensp']; ?></span>
			<div class="jRating" data-average="<?php echo $avg; ?>" data-id="1"> </div>
				<span style="font-size: 14px; ">(Bảo hành 12 tháng)</span><br>
			
			<span style="color: #BB4040; font-weight: bold; font-size: 26px;"><?php echo number_format($row['giasp'],0,",",".")."đ"; ?></span></br>
			Giá cũ: <del><span class="f-18 f-w-900 text-c-red"><?php echo number_format($row['giasp']+500000,0,",",".")." VNĐ"; ?></span></del></br>
			<span style="font-size: 14px; ">(Giá đã bao gồm 10% VAT)</span><br>
			<span style="color: black; font-size: 16px; font-weight: bold; margin-top: 15px;  ">Trạng thái: <?php

if ($row['soluong'] > 0) {
    echo '<span style="color: #337ab7; font-size: 18px;">Còn hàng</span>';
    $initialQuantity = 1; 
    $maxQuantity = $row['soluong']; 
    $addToCartEnabled = true; 
} else {
    echo '<span style="color: #DC143C; font-size: 18px;">Hết hàng</span>';
    $initialQuantity = 0; 
    $maxQuantity = 0; 
    $addToCartEnabled = false; 
}
?></span><br>

<span style="margin-top: 10px;">Số lượng:
    <input type="number" class="ngaythangnam" style="width: 100px; height: 30px; border-radius: 10px; border: solid silver 1px; padding-left: 10px;" size="4" name="soluong" id="soluong" value="<?php echo $initialQuantity; ?>" <?php echo $addToCartEnabled ? '' : 'disabled'; ?> oninput="checkNonNegative(this)">
 
    <script>
        function checkNonNegative(input) {
            var maxQuantity = <?php echo $maxQuantity; ?>;

            if (input.value < 1) {
                input.value = 1;
            } else if (input.value > maxQuantity) {
                input.value = maxQuantity;
            }
        }

        function increaseQuantity() {
            var inputElement = document.getElementById('soluong');
            var maxQuantity = <?php echo $maxQuantity; ?>;

            if (inputElement.value < maxQuantity) {
                inputElement.value++;
            } else {
                alert('Sorry, the product is out of stock.');
            }
        }
    </script>
</span>


			<p class="alert alert-success" style="margin-top: 10px; ">
				<span>Khuyến mãi tặng kèm:</span><br>
				<span><span style="margin-left: 10px;" class="fa fa-check"></span> Sạc dự phòng Romoss 10400mAh.</span><br>
				<span><span style="margin-left: 10px;" class="fa fa-check"></span> Miếng dán màng hình 120.000đ.</span>
			</p>
			<a href="#" onclick="buyNow('<?php echo $row['masp']; ?>')" style="padding: 15px; font-size: 18px; background-color: #337ab7;" class="btn btn-primary">Mua ngay</a>

<script>
function buyNow(masp) {
    var soluong = prompt("Nhập số lượng:");
    if (soluong !== null) {
        window.location.href = "?menu=mua_ngay&masp=" + masp + "&soluong=" + soluong;
    }
}
</script>



			<input type="submit" class="btn btn-warning" style="padding: 15px; font-size: 18px" value="Thêm vào giỏ hàng">

		</div>
	</form>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding-top: 10px;">
		<ul class="nav nav-pills">
			<li class="active">
				<a data-toggle="pill" href="#thong_tin">Thông tin</a>
			</li>
			<li>
				<a data-toggle="pill" href="#chi_tiet">Chi tiết</a>
			</li>
			<li>
				<a data-toggle="pill" href="#binh_luan">Bình luận</a>
			</li>
			<li>
				<a data-toggle="pill" href="#danh_gia">Đánh giá</a>
			</li>
		</ul>	
		<div class="tab-content">
			<div id="thong_tin" class="tab-pane fade in  active">
				<table class="table">
					<tr>
						<td colspan="2" align="center"><label>Thông tin cấu hình</label></td>
					</tr>
					<tr>
						<td><label>Màn hình:</label></td>
						<td><?php echo $row['man_hinh']; ?></td>
					</tr>
					<tr>
						<td><label>CPU:</label></td>
						<td><?php echo $row['cpu']; ?></td>
					</tr>
					<tr>
						<td><label>RAM:</label></td>
						<td><?php echo $row['ram']; ?></td>
					</tr>
					<tr>
						<td><label>Hệ điều hành:</label></td>
						<td><?php echo $row['he_dieu_hanh']; ?></td>
					</tr>
					<tr>
						<td><label>Camera trước:</label></td>
						<td><?php echo $row['camera_truoc']; ?></td>
					</tr>
					<tr>
						<td><label>Camera sau:</label></td>
						<td><?php echo $row['camera_sau']; ?></td>
					</tr>
					<tr>
						<td><label>Bộ nhớ trong:</label></td>
						<td><?php echo $row['bo_nho_trong']; ?></td>
					</tr>
					<tr>
						<td><label>Thẻ nhớ:</label></td>
						<td><?php echo $row['the_nho']; ?></td>
					</tr>
					<tr>
						<td><label>Pin:</label></td>
						<td><?php echo $row['pin']; ?></td>
					</tr>
				</table>
			</div>
			<div id="chi_tiet" class="tab-pane fade in">
				<table class="table">
					<tr>
						<td colspan="2" align="center"><label>Thông tin cấu hình chi tiết</label></td>
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
			</div>
			<div id="binh_luan" class="tab-pane fade in">
				<?php include('chuc_nang/binh_luan/binh_luan.php'); ?>
			</div>
			<div id="danh_gia" class="tab-pane fade in">
				<?php include('chuc_nang/rate/rate_form.php'); ?>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"  style="padding-top: 10px;">
		<table class="table">
			<tr>
				<td class="alert alert-success"><label>Nhận xét</label></td>
			</tr>
		<?php
			if(isset($_GET['page'])){
		$page=$_GET['page'];
		}else{
			$page=1;
		}
		$start=1;
		$page=$page-1;
		$limit= 20;
		$sl= "select * from binh_luan where masp=".$_GET['masp']." limit ".$page.",".$limit;
		$exec= mysqli_query($connect, $sl);
		$total= mysqli_num_rows($exec);
		$total=$total/$limit;
		$total= ceil($total);
		$start= $limit*$page;
		while($row= mysqli_fetch_array($exec)){
		?>
			<tr>
				<td>
					<label><?php echo $row['nickname']; ?>:</label><br>
					<span style="padding-left: 10px;"><?php echo $row['noi_dung']; ?></span>
				</td>
			</tr>
			<?php } ?>
			<tr>
				<td align="center">
					<nav>
			  <ul class="pagination">
					<?php 
						for($i=1; $i<=$total;$i++){
					?>
			    <li><a href="?menu=&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
					<?php } ?>
					</ul>
					</nav>
				</td>
			</tr>
		</table>
	</div>
	</div>
	</div>
</div>