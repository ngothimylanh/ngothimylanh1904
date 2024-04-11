<p><b><h3 style="color: #ec522b;"><center>CHÍNH SÁCH BẢO HÀNH</center></h3></b></p>
<p><b style="color: #ec522b;"><center>Áp dụng cho toàn bộ đơn hàng của Quý Khách tại TECHNOLOGY</center></b></p>
<b style="color: #ec522b;">1. BẢO HÀNH SẢN PHẨM</b>
<p>&ensp;- Bảo hành chính hãng: Đối với các sản phẩm điện tử khách hàng có thể mang sản phẩm đến trực tiếp hãng để bảo hành mà không cần thông qua TECHNOLOGY.</p>
<p>&ensp;- Bảo hành thông qua TECHNOLOGY: Khách hàng liên hotline:<strong style="color:#ec522b;"> 1900 XXXX</strong> hoặc truy cập TECHNOLOGY@gmail.com để được hỗ trợ tư vấn về thực hiện bảo hành.</p>
<b style="color: #ec522b;">2. BẢO HÀNH MIỄN PHÍ</b><br>
<span><b style="color: #ec522b;">2.1. Sản phẩm của quý khách được bảo hành miễn phí chính hãng khi:</b></span><br>
<p>&ensp;- Còn thời hạn bảo hành (dựa trên tem/phiếu bảo hành).</p>
<p>&ensp;- Tem/phiếu bảo hành còn nguyên vẹn.</p>
<p>&ensp;- Sản phẩm bị lỗi kỹ thuật.</p>
<span><b style="color: #ec522b;">2.2. Các trường hợp có thể phát sinh phí bảo hành:</b></span><br>
<p>&ensp;- Sản phẩm hết thời hạn bảo hành.</p>
<p>&ensp;- Sản phẩm bị bể, biến dạng trong động cơ hoặc hư hỏng trong quá trình sử dụng.</p>
<p>&ensp;- Sản phẩm bị hư hỏng do lỗi của người sử dụng, không xuất phát từ lỗi vốn có của hàng hóa.</p>
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