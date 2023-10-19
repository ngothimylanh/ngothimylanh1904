<?php
	header('Content-Type:text/html;charset=UTF-8');
	if (isset($_POST['loginad'])) 
	{
	    include('ketnoi.php');
	    $email = addslashes($_POST['email']);
	    $password = addslashes($_POST['password']);  
	    if (!$email || !$password) {
	   		echo "<br>vui lòng nhập đầy đủ tên đăng nhập và mật khẩu.<br><br>trở lại<br><br></a>";
	    	exit;}
	    $password = md5($password);  
	    $query = mysqli_query($conn,"SELECT email,password from admin where email='$email'");
	    if (mysqli_num_rows($query) == 0) {
	        echo "<br>tên đăng nhập này không tồn tại.<br><br>vui lòng kiểm tra lại.<br><br>trở lại<br><br></a>";
	        exit;}
	    $row = mysqli_fetch_array($query);
	    if ($password != $row['password']){
	        echo "<br>mật khẩu không đúng.<br><br>vui lòng nhập lại.<br><br>trở lại<br><br></a>";
	        exit;}
	    $_SESSION['email'] = $email;
		$_SESSION['id'] = 'admin';
	    header("location: /vanphongpham/index.php?quanly=indexad");
		exit;
}
?>
<div class="list_a">
<br><br><br><br>
<div class = "loginad">
    <center><h2><strong>ĐĂNG NHẬP ADMIN</strong></h2></center>	
    <form action='index.php?quanly=loginad' method='POST'>
    <eenter>
    <center>
        Email <input type = "text" name = "email"/>
        Mật khẩu <input type = "password" name = "password"/>
        <input type = "submit" name = "loginad" value = "ĐĂNG NHẬP"/>
		 Bạn chưa có tài khoản? <a href='index.php?quanly=dangkyad' title='Đăng ký'>Đăng ký tại đây</a>
    </center>
    </eenter>
    </form>
</div>
</div>