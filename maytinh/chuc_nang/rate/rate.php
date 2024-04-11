<?php 
	include('connect.php');
	$sl= "update san_pham set rate".$_POST['rate']."=rate".$_POST['rate']." + 1 where masp=".$_POST['masp'];
	$exec= mysqli_query($connect, $sl);
	if($exec){
?>
	<p class="alert alert-success" style=" background-color: #ec522b; color: #fff;">Cảm ơn bạn đã dành thời gian để đánh giá sản phẩm của chúng tôi. Đó là nguồn động viên quý báu giúp chúng tôi ngày càng hoàn thiện và mang đến dịch vụ tốt nhất. Bấm<a href="javascript:history.back(-1);" style="color:#337ab7"> vào đây </a>để quay lại trang sản phẩm khám phá thêm nhiều ưu đãi hấp dẫn. Chúng tôi trân trọng sự ủng hộ của bạn và mong rằng bạn sẽ tiếp tục đồng hành cùng chúng tôi trong những trải nghiệm tương lai. Hãy cho chúng tôi biết nếu có điều gì chúng tôi có thể hỗ trợ!
</p>
<?php 
	}
	else{
?>
	<p class="alert alert-warning">Đánh giá thất bại. Bấm<a href="javascript:history.back(-1);" style="color:#337ab7"> vào đây </a>để quay lại trang sản phẩm.</p>
<?php
	}
	?>