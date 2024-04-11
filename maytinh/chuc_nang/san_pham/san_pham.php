<div class="panel panel-primary" style="border: 0.1px solid #ec522b; margin-top: 25px;">
    <div class="panel-heading" style="cursor: pointer; border: 0.1px solid #ec522b; background-color: #ec522b;">LAPTOP</div>
    <div class="panel-body">
        <div class="product">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="product">
                <?php
                include('connect.php');
                $sl = 'select * from san_pham where loaisp="laptop" limit 0,3';
                $exec = mysqli_query($connect, $sl);
                while ($row = mysqli_fetch_array($exec)) {
                    ?>
                    <div class="sp img-thumbnail col-xs-12 col-sm-6 col-md-6 col-lg-3" style=" float: left; margin-bottom: 20px; margin: 12.5px;height: 280px; width: 190px; ">
                        <div class="img img-thumbnail col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <a href="?menu=product_info&masp=<?php echo $row['masp']; ?>"><img src="images/<?php echo $row['img']; ?>" alt=""></a>
                        </div>
                        <div class="title">
                            <a href="?menu=product_info&masp=<?php echo $row['masp']; ?>"><?php echo $row['tensp']; ?></a>
                        </div>
                        <div class="cost">
                            <span><?php echo number_format($row['giasp'], 0, ",", ".") . "đ"; ?></span>
                        </div>
                        <div class="buy">
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
                <?php }
                ?>
                <div class="text-center" style="margin-top:300px;">
                    <a href="?menu=laptop" class="text-center btn btn-default">Xem thêm</a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="panel panel-primary" style="border: 0.1px solid #ec522b;">
      <div class="panel-heading" style="cursor: pointer; border: 0.1px solid #ec522b; background-color: #ec522b;">ĐIỆN THOẠI</div>
      <div class="panel-body">
<div class="product">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="product">
	<?php
	include('connect.php');
	$sl= 'select * from san_pham where loaisp="mobile" limit 0,3';
	$exec= mysqli_query($connect, $sl);
	while($row= mysqli_fetch_array($exec)){
?>
	<div class="sp img-thumbnail col-xs-12 col-sm-6 col-md-6 col-lg-3" style=" float: left; margin-bottom: 20px; margin: 12.5px;height: 280px; width: 190px; ">
		<div class="img img-thumbnail col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<a href="?menu=product_info&masp=<?php echo $row['masp']; ?>"><img src="images/<?php echo $row['img']; ?>" alt=""></a>
		</div>
		<div class="title">
			<a href="?menu=product_info&masp=<?php echo $row['masp']; ?>"><?php echo $row['tensp']; ?></a>
		</div>
		<div class="cost">
			<span><?php echo number_format($row['giasp'],0,",",".")."đ"; ?></span>
		</div>
		<div class="buy">
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
                <?php }
                ?>
	<div class="text-center" style="margin-top:300px;">
		<a href="?menu=mobile" class="text-center btn btn-default">Xem thêm</a>
	</div>
	</div>

</div>
</div>
</div>
<div class="panel panel-primary" style="border: 0.1px solid #ec522b;">
      <div class="panel-heading" style="cursor: pointer; border: 0.1px solid #ec522b; background-color: #ec522b;">TABLET</div>
      <div class="panel-body">
<div class="product">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="product">
	<?php
	include('connect.php');
	$sl= 'select * from san_pham where loaisp="tablet" limit 0,3';
	$exec= mysqli_query($connect, $sl);
	while($row= mysqli_fetch_array($exec)){
?>
	<div class="sp img-thumbnail col-xs-12 col-sm-6 col-md-6 col-lg-3"  style=" float: left; margin-bottom: 20px; margin: 12.5px;height: 280px; width: 190px; ">
		<div class="img img-thumbnail col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<a href="?menu=product_info&masp=<?php echo $row['masp']; ?>"><img src="images/<?php echo $row['img']; ?>" alt=""></a>
		</div>
		<div class="title">
			<a href="?menu=product_info&masp=<?php echo $row['masp']; ?>"><?php echo $row['tensp']; ?></a>
		</div>
		<div class="cost">
			<span><?php echo number_format($row['giasp'],0,",",".")."đ"; ?></span>
		</div>
		<div class="buy">
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
                <?php }
                ?>
	<div class="text-center" style="margin-top:300px;">
		<a href="?menu=tablet" class="text-center btn btn-default">Xem thêm</a>
	</div>
	</div>

</div>
</div>
</div>
<div class="panel panel-primary" style="border: 0.1px solid #ec522b;">
      <div class="panel-heading" style="cursor: pointer; border: 0.1px solid #ec522b; background-color: #ec522b;">PHỤ KIỆN</div>
      <div class="panel-body">
<div class="product">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="product">
	<?php
	include('connect.php');
	$sl= 'select * from san_pham where loaisp="phukien" limit 0,3';
	$exec= mysqli_query($connect, $sl);
	while($row= mysqli_fetch_array($exec)){
?>
	<div class="sp img-thumbnail col-xs-12 col-sm-6 col-md-6 col-lg-3"  style=" float: left; margin-bottom: 20px; margin: 12.5px;height: 280px; width: 190px; ">
		<div class="img img-thumbnail col-xs-12 col-sm-12 col-md-12 col-lg-12" >
			<a href="?menu=product_info&masp=<?php echo $row['masp']; ?>"><img src="images/<?php echo $row['img']; ?>" alt=""></a>
		</div>
		<div class="title">
			<a href="?menu=product_info&masp=<?php echo $row['masp']; ?>"><?php echo $row['tensp']; ?></a>
		</div>
		<div class="cost">
			<span><?php echo number_format($row['giasp'],0,",",".")."đ"; ?></span>
		</div>
		<div class="buy">
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
                <?php }
                ?>
	<div class="text-center" style="margin-top:300px;">
		<a href="?menu=phukien" class="text-center btn btn-default">Xem thêm</a>
	</div>
	</div>

</div>
</div>
</div>