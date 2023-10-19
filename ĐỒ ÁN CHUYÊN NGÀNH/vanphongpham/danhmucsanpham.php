<?php
include('ketnoi.php');
$sql = "SELECT * from products inner join brands on products.brand_id = brands.brand_id";
$query = mysqli_query($conn, $sql);
?>
<div class="card-body">
    <table class="table">
    <thead class="thead-dark">
    <tr>
    <th></th>
    <th>Tên sản phẩm</th>   
    <th>Ảnh sản phẩm</th>
    <th>Giá sản phẩm</th>
    <th>Số lượng sản phẩm</th>
    <th>Mô tả sản phẩm</th>
    <th>Phân loại sản phẩm</th>
    <th>Thêm sản phẩm</th>
    </tr>
</thead>
<body>
<?php
$i=1;
while($row = mysqli_fetch_assoc($query))
{
?>
<tr>
    <td><?php echo $i++;?></td>
    <td><?php echo $row['prd_name'];?></td>
    <td><img style="width: 100px"; src="img/<?php echo $row['image'];?>"></td>
    <td><?php echo $row ['price'];?>đ</td>
    <td><?php echo $row['quantily'];?></td>
    <td><?php echo nl2br($row['description']);?></td>
    <td><?php echo $row['brand_name'];?></td>
    <td><a href="index.php?quanly=xulygiohang&id=<?php echo $row['prd_id']; ?>"><input type = "button" name = "add" value = "Thêm"/></a></td>
</tr>
<?php
} 
?>
</body>
</table>
</div>