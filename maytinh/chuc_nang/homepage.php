
<div id="carousel-id" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		<?php $sql= "select * from slideshow";
			$execc= mysqli_query($connect,$sql);
			$num =mysqli_num_rows($execc);
			$num=$num-1;
			for($i=1; $i<=$num; $i++){
		?>
		<li data-target="#carousel-id" data-slide-to="<?php echo $i; ?>" class=""></li>
		<?php } ?>
		<li data-target="#carousel-id" data-slide-to="0" class="active"></li>
	</ol>
	<div class="carousel-inner">
		<?php 
			include('connect.php');
			$sl= "select * from slideshow";
			$exec= mysqli_query($connect,$sl);
			while($row= mysqli_fetch_array($exec)){
		?>
		<div class="item <?php echo $row['note']; ?>">
<a href="<?php echo ""; ?>"><img class="img-responsive" src="images/slideshow/<?php echo $row['name']; ?>"></a>
		</div>
		<?php } ?>
	</div>
	<a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
	<a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div>
<script type="text/javascript">

    $(document).ready(function() {
        document.title = 'Trang chủ';
    });

</script>