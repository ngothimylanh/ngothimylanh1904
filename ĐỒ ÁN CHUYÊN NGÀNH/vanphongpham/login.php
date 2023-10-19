<?php
	header('Content-Type:text/html;charset=UTF-8');
	if (isset($_POST['login'])) {
	include('ketnoi.php');
	$email = addslashes($_POST['email']);
	$password = addslashes($_POST['password']);  
	if (!$email || !$password) {
		echo "<br>vui lòng nhập đầy đủ tên đăng nhập và mật khẩu.<br><br>trở lại<br><br></a>";
		exit;}
	$password = md5($password);  
	$query = mysqli_query($conn,"SELECT email,password from member where email='$email'");
	if (mysqli_num_rows($query) == 0) {
		echo "<br>tên đăng nhập này không tồn tại.<br><br>vui lòng kiểm tra lại.<br><br>trở lại<br><br></a>";
		exit;}
	$row = mysqli_fetch_array($query);
		if ($password != $row['password']){
		echo "<br>mật khẩu không đúng.<br><br>vui lòng nhập lại.<br><br>trở lại<br><br></a>";
		exit;}
	$_SESSION['email'] = $email;
	$_SESSION['id'] = 'member';
	header("location: index.php?quanly=danhmucsanpham");
	exit;
}
?>
<div class="list_a">
<br><br><br><br>
<div class = "login">
    <center><h2><strong>ĐĂNG NHẬP TÀI KHOẢN</strong></h2></center>	
    <form action='index.php?quanly=login' method='POST'>
    <eenter>
    <center>
        Email <input type = "text" name = "email"/>
        Mật khẩu <input type = "password" name = "password"/>
        <input type = "submit" name = "login" value = "ĐĂNG NHẬP"/>
		Bạn chưa có tài khoản? <a href='index.php?quanly=dangky' title='Đăng ký'>Đăng ký tại đây</a><br>
		Đăng nhập với quyền quản lý? <a href='index.php?quanly=loginad' title='Đăng ký'>Tại đây</a>
    </center>
    </eenter>
    </form>
</div>
</div>