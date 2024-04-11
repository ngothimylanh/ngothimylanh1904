<?php
	if(!isset($login)){exit();}
?>
<?php
	if(isset($_GET['menu'])){
	$menu= $_GET['menu'];
	switch($menu){
		case 'menu_ngang': include('chuc_nang/menu_ngang/menu_ngang.php'); break;
		case 'them_menu_ngang': include('chuc_nang/menu_ngang/them_menu_ngang.php'); break;
		case 'ql_menu_ngang': include('chuc_nang/menu_ngang/ql_menu_ngang.php'); break;
		case 'sua_menu_ngang': include('chuc_nang/menu_ngang/sua_menu_ngang.php'); break;
		case 'xoa_menu_ngang': include('chuc_nang/menu_ngang/xoa_menu_ngang.php'); break;
		case 'exec_sua_menu_ngang': include('chuc_nang/menu_ngang/exec_sua_menu_ngang.php'); break;
		case 'exec_them_menu_ngang': include('chuc_nang/menu_ngang/exec_them_menu_ngang.php'); break;
		case 'menu_doc': include('chuc_nang/menu_doc/menu_doc.php'); break;
		case 'them_menu_doc': include('chuc_nang/menu_doc/them_menu_doc.php'); break;
		case 'ql_menu_doc': include('chuc_nang/menu_doc/ql_menu_doc.php'); break;
		case 'sua_menu_doc': include('chuc_nang/menu_doc/sua_menu_doc.php'); break;
		case 'xoa_menu_doc': include('chuc_nang/menu_doc/xoa_menu_doc.php'); break;
		case 'exec_sua_menu_doc': include('chuc_nang/menu_doc/exec_sua_menu_doc.php'); break;
		case 'exec_them_menu_doc': include('chuc_nang/menu_doc/exec_them_menu_doc.php'); break;
		case 'san_pham': include('chuc_nang/san_pham/index.php'); break;
		case 'exec_them_sp': include('chuc_nang/san_pham/exec_them_sp.php'); break;
		case 'exec_sua_sp': include('chuc_nang/san_pham/exec_sua_sp.php'); break;
		case 'ql_sanpham': include('chuc_nang/san_pham/ql_sanpham.php'); break;
		case 'sua_sp': include('chuc_nang/san_pham/sua_sp.php'); break;
		case 'them_sp': include('chuc_nang/san_pham/them_sp.php'); break;
		case 'xoa_sp': include('chuc_nang/san_pham/xoa_sp.php'); break;
		case 'logout': include('chuc_nang/quan_ly/logout.php'); break;
		case 'login': include('chuc_nang/quan_ly/login.php'); break;
		default: include('chuc_nang/quan_ly/content.php'); break;
		case 'them_anh_slide': include('chuc_nang/slideshow/them_anh_slide.php'); break;
		case 'ql_slideshow': include('chuc_nang/slideshow/ql_slideshow.php'); break;
		case 'xoa_anh_slide': include('chuc_nang/slideshow/xoa_anh_slide.php'); break;
		case 'sua_anh_slide': include('chuc_nang/slideshow/sua_anh_slide.php'); break;
		case 'exec_them_anh_slide': include('chuc_nang/slideshow/exec_them_anh_slide.php'); break;
		case 'exec_sua_anh_slide': include('chuc_nang/slideshow/exec_sua_anh_slide.php'); break;
		case 'chi_tiet_hoa_don': include('chuc_nang/hoa_don/chi_tiet_hoa_don.php'); break;
		case 'xoa': include('chuc_nang/hoa_don/xoa.php'); break;
		case 'xu_ly': include('chuc_nang/hoa_don/xu_ly.php'); break;
		case 'hoa_don': include('chuc_nang/hoa_don/hoa_don.php'); break;
		case 'chi_tiet': include('chuc_nang/san_pham/chi_tiet.php'); break;
		case 'search': include('chuc_nang/search/search.php'); break;
		case 'quan_ly_thanh_vien': include('chuc_nang/quan_ly/quan_ly_thanh_vien.php'); break;
		case 'xoa_tt_thanh_vien': include('chuc_nang/quan_ly/xoa_tt_thanh_vien.php'); break;
	}
}
else{
	include('chuc_nang/quan_ly/content.php');
}
?>