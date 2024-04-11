<?php
	include('chuc_nang/quan_tri/security.php');
	if(!isset($login)){exit();}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Quản trị</title>
	<link rel="stylesheet" href="style/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<?php
    include('../connect.php');

    $sl1 = "SELECT * FROM quan_tri WHERE name='" . $_SESSION['user'] . "' AND quyen_truy_cap = 1";
    $exec1 = mysqli_query($connect, $sl1);
    $row1 = mysqli_fetch_array($exec1);

    if ($row1 && $row1['quyen_truy_cap'] == 1) {
?>
<div class="header col-xs-12 col-sm-12 col-md-12 col-lg-12" style="display: flex; align-items: center; justify-content: space-between;">
	<div class="logo col-xs-12 col-sm-12 col-md-4 col-lg-4" >
		<img style="width: 220px; height: 190px;  margin-top: -10px; margin-left: 60px; " ;class="header_logo" src="img/logo.png" alt="">
	</div>
	<div class="search col-xs-12 col-sm-8 col-md-6 col-lg-6"  style="flex: 10;">
		<form class="searchh" action="?menu=search" action="post">
			<input type="hidden" name="menu" value="search">
			<input class="form-control" type="search" name="search" placeholder="Nhập tên sản phẩm..." style="border: 0.1px solid #ec522b;">
			<button type="submit" class="form-control" name="submit" ><span class="fa fa-search"  style="border: 0.1px solid #ec522b;"></span></button>
		</form>
	</div>
	
</div>

	<div class="navbar">
		<ul>
			<li><a href="index.php">TRANG CHỦ</a></li>
			<li><a href="?menu=ql_sanpham">SẢN PHẨM</a></li>
			<li><a href="?menu=hoa_don">HOÁ ĐƠN</a></li>
			<li><a href="?menu=logout">ĐĂNG XUẤT</a></li>
		</ul>
	</div>
	<div class="content">
		<?php include('menu.php'); ?>
	</div>
	<?php
    } else {
        echo "<script> alert('Bạn không có quyền truy cập vào trang này.'); location.href='?menu=trang_chu'; </script>";
    }
?>
</body>
</html>