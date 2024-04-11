<?php
	if(isset($_GET['menu'])){
		$menu= $_GET['menu'];
		switch($menu){ 
			case 'info': include('chuc_nang/infomenu.php'); break;
			case 'san_pham': include('chuc_nang/san_pham/san_pham.php'); break;
			case 'product_info': include('chuc_nang/san_pham/product_info.php'); break;
			case 'gio_hang': include('chuc_nang/gio_hang/gio_hang.php'); break;
			case 'addcart': include('chuc_nang/gio_hang/add_cart.php'); break;
			case 'del_cart': include('chuc_nang/gio_hang/del_cart.php'); break;
			case 'thanh_toan': include('chuc_nang/gio_hang/thanh_toan.php'); break;
			case 'hoa_don': include('chuc_nang/gio_hang/hoa_don.php'); break;
			case 'dang_ky': include('chuc_nang/dang_ky_dang_nhap/dang_ky.php'); break;
			case 'dang_nhap': include('chuc_nang/dang_ky_dang_nhap/dang_nhap.php'); break;
			case 'dang_ky_dang_nhap': include('chuc_nang/dang_ky_dang_nhap/dang_ky_dang_nhap.php'); break;
			case 'exec_dang_ky': include('chuc_nang/dang_ky_dang_nhap/exec_dang_ky.php'); break;
			case 'exec_dang_nhap': include('chuc_nang/dang_ky_dang_nhap/exec_dang_nhap.php'); break;
			case 'mobile': include('chuc_nang/san_pham/mobile.php'); break;
			case 'laptop': include('chuc_nang/san_pham/laptop.php'); break;
			case 'tablet': include('chuc_nang/san_pham/tablet.php'); break;
			case 'phukien': include('chuc_nang/san_pham/phukien.php'); break;
			case 'thongtin': include('chuc_nang/san_pham/thongtin.php'); break;
			case 'lienhe': include('chuc_nang/san_pham/lienhe.php'); break;
			case 'tintuc': include('chuc_nang/san_pham/tintuc.php'); break;
			case 'thanh_vien_form': include('chuc_nang/gio_hang/thanh_vien_form.php'); break;
			case 'thanh_vien': include('chuc_nang/dang_ky_dang_nhap/thanh_vien.php'); break;
			case 'sua_tt_thanh_vien': include('chuc_nang/dang_ky_dang_nhap/sua_tt_thanh_vien.php'); break;
			case 'exec_sua_tt_thanh_vien': include('chuc_nang/dang_ky_dang_nhap/exec_sua_tt_thanh_vien.php'); break;
			case 'change_password': include('chuc_nang/dang_ky_dang_nhap/change_password.php'); break;
			case 'exec_change_password': include('chuc_nang/dang_ky_dang_nhap/exec_change_password.php'); break;
			case 'search': include('chuc_nang/search/search.php'); break;
			case 'khach_hang': include('chuc_nang/gio_hang/thong_tin_khach_hang.php'); break;
			case 'logout': include('chuc_nang/dang_ky_dang_nhap/logout.php'); break;
			case 'rate': include('chuc_nang/rate/rate.php'); break;
			case 'binh_luan': include('chuc_nang/binh_luan/binh_luan.php'); break;
			case 'exec_binh_luan': include('chuc_nang/binh_luan/exec_binh_luan.php'); break;
			case 'mua_ngay': include('chuc_nang/gio_hang/mua_ngay.php'); break;
			case 'gioi_thieu': include('chuc_nang/tro_giup/gioi_thieu.php'); break;
			case 'huong_dan_mua_hang': include('chuc_nang/tro_giup/huong_dan_mua_hang.php'); break;
			case 'huong_dan_thanh_toan': include('chuc_nang/tro_giup/huong_dan_thanh_toan.php'); break;
			case 'chinh_sach_van_chuyen': include('chuc_nang/tro_giup/chinh_sach_van_chuyen.php'); break;
			case 'chinh_sach_bao_hanh': include('chuc_nang/tro_giup/chinh_sach_bao_hanh.php'); break;
			case 'chinh_sach_doi_tra': include('chuc_nang/tro_giup/chinh_sach_doi_tra.php'); break;
			case 'chinh_sach_bao_mat': include('chuc_nang/tro_giup/chinh_sach_bao_mat.php'); break;
			case 'dieu_khoan_su_dung': include('chuc_nang/tro_giup/dieu_khoan_su_dung.php'); break;
			default: include('chuc_nang/homepage.php'); break;

		}
	}
	else{
		include('chuc_nang/homepage.php');
		include('chuc_nang/san_pham/san_pham.php');
	}
	
?>