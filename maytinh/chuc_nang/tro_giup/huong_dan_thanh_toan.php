<p><b><h3 style="color: #ec522b;"><center>HƯỚNG DẪN THANH TOÁN</center></h3></b></p>
<p><b style="color: #ec522b;"><center>Áp dụng cho toàn bộ đơn hàng của Quý Khách tại TECHNOLOGY</center></b></p>
<p><b style="color: black;">&ensp;1 Thanh toán trực tiếp:</b> Thanh toán trực tiếp với nhân viên giao hàng hoặc nhân viên<br>của công ty sẽ thu tiền tại quầy.</p>
<p><b style="color: black;">&ensp;2. Thanh toán bằng hình thức chuyển khoản:</b> Chuyển khoản qua tài khoản ngân hàng<br>(vui lòng thông báo sau khi chuyển tiền thành công).</p>
<p><b style="color: black;">&ensp;3. Xem video hướng dẫn thanh toán:</b><a href="https://www.youtube.com/watch?v=YKFZtMoB4EE target="_blank" style="color: #ec522b;"> Xem tại đây</a></p>
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