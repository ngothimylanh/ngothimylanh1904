<?php

	
	if (isset($_SESSION['giohang'])) {
		if (count($_SESSION['giohang']) == 0) {
			unset($_SESSION['giohang']);
?>
			<p class="alert alert-warning" style="background-color: #ec522b; color: #fff;">Giỏ hàng bạn trống bạn vui cần thêm sản phẩm vào giỏ. Bấm <a href="?menu=san_pham" style="color: #337ab7;">vào đây</a> để chọn sản phẩm mình mong muốn và mua hàng.</p>
<?php
		} else {
			if (isset($_POST['submit'])) {
				include('connect.php'); 
				
				foreach ($_POST['sl_sp'] as $masp => $sp) {
					$_SESSION['giohang'][$masp] = $sp;
				}
				echo "<script> alert('Cập nhật giỏ hàng thành công'); </script>";
			}
?>

			<script type="text/javascript">
				$(document).ready(function() {
					document.title = 'Giỏ hàng (<?php echo $cart; ?>)';
				});
			</script>
			<div class="panel panel-primary" style="border: 0.1px solid #ec522b;">
				<div class="panel-heading" style="cursor: pointer; border: 0.1px solid #ec522b; background-color: #ec522b;">THÔNG TIN GIỎ HÀNG</div>
				<div class="panel-body">
					<form method="post">
						<table class="table">
							<tr style="font-weight: bold;">
								<td>Tên sản phẩm</td>
								<td>Đơn giá</td>
								<td>Số lượng</td>
								<td>Thành tiền</td>
								<td>Xoá sản phẩm</td>
							</tr>
							<?php				
								$tg = 0;
								foreach ($_SESSION['giohang'] as $masp => &$sp) { 
									$id_array[] = $masp;
								}
								$_SESSION['giohang'] = array_combine($id_array, $_SESSION['giohang']);
								$list_id = implode(',', $id_array);
								$sl = 'select * from san_pham where masp in (' . $list_id . ')';
								$exec = mysqli_query($connect, $sl);
								while ($row = mysqli_fetch_array($exec)) {
							?>
							<tr>
								<td><?php echo $row['tensp'] ?></td>
								<td><?php echo number_format($row['giasp'], 0, ",", ".")."đ"; ?></td>
								<td width="15%">
									<input type="number" min="1" class="form-control" style="width: 70%;" max="<?php echo $row['soluong'];?>" name="sl_sp[<?php echo $row['masp']; ?>]" value="<?php echo $_SESSION['giohang'][$row['masp']]; ?>">
								</td>
								<td><?php $tog = ($row['giasp'] * $_SESSION['giohang'][$row['masp']]); echo number_format($tog, 0, ",", ".")."đ"; ?></td>
								<td style="text-align: center;"><a href="?menu=del_cart&masp=<?php echo $row['masp']; ?>" style="padding:7px 20px; background-color:#ec522b; color:#fff;">Xóa</a></td>
							</tr>
							<?php
								$tg = $tg + $tog;
								}
							?>
							<tr align="center">
								<td colspan="5"><input class="btn btn-primary" type="submit" name="submit" value="Cập nhật sản phẩm" style="background-color: #ec522b;border:none;"></td>
							</tr>
						</table>
					</form>
					<table class="table">
						<tr style="font-weight: bold;">
							<td colspan="4" style="font-weight: bold;">TỔNG GIÁ TRỊ GIỎ HÀNG:</td>
							<td><?php echo number_format($tg, 0, ",", ".")."đ"; ?></td>
						</tr>
						<tr>
							<td colspan="5" align="center"><a href="?menu=del_cart&masp=0" style="color: #ec522b;">Xóa toàn bộ giỏ hàng</a></td>
						</tr>
						<tr>
							<td colspan="5" align="center">
								<form action="?menu=thanh_toan" method="post">
									<input type="submit" class="btn btn-primary" name="thanh_toan" value="Thanh toán" style="background-color: #ec522b; border:none;">
								</form>
							</td>
						</tr>
					</table>
				</div>
			</div>
<?php
		}
	} elseif (!isset($_SESSION['giohang'])) {
?>
		<p class="alert alert-warning" style="background-color: #ec522b; color: #fff;">Giỏ hàng bạn trống bạn vui cần thêm sản phẩm vào giỏ. Bấm <a href="?menu=san_pham" style="color: #337ab7;">vào đây</a> để chọn sản phẩm mình mong muốn và mua hàng.</p>
<?php
	}
?>
