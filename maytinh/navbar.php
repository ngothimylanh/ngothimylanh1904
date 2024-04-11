<nav class="menu navbar-default" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">TRANG CHỦ</a>
		</div>
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<?php 
				include('connect.php');
				$sl="select * from menu_ngang";
				$exec= mysqli_query($connect, $sl);
				while($row=mysqli_fetch_array($exec)){
				?>
				<li ><a href="?menu=<?php echo $row['loaimenu']; ?>" ><?php 
				echo $row['title']; ?></a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>