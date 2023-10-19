<?php session_start();
if(isset($_SESSION['id']))
{
$id=$_SESSION['id'];
}
else{
    $id=" ";
}
?>
<div class="header"> 
<div class="logo"> 
  <img src="img/logo2.png" width="100px" height="70px">
</div>
<div class="timkiem">
  <form action="index.php?quanly=timkiem" method="get">
  <input type="text" name="timkiem" />
  <input type="submit" name="quanly"value="Tìm kiếm" />
  </form>
</div>
<div class="thietbi"> 
  <ul class="list_menu">
  <?php
    if($id=="member" || $id==" "){
  ?>
  <li><a href="index.php?quanly=giohang">
  <img src="img/icongiohang.png" width="50px" height="50px">
  <p>Giỏ Hàng</p>
  </a>
  </li>
  <?php
    }
  ?>
  <li><a href="#taikhoan">
  <img src="img/user.png" width="50px" height = "50px">
  <p>Tài Khoản</p></a>
  <ul class="sub-login">
<?php 
  if (isset($_SESSION['email']) && $_SESSION['email']){
  echo "<a href='index.php?quanly=hoso'>".'<li>HỒ SƠ'.'</a></li>'."<br/>";
?>
 <li><a href="index.php?quanly=dangxuat">ĐĂNG XUẤT</a></li>
<?php
}else{
?>
  <li><a href="index.php?quanly=dangky">ĐĂNG KÝ</a></li>
  <li><a href="index.php?quanly=login">ĐĂNG NHẬP</a></li>
<?php
}
?>
  </ul>
  </li>
  </ul>
</div>
</div>