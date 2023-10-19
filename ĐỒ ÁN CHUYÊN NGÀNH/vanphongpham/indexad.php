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
    <th>Sửa</th>
    <th>Xóa</th>
    </tr>
</thead>
<body>
<?php
$i=1;
while($row = mysqli_fetch_assoc($query))
{
     $prd_name=$row['prd_name'];
?>
<tr>
    <td><?php echo $i++;?></td>
    <td><?php echo $row['prd_name'];?></td>
    <td><img style="width: 100px"; src="img/<?php echo $row['image'];?>"></td>
    <td><?php echo $row ['price'];?>đ</td>
    <td><?php echo $row['quantily'];?></td>
    <td><?php echo nl2br($row['description']);?></td>
    <td><?php echo $row['brand_name'];?></td>
    <td><a href="index.php?quanly=sua&id=<?php echo $row['prd_id']; ?>">Sửa</a></td>
    <td><a onclick="return Del('<?php echo $row['prd_name'];?>')" href="index.php?quanly=xoa&id=<?php echo $row['prd_id'];?>">Xóa</a></td>
</tr>
<?php
} 
?>
</body>
</table>
<a class="btn-btn-primary" href="index.php?quanly=them">Thêm mới</a>
</div>
<script>
    function Del(name){
    return confirm("Bạn có chắc muốn xóa sản phẩm: "+ name + "?");
}
</script>