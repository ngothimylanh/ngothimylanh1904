<div class="panel panel-primary" style="border: 0.1px solid #ec522b; margin-top: 25px;">
      <div class="panel-heading"style="cursor: pointer; border: 0.1px solid #ec522b; background-color: #ec522b; "">TABLET</div>
      <div class="panel-body">
<div class="product">
<?php
	include('connect.php');
	if(isset($_GET['page'])){
		$page=$_GET['page'];
	}else{
		$page=1;
	}
	$start=1;
	$page=$page-1;
	$limit= 12;
	$sql="select * from san_pham where loaisp like 'tablet'";
	$ex= mysqli_query($connect, $sql);
	$total= mysqli_num_rows($ex);
	$total=$total/$limit;
	$total= ceil($total);
	$start= $limit*$page;
	?>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="product">
		<?php
	$sl= "select * from san_pham where loaisp like 'tablet' limit ".$start.",".$limit;
	$exec= mysqli_query($connect, $sl);
	while($row= mysqli_fetch_array($exec)){
?>
	<div class="sp img-thumbnail col-xs-12 col-sm-6 col-md-6 col-lg-3"  style=" float: left; margin-bottom: 20px; margin: 12.5px;height: 280px; 		width: 190px; ">
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
	</div>
	<style>
    .sp {
        margin-bottom: 20px; 
    }
</style>
<div class="text-center col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<nav>
			  <ul class="pagination">
			    <?php 
			    	if($page==0){ 
			    		$page=$page+2;
			    		$prev="";
			    		$next= '<a href="?menu=tablet&page='.$page.'" aria-label="Next">
			        <span class="fa fa-step-forward"></span>
			      </a>';
			      		$firstpage="";
			      		$endpage= '<a href="?menu=tablet&page='.$total.'" aria-label="Final">
			        <span class="fa fa-fast-forward"></span>
			      </a>';
			    	}else if($page>=1){
			    		if($page==$total-1){
			    			$prpage= $page;
			    			$firstpage='<a href="?menu=tablet&page=1" aria-label="First">
			        <span class="fa fa-fast-backward"></span>
			      </a>';
			    			$endpage="";
			    			$prev='<a href="?menu=tablet&page='.$prpage.'" aria-label="Next">
			        <span class="fa fa-step-backward"></span>
			      </a>';
			    			$page=$page-2;
			    			$next= "";
			    		}else{
			    			$prpage=$page;
			    		$page=$page+2;
			    		$prev= '<a href="?menu=tablet&page='.$prpage.'" aria-label="Next">
			        <span class="fa fa-step-backward"></span>
			      </a>';
			    		$next= '<a href="?menu=tablet&page='.$page.'" aria-label="Next">
			        <span class="fa fa-step-forward"></span>			        
			      </a>';
			      		$firstpage='<a href="?menu=tablet&page=1" aria-label="First">
			        <span class="fa fa-fast-backward"></span>
			      </a>';
			      		$endpage= '<a href="?menu=tablet&page='.$total.'" aria-label="Final">
			        <span class="fa fa-fast-forward"></span>
			      </a>';
			    	}}
			    ?>
			    <li>
			    	<?php echo $firstpage; ?>
			    </li>

			    <li>
			      <?php echo $prev; ?>
			    </li>
			    <?php 
			for($i=1; $i<=$total; $i++){
				?>
			    <li><a href="?menu=tablet&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
			    <?php
			}
		?>
			    <li>
			      <?php echo $next; ?>
			    </li>
			    <li>
			    	<?php echo $endpage; ?>
			    </li>
			  </ul>
			</nav>
				
		</div>
</div>
</div>
</div>
<script type="text/javascript">

    $(document).ready(function() {
        document.title = 'Tablet';
    });

</script>