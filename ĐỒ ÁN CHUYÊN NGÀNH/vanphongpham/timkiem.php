<?php
    include('ketnoi.php');
   

    if (isset($_SESSION['email']) && $_SESSION['email']) {
        $id = $_SESSION['id'];
    }else{
        $id = "member";
    }
    
    $search = addslashes($_GET['timkiem']);
    if (empty($search)){
        echo "Yeu cau nhap du lieu vao o trong";
    }else{
        $query = "select * from products where prd_name like '%$search%'";
        $sql = mysqli_query($conn,$query);
        $num = mysqli_num_rows($sql);
        if ($num > 0 && $search != ""){
        echo "<center><strong>KẾT QUẢ TÌM ĐƯỢC: $num $search</strong></center>";
        ?>
        <table class="table">
        <thead class="thead-dark">
        <tr>
        <th></th>
        <th>Tên sản phẩm</th>   
        <th>Ảnh sản phẩm</th>
        <th>Giá sản phẩm</th>
        <th>Số lượng sản phẩm</th> 
        <th>Mô tả sản phẩm</th>
        <?php
        if($id=="member"){
            ?>
        <th>Thêm</th>
        <?php
        }
        else{
        ?>
        <th>Sửa</th>
        <th>Xóa</th>
        <?php
        }
        ?>
        </tr>
<?php
    $i=1;
    while ($row = mysqli_fetch_assoc($sql)){
?> 
    <tr>
    <td><?php echo $i++;?></td>
    <td><?php echo $row['prd_name'];?></td>
    <td><img style="width: 100px"; src="img/<?php echo $row['image'];?>"></td>
    <td><?php echo $row ['price'];?>đ</td>
    <td><?php echo $row['quantily'];?></td>
    <td><?php echo nl2br($row['description']);?></td>
    <?php
    if($id=="member"){
        ?>
    <td><a href="index.php?quanly=xulygiohang&id=<?php echo $row['prd_id']; ?>"><input type = "button" name = "add" value = "Thêm"/></a></td>
    <?php
    }
    else{
    ?>
    <td><a href="index.php?quanly=sua&id=<?php echo $row['prd_id']; ?>">Sửa</a></td>
    <td><a onclick="return Del('<?php echo $row['prd_name'];?>')" href="index.php?quanly=xoa&id=<?php echo $row['prd_id'];?>">Xóa</a></td>
    <?php
    }
    ?>
    </tr>
 <?php
    }
    echo '</thead></table>';
    }else {
        echo "Khong tim thay ket qua!";}
}
?>   