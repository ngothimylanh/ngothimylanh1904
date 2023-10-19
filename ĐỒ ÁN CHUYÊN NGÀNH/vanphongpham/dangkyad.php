<?php
    header('Content-Type:text/html;charset=UTF-8');
	if(isset($_POST['dangkyad'])){
	    include('ketnoi.php');	     
	    $username = addslashes($_POST['username']);
	    $phonenumber = addslashes($_POST['phonenumber']);
        $email = addslashes($_POST['email']);
        $password = addslashes($_POST['password']);
        $ma = addslashes($_POST['ma']);
        $code = "admin";
    if (!$username || !$phonenumber || !$email || !$password || !$ma){
        echo "<br>vui lòng nhập đầy đủ thông tin.<br><br><a href='dangkyad.php'>trở lại<br><br></a>".'</center>';
        exit;}   
        $password = md5($password);
    if (mysqli_num_rows(mysqli_query($conn,"SELECT username from admin where username='$username'")) > 0){
        echo "<br>tên đăng nhập này đã có người dùng.<br><br>vui lòng chọn tên đăng nhập khác.<br><br><a href='dangkyad.php'>trở lại<br><br></a>";
        exit;}
    if (!preg_match("/[_a-z0-9-]*@[a-z0-9-]*(\.[a-z]{2,4})$/", $email)){
        echo "<br>email không hợp lệ.<br><br>vui lòng nhập lại email.<br><br><a href='dangkyad.php'>trở lại<br><br></a>";
        exit;}
    if (mysqli_num_rows(mysqli_query($conn,"SELECT email from admin where email='$email'")) > 0){
        echo "<br>email này đã có người dùng.<br><br>vui lòng chọn email khác.<br><br><a href='dangkyad.php'>trở lại<br><br></a>";
        exit;}  
    if ($code != $ma){
        echo "<br>sai mã<br><br><a href='dangkyad.php'>trở lại<br><br></a>";
        exit;}  
    $addmember = mysqli_query($conn,"
        insert into admin(username,phonenumber,email,password)
        values(
            '{$username}',
            '{$phonenumber}',
            '{$email}',
            '{$password}')");             
    if ($addmember)
        echo "<br>quá trình đăng ký thành công.<br><br><a href='loginad.php'>về trang đăng nhập<br><br></a>";
    else
        echo "<br>có lỗi xảy ra trong quá trình đăng ký.<br><br><a href='dangkyad.php'>thử lại<br><br></a>";
        $_SESSION['email'] = $email;
	    header("location: /vanphongpham/index.php?quanly=loginad");
		exit;
    }
?>
<div class="list_b">
<br><br><br><br>
<div class = "dangkyad">
    <center><h2><strong>ĐĂNG KÝ ADMIN</strong></h2></center>	
    <form action='index.php?quanly=dangkyad' method='POST'>
    <eenter>
    <center>
        Họ và tên <input type = "text" name = "username"/>
        Số điện thoại <input type = "text" name = "phonenumber"/>
        Email <input type = "text" name = "email"/>
        Mã admin <input type = "text" name = "ma"/>
        Mật khẩu <input type = "password" name = "password"/>
       <input type = "submit" name = "dangkyad" value = "TẠO TÀI KHOẢN"/>
        Bạn đã có tài khoản?<a href='index.php?quanly=loginad' title='Đăng nhập'>Đăng nhập</a>
    </center>
    </eenter>
    </form>
</div>
</div>