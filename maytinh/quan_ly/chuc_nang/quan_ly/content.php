<?php
    if (!isset($login)) {
        exit();
    }
?>
<style>
    .title {
        text-align: center; 
    }
</style>
<?php
    include('../connect.php');

    $sl1 = "SELECT * FROM quan_tri WHERE name='" . $_SESSION['user'] . "' AND quyen_truy_cap = 0";
    $exec1 = mysqli_query($connect, $sl1);
    $row1 = mysqli_fetch_array($exec1);

    if ($row1 && $row1['quyen_truy_cap'] == 0) {
?>
        <table align="center" border="1">
            <tr class="title">
                <td style="width:50%;">THÊM MỚI</td>
                <td style="width:50%;">QUẢN LÝ</td>
            </tr>
            <tr>
                <td>
                    <p><a href="?menu=them_sp">Thêm sản phẩm</a></p>
                    <p><a href="?menu=them_menu_ngang">Thêm menu ngang</a></p>
                    <p><a href="?menu=them_menu_doc">Thêm menu dọc</a></p>
                    <p><a href="?menu=them_anh_slide">Thêm ảnh vào slideshow</a></p>
                </td>
                <td>
                    <p><a href="?menu=ql_sanpham">Quản lý sản phẩm</a></p>
                    <p><a href="?menu=ql_menu_ngang">Quản lý menu ngang</a></p>
                    <p><a href="?menu=ql_menu_doc">Quản lý menu dọc</a></p>
                    <p><a href="?menu=quan_ly_thanh_vien">Quản lý danh sách khách hàng</a></p>
                    <p><a href="?menu=ql_slideshow">Quản lý ảnh slideshow</a></p>
                </td>
            </tr>
        </table>
<?php
    } else {
        echo "<script> alert('Bạn không có quyền truy cập vào trang này.'); location.href='?menu=trang_chu'; </script>";
    }
?>
