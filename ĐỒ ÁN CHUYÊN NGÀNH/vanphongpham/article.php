<div class="article">
<?php
    if(isset($_GET['quanly'])){
        $tam = $_GET['quanly'];
    }else{
        $tam ='';
    }if($tam=='danhmucsanpham'){
        include("danhmucsanpham.php");
    }elseif($tam=='thongtintrangweb'){
        include("thongtintrangweb.php");
    }elseif($tam=='lienhe'){
        include("lienhe.php");
    }elseif($tam=='login'){
        include("login.php");
    }elseif($tam=='dangky'){
        include("dangky.php");
    }elseif($tam=='hoso'){
        include("hoso.php");
    }elseif($tam=='dangxuat'){
        include("dangxuat.php");
    }elseif($tam=='loginad'){
        include("loginad.php");
    }elseif($tam=='dangkyad'){
        include("dangkyad.php");
    }elseif($tam=='giohang'){
        include("giohang.php");
    }elseif($tam=='Tìm kiếm'){
        include("timkiem.php");
    }elseif($tam=='phanloai'){
        include("phanloai.php");  
    }elseif($tam=='indexad'){
        include("indexad.php");  
    }elseif($tam=='them'){
        include("them.php");  
    }elseif($tam=='sua'){
        include("sua.php");  
    }elseif($tam=='xoa'){
        include("xoa.php");  
    }elseif($tam=='xoagh'){
        include("xoagh.php");  
    }elseif($tam=='themgh'){
        include("themgh.php");  
    }elseif($tam=='giamgh'){
        include("giamgh.php");  
    }elseif($tam=='xulygiohang'){
        include("xulygiohang.php");  
    }else{
        include("trangchu.php");
    }
?>
</div>