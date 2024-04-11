<?php 
	session_start(); 
?>
<div class="header col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="logo col-xs-12 col-sm-12 col-md-4 col-lg-4">
		<img style="width: 200px; height: 170px;  margin-top: -15px; float: left; margin-left: -70px;" ;class="header_logo" src="images/LOGO.png" alt="">
	</div>
	<div class="search col-xs-12 col-sm-8 col-md-6 col-lg-6">
		<form class="searchh" action="?menu=search" action="post">
			<input type="hidden" name="menu" value="search">
			<input class="form-control" type="search" name="search" placeholder="Nhập tên sản phẩm.." style="border: 0.1px solid #FF6633;">
			<button type="submit" class="form-control" name="submit"><span class="fa fa-search"></span></button>
		</form>
	</div>
	<div class="cart col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<a class="btn btn-warning" href="?menu=gio_hang"><span class="fa fa-shopping-cart"></span> (<?php if(isset($_SESSION['giohang'])){
				$cart= count($_SESSION['giohang']);
				echo $cart;
			} 
		else { $cart=0;
			echo $cart;} ?>)</a>
	</div>
	<div class="responsive_log">
		<a href="?menu=dang_nhap" class="btn btn-primary" >Đăng nhập</a>
		<a href="?menu=dang_ky" class="btn btn-primary">Đăng ký</a>	
	</div>
</div>
