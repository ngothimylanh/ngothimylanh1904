<div class="nav">
<?php
    if(isset($_SESSION['id']))
    {
    $id=$_SESSION['id'];
    }
    else{
        $id=" ";
    }
    if($id=="member" || $id==" "){
?>
    <ul class="list_CN">
    <li><a href="index.php?quanly=trangchu">TRANG CHỦ</a></li>
    <li><a href="index.php?quanly=danhmucsanpham">DANH MỤC SẢN PHẨM</a>
    <ul class="sub-menu">
    <li><a href="index.php?quanly=phanloai&id=1">SÁCH VỞ</a></li>
    <li><a href="index.php?quanly=phanloai&id=2">ĐỒ DÙNG HỌC TẬP</a></li>
    <li><a href="index.php?quanly=phanloai&id=3">QUÀ LƯU NIỆM</a></li>
    <li><a href="index.php?quanly=phanloai&id=4">ĐỒ CHƠI</a></li> 
    </ul> 
    </li>
    <li><a href="index.php?quanly=thongtintrangweb">THÔNG TIN TRANG WEB</a></li>
    <li><a href="index.php?quanly=lienhe">LIÊN HỆ</a></li>
    </ul>
<?php
    }
    else{
 ?>

 <strong> <h2>QUẢN LÝ DANH MỤC SẢN PHẨM</h2></strong> 

<?php
    }
?>
</div>