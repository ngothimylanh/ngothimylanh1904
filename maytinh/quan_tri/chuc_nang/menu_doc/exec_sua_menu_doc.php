<?php
	if(!isset($login)){exit();}
?>
<?php
	if(isset($_POST['submit'])){
	include('../connect.php');
	$id= $_POST['id'];
	$title= $_POST['title'];
	$title= mb_strtoupper($title);
	$sub_1= $_POST['sub_1'];
	$sub_1_link= $_POST['sub_1_link'];
	$sub_2= $_POST['sub_2'];
	$sub_2_link= $_POST['sub_2_link'];
	$sub_3= $_POST['sub_3'];
	$sub_3_link= $_POST['sub_3_link'];
	$sub_4= $_POST['sub_4'];
	$sub_4_link= $_POST['sub_4_link'];
	$sl= "update menu_doc set title= '".$title."',sub_1= '".$sub_1."',sub_1_link= '".$sub_1_link."',sub_2= '".$sub_2."',sub_2_link= '".$sub_2_link."',sub_3= '".$sub_3."',sub_3_link= '".$sub_3_link."' ,sub_4= '".$sub_4."',sub_4_link= '".$sub_4_link."' where id=".$id;
	$exec= mysqli_query($connect,$sl);
	if($exec){
		echo "<script> alert('Sửa menu thành công'); location.href='?menu=ql_menu_doc';  </script>";
	}
	else{
		echo "<script> alert('Sửa menu không thành công'); location.href='?menu=ql_menu_doc';  </script>";
	}
}
	if(isset($_POST['cancel'])){
		header('location:?menu=ql_menu_doc');
	}
?>