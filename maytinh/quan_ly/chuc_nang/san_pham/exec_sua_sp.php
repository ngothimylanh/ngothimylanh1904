<?php
	if(!isset($login)){exit();}
?>
<?php
	if(isset($_POST['submit'])){
	include('../connect.php');
	$img_location ='../images/';
	$masp = $_POST['masp'];
	$name = $_POST['name'];
	$name = mb_strtoupper($name);
	$cost = $_POST['cost'];
	$loaisp = $_POST['loaisp'];
	$image_upload = $_FILES['image']['name'];
	$image1= $_FILES['image1']['name'];
	$image2= $_FILES['image2']['name'];
	$image3= $_FILES['image3']['name'];
	$image4= $_FILES['image4']['name'];
	$tmp_name1= $_FILES['image1']['tmp_name'];
	$tmp_name2= $_FILES['image2']['tmp_name'];
	$tmp_name3= $_FILES['image3']['tmp_name'];
	$tmp_name4= $_FILES['image4']['tmp_name'];
	$error= $_FILES['image']['error'];
	$tmp_name= $_FILES['image']['tmp_name'];
		if($image_upload==""){
			$image= $_POST['img'];
		}
		if($image_upload!=""){
			$image= $image_upload;
			$new_img_location= $img_location.basename($image);
			move_uploaded_file($tmp_name,$new_img_location);
			$old_image_location= $img_location.basename($_POST['img']);
			unlink($old_image_location);
		}
		if($image1==""){
			$img1= $_POST['img1'];
		}
		if($image1!=""){
			$img1= $image1;
			$new_img_location1= $img_location.basename($image1);
			move_uploaded_file($tmp_name1,$new_img_location1);
			$old_image_location1= $img_location.basename($_POST['img1']);
			unlink($old_image_location1);
		}
		if($image2==""){
			$img2= $_POST['img2'];
		}
		if($image2!=""){
			$img2= $image2;
			$new_img_location2= $img_location.basename($image2);
			move_uploaded_file($tmp_name2,$new_img_location2);
			$old_image_location2= $img_location.basename($_POST['img2']);
			unlink($old_image_location2);
		}
		if($image3==""){
			$img3= $_POST['img3'];
		}
		if($image3!=""){
			$img3= $image3;
			$new_img_location3= $img_location.basename($image3);
			move_uploaded_file($tmp_name3,$new_img_location3);
			$old_image_location3= $img_location.basename($_POST['img3']);
			unlink($old_image_location3);
		}if($image4==""){
			$img4= $_POST['img4'];
		}
		if($image4!=""){
			$img4= $image4;
			$new_img_location4= $img_location.basename($image4);
			move_uploaded_file($tmp_name4,$new_img_location4);
			$old_image_location4= $img_location.basename($_POST['img4']);
			unlink($old_image_location4);
		}
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
	$sl= "update san_pham set tensp='".$name."',giasp=".$cost.",soluong=".$soluong.",img='".$image."',img1='".$img1."',img2='".$img2."',img3='".$img3."',img4='".$img4."',loaisp='".$loaisp."' where masp=".$masp;
	$sql= "update cau_hinh set man_hinh='".$man_hinh."',do_phan_giai='".$do_phan_giai."',kich_thuoc_man_hinh='".$kich_thuoc_man_hinh."',loai_man_hinh='".$loai_man_hinh."',ngon_ngu='".$ngon_ngu."',cpu='".$cpu."',ram='".$ram."',he_dieu_hanh='".$he_dieu_hanh."',camera_truoc='".$camera_truoc."',camera_sau='".$camera_sau."',bo_nho_trong='".$bo_nho_trong."',danh_ba='".$danh_ba."',chipset='".$chipset."',so_nhan='".$so_nhan."',toc_do_cpu='".$toc_do_cpu."',quay_phim='".$quay_phim."',video_call='".$video_call."',den_flash='".$den_flash."',chip_do_hoa='".$chip_do_hoa."',single3g4g='".$single3g4g."',loai_sim='".$loai_sim."',wifi='".$wifi."',gps='".$gps."',bluetooth='".$bluetooth."',gprs_edge='".$gprs_edge."',the_nho='".$the_nho."',da_phuong_tien='".$da_phuong_tien."',chuc_nang_khac='".$chuc_nang_khac."',kich_thuoc='".$kich_thuoc."',khoi_luong='".$khoi_luong."',pin='".$pin."' where masp=".$masp;
	$exec1= mysqli_query($connect, $sql);
	$exec= mysqli_query($connect,$sl);
	if($exec){
		if($exec1){
		echo "<script> alert('Sửa sản phẩm thành công');
		location.href='?menu=ql_sanpham'; </script>";
	}
}
	else{
		echo "<script> alert('Sửa sản phẩm không thành công'); location.href='?menu=ql_sanpham'; </script>";
	}
}
	if(isset($_POST['cancel'])){
		header('location:index.php?menu=ql_sanpham');
	}
?>