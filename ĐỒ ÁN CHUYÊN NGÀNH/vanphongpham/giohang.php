<?php
include('ketnoi.php');
$sql="SELECT * from cart inner join products on cart.prd_id = products.prd_id";
$query= mysqli_query($conn, $sql);
$tong=0;
if (isset($_SESSION['email']) && $_SESSION['email']) {
    $email = $_SESSION['email'];
}else{
    $email = "khách";
}
$dem=0;
?>
<div class="giohang">
    <div class="card-body">
    <table class="table">
    <thead class="thead-dark">
    <tr>
    <th></th>
    <th>Tên sản phẩm</th>   
    <th>Ảnh sản phẩm</th>
    <th>Giá sản phẩm</th>
    <th>Số lượng</th>
    <th colspan=2><center>Chỉnh sửa</center></th>
    <th>Xóa</th>
    </tr>
    </thead>
    </div>
    <?php
    $i=1;
    while($row = mysqli_fetch_assoc($query))    
    {
        if($row['username']==$email){
    ?>
    <tr>
        <td><?php echo $i++;?></td>
        <td><?php echo $row['prd_name'];?></td>
        <td><img style="width: 100px"; src="img/<?php echo $row['image'];?>"></td>
        <td><?php echo $row ['price'];?>đ</td>
        <td><?php echo $row['quantity'];?></td>
        <td><a href="index.php?quanly=themgh&id=<?php echo $row['prd_id'];?>">Tăng</a></td>
        <td><a href="index.php?quanly=giamgh&id=<?php echo $row['prd_id'];?>">Giảm</a></td>
        <td><a onclick="return Del('<?php echo $row['prd_name'];?>')" href="index.php?quanly=xoagh&id=<?php echo $row['prd_id'];?>">Xóa</a></td>
    </tr>
<?php
    $tong = $tong + ($row ['price'] * $row['quantity']);
    $dem=$dem+1;
    } }
    if($dem==0) echo '<tr><td colspan="8"><center>'.'chưa có sản phẩm trong giỏ hàng'.'</center></td></tr>';
?>
    <tr>
        <td><b>Tổng tiền: </b><?php echo $tong;?>.000đ</td>
        <td colspan="7"><div class = "dathang">
            <a href="dathang.php">
            <input type = "button" name = "login" value = "ĐẶT HÀNG"/>
</div>
            </a>
        </td>
</div>
    </tr>
</table>


<script>
    function Del(name){
    return confirm("Bạn có chắc muốn xóa sản phẩm: "+ name + "?");
}
</script>