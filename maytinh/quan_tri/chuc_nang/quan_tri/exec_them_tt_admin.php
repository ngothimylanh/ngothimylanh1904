<?php
	if(!isset($login)){exit();}
?>
<?php
	include('../connect.php');
	if(isset($_POST['submit'])){
	$sl1= "select * from quan_tri";
	$exec1= mysqli_query($connect, $sl1);
	$row1= mysqli_fetch_array($exec1); 
	$name= $_POST['name'];
	if($name!=$row['name']){
	$pass= $_POST['pass'];	
	$pass= md5($pass);
	$pass= md5($pass);
	if($pass){
	$sl= "insert into quan_tri(name,pass) values('".$name."','".$pass."')";
	$exec= mysqli_query($connect, $sl);
	if($exec){
			echo "<script> alert('Thêm vào thành công'); location.href='?menu=quan_ly_admin'; </script>";
		}
		else{
			echo "<script> alert('Thêm vào không thành công'); location.href='?menu=quan_ly_admin'; </script>";
		}
	}else{
		echo "<script> alert('Mật khẩu bạn nhập lại không đúng.'); location.href='?menu=quan_ly_admin'; </script>";
	}
	}else{
		echo "<script> alert('Username đã tồn tại.'); location.href='?menu=quan_ly_admin'; </script>";
	}
}
	if(isset($_POST['cancel'])){
		header('location:?menu=quan_ly_admin');
	}
?>