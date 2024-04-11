<script type="text/javascript">

    $(document).ready(function() {
        document.title = 'Tìm kiếm';
    });

</script>
<table class="table" style="width:90%;margin-left:70px; border-collapse: collapse;">
	<tr>
	<td style="color: white; background-color: #ec522b; padding:15px;text-align: center;"><label>KẾT QUẢ TÌM KIẾM CHO TỪ KHOÁ '<?php echo $_GET['search']; ?>'</label></td>
	</tr>
<?php 
	$search= $_GET['search'];
	$connect= mysqli_connect("localhost:3307","root","","selll");
	mysqli_query($connect, "SET names 'utf8'");
	if(!$connect){
		echo "Không thể kết nối đến Database!".mysqli_connect_error($connect);
	}
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
		<style>
		.sp {
    display: flex; 
    align-items: center; 
}

.img {
    flex: 0 0 auto; 
    margin-right: -80px; 
}

.text-left {
    flex: 1 1 auto; 
}

.title, .cost {
    margin-bottom: 10px; 
}

	</style>
		<tr>
			<td>
			<div style="height:auto; padding-bottom: 15px;" class="sp img-thumbnail col-xs-12 col-sm-6 col-md-12 col-lg-12">
				<div style="width: 110px; height: 120px;" class="img col-xs-12 col-sm-12 col-md-6 col-lg-2" >
					<img style="width: 90px; height: 120px; margin-left:32px; margin-top: 10px; margin-bottom: 10px;" src="../images/<?php echo $row['img']; ?>" alt="">
				</div>
				<div style="padding-top: 10px;" class="text-left col-xs-12 col-sm-12 col-md-6 col-lg-10">
					<div class="title col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<a style="font-size: 18px; margin-left:150px;  margin-top: -20px; margin-bottom: 10px;" href="?menu=chi_tiet&masp=<?php echo $row['masp']; ?>"><?php echo $row['tensp']; ?></a>
					</div>
					<div class="cost col-xs-12 col-sm-12 col-md-12 col-lg-12" >
						<span style="font-size: 18px; margin-left:150px; margin-top: -500px; margin-bottom: 10px;"><?php echo number_format($row['giasp'],0,",",".")."đ"; ?></span>
					</div>
					
				</div>
			</div>
			</td>
		</tr>
	<?php }} ?>
	</table>