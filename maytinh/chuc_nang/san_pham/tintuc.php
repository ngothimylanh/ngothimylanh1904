<p><b><h3 style="color: #ec522b"><center>TIN TỨC VỀ CHÚNG TÔI</center></h3></b></p>
<p style="color: #ec522b"><b>1. TIN KHUYẾN MÃI, TIN CÔNG NGHỆ, TIN SỰ KIỆN</b></p>
<p style="color: #ec522b"><b>2. DỊCH VỤ</b></p>
<p style="color: #ec522b"><b>Hướng dẫn mua hàng</b></p>
<span><b>- Quý khách có thể đặt hàng theo một trong các cách sau:</b></span><br>
<p><b style="color: #ec522b">&ensp;+ Đặt hàng trực tiếp:</b> Thông qua chức năng bán hàng online trên website.</p>
<p><b style="color: #ec522b">&ensp;+ Đặt hàng thông qua Facebook:</b> Quý khách có thể đặt hàng trực tiếp thông qua nick chat facebook trên website. Quý khách hãy để lại thông tin liên hệ! Nhân viên kinh doanh sẽ liên hệ với quý khách ngay khi có thể và chuyển hàng đến cho quý khách.</p>
<p><b style="color: #ec522b">&ensp;+ Điện thoại trực tiếp:</b> TECHNOLOGY 1900 XXXX.</p>
<p><b style="color: #ec522b">&ensp;+ Mua hàng trực tiếp:</b> Quý khách hàng có thể đến địa chỉ 465 Hàm Nghi, Đà Nẵng<br>để mua hàng trực tiếp.</p>
<p style="color: #ec522b"><b>Hướng dẫn thanh toán</b></p>
<span><b>- Sau khi mua hàng, trong quá trình thực hiện thanh toán, quý khách có thể thanh toán bằng những cách sau:</b></span><br>
<p><b style="color: #ec522b">&ensp;+ Thanh toán trực tiếp:</b> Thanh toán trực tiếp với nhân viên giao hàng hoặc nhân viên<br>của công ty sẽ thu tiền tại quầy.</p>
<p><b style="color: #ec522b">&ensp;+ Thanh toán bằng hình thức chuyển khoản:</b> Chuyển khoản qua tài khoản ngân hàng<br>(vui lòng thông báo sau khi chuyển tiền thành công).</p>
<div class="like-button" onclick="likeArticle()">
        <img src="images/like.png" alt="Like">Thích <span id="like-count">0</span>
    </div>
    <div class="share-button" onclick="shareArticle()">
        <img src="images/share.png" alt="Share">Chia sẻ <span id="share-count"></span>
    </div>
    <style>
    .like-button, .share-button {
        display: inline-block;
        padding: 6px;
        margin: 5px;
        border: 1px solid #ec522b;
        border-radius: 5px;
        cursor: pointer;
        background-color: #ec522b;
        color: white;
    }

    .like-button img, .share-button img {
        width: 15px;
        height: 15px;
        margin-right: 3px;
    }
</style>
<script>
    var likeCount = 0, shareCount = 0;
    function likeArticle() {
        likeCount++;
        document.getElementById('like-count').innerText = likeCount;
        alert('Thích bài viết!');
    }

    function shareArticle() {
        shareCount++;
        document.getElementById('share-count').innerText = shareCount;
        setTimeout(() => {
            alert('Chia sẻ bài viết!');
        },);
    }
</script>