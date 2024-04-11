<?php
	if(!isset($login)){exit();}
?>
<?php
	if(isset($_POST['submit'])){
	include('../connect.php');
	$img_location ='../images/';
	if($_FILES['image']['name']!=""){
		$image = $_FILES['image']['name'];
		$error= $_FILES['image']['error'];
		$tmp_name= $_FILES['image']['tmp_name'];
		$img_local= $img_location.basename($image);
		if(move_uploaded_file($tmp_name, $img_local)){

		}else{
			unlink('../images/'.$image);
		}
	if($_FILES['image1']['name']!=""){
		$image1= $_FILES['image1']['name'];
		$tmp_name1= $_FILES['image1']['tmp_name'];
		$img_location1= $img_location.basename($image1);
		if(move_uploaded_file($tmp_name1, $img_location1)){

		}else{
			unlink('../images/'.$image1);
		}
	}
	else{
		$image1="";
	}
	if($_FILES['image2']['name']!=""){
		$image2= $_FILES['image2']['name'];
		$tmp_name2= $_FILES['image2']['tmp_name'];
		$img_location2= $img_location.basename($image2);
		if(move_uploaded_file($tmp_name2, $img_location2)){

		}else{
			unlink('../images/'.$image2);
		}
	}
	else{
		$image2="";
	}
	if($_FILES['image3']['name']!=""){
		$image3= $_FILES['image3']['name'];
		$tmp_name3= $_FILES['image3']['tmp_name'];
		$img_location3= $img_location.basename($image3);
		if(move_uploaded_file($tmp_name3, $img_location3)){

		}else{
			unlink('../images/'.$image3);
		}
	}
	else{
		$image3="";
	}
	if($_FILES['image4']['name']!=""){
		$image4= $_FILES['image4']['name'];
		$tmp_name4= $_FILES['image4']['tmp_name'];
		$img_location4= $img_location.basename($image4);
		if(move_uploaded_file($tmp_name4, $img_location4)){

		}else{
			unlink('../images/'.$image4);
		}
	}
	else{
		$image4="";
	}
	$name = $_POST['name'];
	$name= mb_strtoupper($name);
	$cost = $_POST['cost'];
	if($cost ==""){
		echo "<script> alert('Giá sản phẩm không được để trống'); </script> ";
	}
	$sql= "select max(masp) from san_pham";
	$qr= mysqli_query($connect, $sql);
	$row= mysqli_fetch_array($qr);
	$masp= $row['max(masp)']+1;
	echo $row['max(masp)'];
	$soluong=$_POST['soluong'];
	if($soluong==""){
		$soluong=0;
	}
	$man_hinh = $_POST['man_hinh'];
	$do_phan_giai = $_POST['do_phan_giai'];
	$kich_thuoc_man_hinh = $_POST['kich_thuoc_man_hinh'];
	$loai_man_hinh = $_POST['loai_man_hinh'];
	$ngon_ngu = $_POST['ngon_ngu'];
	$cpu = $_POST['cpu'];
	$ram = $_POST['ram'];
	$he_dieu_hanh = $_POST['he_dieu_hanh'];
	$camera_truoc = $_POST['camera_truoc'];
	$camera_sau = $_POST['camera_sau'];
	$bo_nho_trong = $_POST['bo_nho_trong'];
	$danh_ba = $_POST['danh_ba'];
	$chipset = $_POST['chipset'];
	$so_nhan = $_POST['so_nhan'];
	$toc_do_cpu = $_POST['toc_do_cpu'];
	$quay_phim = $_POST['quay_phim'];
	$video_call = $_POST['video_call'];
	$den_flash = $_POST['den_flash'];
	$chip_do_hoa = $_POST['chip_do_hoa'];
	$single3g4g = $_POST['single3g4g'];
	$loai_sim = $_POST['loai_sim'];
	$so_sim = $_POST['so_sim'];
	$wifi = $_POST['wifi'];
	$gps = $_POST['gps'];
	$bluetooth = $_POST['bluetooth'];
	$gprs_edge = $_POST['gprs_edge'];
	$the_nho = $_POST['the_nho'];
	$da_phuong_tien = $_POST['da_phuong_tien'];
	$chuc_nang_khac = $_POST['chuc_nang_khac'];
	$kich_thuoc = $_POST['kich_thuoc'];
	$khoi_luong = $_POST['khoi_luong'];
	$pin = $_POST['pin'];
	$loaisp = $_POST['loaisp'];


$sl= "insert into san_pham(masp, tensp, giasp, soluong, img, img1, img2, img3, img4, loaisp) 
values(".$masp.", '".$name."', '".$cost."', ".$soluong.", '".$image."', '".$image1."', '".$image2."', '".$image3."', '".$image4."', '".$loaisp."')";
$sl1= "insert into cau_hinh(masp, man_hinh, do_phan_giai, kich_thuoc_man_hinh, loai_man_hinh, ngon_ngu, cpu, ram, he_dieu_hanh, camera_truoc, camera_sau, bo_nho_trong, danh_ba, chipset, so_nhan, toc_do_cpu, quay_phim, video_call, den_flash, chip_do_hoa, single3g4g, loai_sim, so_sim, wifi, gps, bluetooth, gprs_edge, the_nho, da_phuong_tien, chuc_nang_khac, kich_thuoc, khoi_luong, pin) 
 values(".$masp.", '".$man_hinh."', '".$do_phan_giai."', '".$kich_thuoc_man_hinh."', '".$loai_man_hinh."', '".$ngon_ngu."', '".$cpu."', '".$ram."', '".$he_dieu_hanh."', '".$camera_truoc."', '".$camera_sau."', '".$bo_nho_trong."', '".$danh_ba."', '".$chipset."', '".$so_nhan."', '".$toc_do_cpu."', '".$quay_phim."', '".$video_call."', '".$den_flash."', '".$chip_do_hoa."', '".$single3g4g."', '".$loai_sim."', '".$so_sim."', '".$wifi."', '".$gps."', '".$bluetooth."', '".$gprs_edge."', '".$the_nho."', '".$da_phuong_tien."', '".$chuc_nang_khac."', '".$kich_thuoc."', '".$khoi_luong."', '".$pin."')";



	$exec= mysqli_query($connect,$sl);
	$exec1= mysqli_query($connect,$sl1);
	if($exec){
		echo "<script> alert('Thêm sản phẩm thành công'); location.href='?menu=ql_sanpham'; </script>";
	}
	else{
		echo $sl."<br>".$sl1;
		echo $_FILES['image1']['name'];

	}
}
}
	if(isset($_POST['cancel'])){
		header('location:index.php?menu=ql_sanpham');
	}
?>