<!DOCTYPE html>
<html>

<head>
    <title>Thành viên</title>
    <style type="text/css">
        table,
        th,
        td {
            border: 0.1px solid white;
            text-align: center;
        }

        table {
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <script type="text/javascript">
        $(document).ready(function () {
            document.title = 'Thành viên';
        });
    </script>

    <?php
    include('../connect.php');

        $sl1 = "select * from quan_tri where name='" . $_SESSION['user'] . "'AND quyen_truy_cap = 1" ;
      
        $exec1 = mysqli_query($connect, $sl1);
$row1 = mysqli_fetch_array($exec1);

        if ($row1) { 
            $sl2 = "SELECT * FROM thanh_vien";
            $exec2 = mysqli_query($connect, $sl2);
    ?>
            <table class="table" style="width:97%;margin-left:20px; border-collapse: collapse;">
                <tr align="center">
                <p style="font-weight: bold; font-size: 25px;text-align: center; margin-top:40px;">DANH SÁCH THÀNH VIÊN</p>
                </tr>
                <tr>
                    <th style="text-align: center;color: white; background-color: #ec522b;padding:15px;font-weight: bold;">STT</th>
                    <th style="text-align: center;color: white; background-color: #ec522b;padding:15px;font-weight: bold;">TÊN ĐĂNG NHẬP</th>
                    <th style="text-align: center;color: white; background-color: #ec522b;padding:15px;font-weight: bold;">HỌ VÀ TÊN</th>
                    <th style="text-align: center;color: white; background-color: #ec522b;padding:15px;font-weight: bold;">NGÀY SINH</th>
                    <th style="text-align: center;color: white; background-color: #ec522b;padding:15px;font-weight: bold;">GIỚI TÍNH</th>
                    <th style="text-align: center;color: white; background-color: #ec522b;padding:15px;font-weight: bold;">SỐ CMND</th>
                    <th style="text-align: center;color: white; background-color: #ec522b;padding:15px;font-weight: bold;">ĐỊA CHỈ</th>
                    <th style="text-align: center;color: white; background-color: #ec522b;padding:15px;font-weight: bold;">EMAIL</th>
                    <th style="text-align: center;color: white; background-color: #ec522b;padding:15px;font-weight: bold;">SỐ ĐIỆN THOẠI</th>
                    <th style="text-align: center;color: white; background-color: #ec522b;padding:15px;font-weight: bold;">XOÁ</th>
                </tr>

                <?php
                $stt = 1; 
                while ($row = mysqli_fetch_array($exec2)) {
                ?>
                    <tr style="width:100%;">
                        <td><?php echo $stt; ?></td>
                        <td style="width:13%;"><?php echo $row['username']; ?></td>
                        <td style="width:10%;"><?php echo $row['hoten']; ?></td>
                        <td style="width:10%;"><?php
                                                $ngaysinh = $row['ngaysinh'];
                                                $array = explode("-", $ngaysinh);
                                                $nam = $array[0];
                                                $thang = $array[1];
                                                $ngay = $array[2];
                                                $ngaysinh = $ngay . "-" . $thang . "-" . $nam;
                                                echo $ngaysinh;
                                                ?></td>
                        <td style="width:8%;"><?php echo $row['gioitinh']; ?></td>
                        <td style="width:8%;"><?php echo $row['cmnd']; ?></td>
                        <td style="width:19%;"><?php echo $row['diachi']; ?></td>
                        <td style="width:10%;"><?php echo $row['email']; ?></td>
                        <td style="width:10%;"><?php echo $row['sdt']; ?></td>
                        <td>
                        <form method="post" action="?menu=xoa_tt_thanh_vien">
                            <input type="hidden" name="username" value="<?php echo $row['username']; ?>">
                            <button  style=" color: white;background-color: #ec522b; border: 0.1px solid #337ab7;padding: 7px 20px;border-radius: 2px;border:none; " type="submit" onclick="return confirm('Bạn chắc chắn muốn xóa không?');">Xóa</button>
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
            echo "<script> alert('Bạn không có quyền truy cập vào trang này.'); location.href='?menu=trang_chu'; </script>";
        }
    ?>
</body>

</html>
