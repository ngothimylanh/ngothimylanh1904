<?php
session_start();
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
<div class="dathangtb">
    <table class="dathangtb">
    <tr>
    <th colspan="2">Từ: Văn phòng phẩm THE BOOK</th>   
    <th>Đến: <?php echo $email ?></th>
    </tr>
    <?php
    while($row = mysqli_fetch_assoc($query))    
    {
        if($row['username']==$email){
    ?>
    <tr>
        <td><?php echo $row['prd_name'];?></td>
        <td><?php echo $row['price'];?></td>
        <td><?php echo $row['quantity'];?></td>
    </tr>
<?php
    $tong = $tong + ($row ['price'] * $row['quantity']);
    $dem=$dem+1;
    } }
    if($dem==0) echo '<tr><td colspan="3"><center>'.'chưa có sản phẩm'.'</center></td></tr>';
?>
    <tr><td colspan="3"><b>Tổng tiền: </b><?php echo $tong;?>.000đ</td></tr>
</table>
<div class = "dathang">
            <a href="thanhcong.php">
            <input type = "button" name = "login" value = "XÁC NHẬN"/>
</div>
</div>