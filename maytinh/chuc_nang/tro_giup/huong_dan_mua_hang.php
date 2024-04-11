<p><b><h3 style="color: #ec522b;"><center>HƯỚNG DẪN MUA HÀNG</center></h3></b></p>
<p><b style="color: #ec522b;"><center>Áp dụng cho toàn bộ đơn hàng của Quý Khách tại TECHNOLOGY</center></b></p>
<p><b style="color: black;">&ensp;1. Đặt hàng trực tiếp:</b> Thông qua chức năng bán hàng online trên <a href="http://localhost:8080/maytinh/index.php" style="color: #ec522b;">website</a>.</p>
<p><b style="color: black;">&ensp;2. Đặt hàng thông qua Facebook:</b> Quý khách có thể đặt hàng trực tiếp thông qua nick chat facebook trên website. Quý khách hãy để lại thông tin liên hệ! Nhân viên kinh doanh sẽ liên hệ với quý khách ngay khi có thể và chuyển hàng đến cho quý khách.</p>
<p><b style="color: black;">&ensp;3. Điện thoại trực tiếp:</b style="color: #ec522b;"> TECHNOLOGY 1900 XXXX.</p>
<p><b style="color: black;">&ensp;4. Mua hàng trực tiếp:</b> Quý khách hàng có thể đến địa chỉ 46 Hàm Nghi, Đà Nẵng<br>để mua hàng trực tiếp.</p>
<p><b style="color: black;">&ensp;5. Xem video hướng dẫn mua hàng:</b><a href="https://www.youtube.com/watch?v=WqUCZwUm4e0 target="_blank" style="color: #ec522b;"> Xem tại đây</a></p>
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