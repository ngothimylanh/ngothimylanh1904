<?php
    include('../connect.php');
    
    if(isset($_POST['username'])){
        $username = $_POST['username'];
        
		$sl = "DELETE FROM thanh_vien WHERE username='" . mysqli_real_escape_string($connect, $username) . "'";
        $exec = mysqli_query($connect, $sl);

        if($exec){
            echo "<script> alert('Xóa thông tin thành công'); location.href='?menu=quan_ly_thanh_vien'; </script>";
        } else {
            echo "<script> alert('Xóa thông tin không thành công'); location.href='?menu=quan_ly_thanh_vien'; </script>";
        }
    }
?>
 