<?php
    include('ketnoi.php');
    $email=$_SESSION['email'];
    $id=$_SESSION['id'];
    if($id=="admin"){
        $query = mysqli_query($conn,"SELECT username,phonenumber,email,password from admin where email='$email'");
    }
    else{
        $query = mysqli_query($conn,"SELECT username,phonenumber,email,password from member where email='$email'");
    }
    $row = mysqli_fetch_array($query);
    $phonenumber = $row['phonenumber'];
    $username = $row['username'];
    $password = $row['password'];
?>
<br><br><br><br>
<div class="hoso" style = "padding-top: 0px; padding-bottom: 95px">
    <p> Họ và tên:
    <?php
        echo ' '.$username;
    ?>
    </p>
    <p> Số điện thoại:
    <?php
        echo ' '.$phonenumber;
    ?>
    </p>
    <p> Email: 
    <?php
        echo ' '.$_SESSION['email'];
    ?>
    </p>
    <p> Mật khẩu: 
    <?php
        echo ' '.'***************';
    ?>
    </p>
</div>