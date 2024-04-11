<script type="text/javascript">

    $(document).ready(function() {
        document.title = 'Tìm kiếm';
    });

</script>
<table class="table">
	<tr>
	<td style="color: white; background-color: #ec522b; padding:15px;text-align: center;"><label>KẾT QUẢ TÌM KIẾM CHO TỪ KHOÁ '<?php echo $_GET['search']; ?>'</label></td>
	</tr>
<?php 
	$search= $_GET['search'];
	include('connect.php');
	$sl= "select * from san_pham where tensp like '%$search%'";
	$exec=mysqli_query($connect, $sl);
	$num= mysqli_num_rows($exec);
	if($_GET['search']==""){
		?>
	<tr>
		<td>Bạn chưa nhập từ khóa tìm kiếm.</td>
	</tr>
		<?php
	}
	else{
		if($num==0){
			?>
		<tr>
			<td>Không tìm thấy kết quả cho từ khóa '<?php echo $_GET['search']; ?>'</td>
		</tr>
			<?php
		}	
		while($row= mysqli_fetch_array($exec)){
	?>
		<tr>
			<td>
			<div style="height:auto; padding-bottom: 15px;" class="sp img-thumbnail col-xs-12 col-sm-6 col-md-12 col-lg-12">
				<div style="width: 110px; height: 120px;" class="img col-xs-12 col-sm-12 col-md-6 col-lg-2">
					<img style="width: 100px; height: 120px; margin-left:32px; margin-top: 10px; margin-bottom: 10px;" src="images/<?php echo $row['img']; ?>" alt="">
				</div>
				<div style="padding-top: 10px;" class="text-left col-xs-12 col-sm-12 col-md-6 col-lg-10">
					<div class="title col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<a style="font-size: 18px;" href="?menu=product_info&masp=<?php echo $row['masp']; ?>"><?php echo $row['tensp']; ?></a>
					</div>
					<div class="cost col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<span><?php echo number_format($row['giasp'],0,",",".")."đ"; ?></span>
					</div>
					<div class="buy col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<a class="btn btn-primary" href="?menu=product_info&masp=<?php echo $row['masp']; ?>">Chi tiết</a>
						<?php
                            $soluong = $row['soluong'];
                            if ($soluong > 0) { ?>
                                <a class="btn btn-warning" href="?menu=addcart&masp=<?php echo $row['masp']; ?>&soluong=1"><b class="fa fa-cart-plus"></b></a>
                            <?php } else { ?>
								<a class="btn btn-warning" onclick="<?php if($soluong <= 0) { echo 'alert(\'Sản phẩm đã hết hàng.\');'; } else { echo 'addToCart();'; } ?>">
    <b class="fa fa-cart-plus"></b>
</a>
<?php if ($soluong <= 0) { ?>
    <script>
        function addToCart() {
            alert('Sản phẩm đã hết hàng.');
            window.history.back();
        }
    </script>
<?php } ?>

                            <?php } ?>
					</div>
				</div>
			</div>
			</td>
		</tr>
	<?php }} ?>
	</table>