<style>
    .btn-primary {
        width: 70px;
        color: white;
        background-color: #ec522b;
        border: 0.1px solid #ec522b;
        margin: 5px;
        padding: 8px;
        border-radius: 5px;
        transition: color 0.3s;
    }
    table {
        border-collapse: collapse;
        width: 100%;
    }
</style>

<?php
include('../connect.php');
$sl1 = "select * from quan_tri where name='" . $_SESSION['user'] . "'";
$exec1 = mysqli_query($connect, $sl1);
$row1 = mysqli_fetch_array($exec1);
if ($row1['quyen_truy_cap'] == 1) {
?>
    <table class="table" style="width:92%; margin-left:55px; text-align: center;">
    <tr align="center">
    <p style="font-weight: bold;  text-align: center; line-height: 40px; margin-top:30px; font-size: 25px;">DANH SÁCH NHÂN VIÊN</p>

    </tr>
        <tr >
            <td style="color: white; background-color: #ec522b;padding:15px; font-weight: bold;">STT</td>
            <td style="color: white; background-color: #ec522b;padding:15px;font-weight: bold;">TÊN TÀI KHOẢN</td>
            <td style="color: white; background-color: #ec522b;padding:15px;font-weight: bold;">MẬT KHẨU</td>
            <td style="color: white; background-color: #ec522b;padding:15px;font-weight: bold;">XOÁ</td>
        </tr>

        <?php
        $sl = "select * from quan_tri WHERE quyen_truy_cap = 0";
        $exec = mysqli_query($connect, $sl);
        $stt = 1; 
        while ($row = mysqli_fetch_array($exec)) {
        ?>
            <tr>
                <td><?php echo $stt; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['pass']; ?></td>
                <td>
                    <form method="post" action="?menu=xoa_tt_admin">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <button type="submit" class="btn btn-primary" onclick="return confirm('Bạn chắc chắn mún xóa không?');">Xóa</button>
                    </form>
                </td>
            </tr>
        <?php
            $stt++;
        }
        ?>
    </table>

<?php
} else {
    echo "<script> alert('Bạn không có quyền truy cập vào trang này.'); location.href='?menu=?menu=trang_chu'; </script>";
}
?>
