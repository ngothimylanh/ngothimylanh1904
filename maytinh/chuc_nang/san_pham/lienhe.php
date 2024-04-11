<p><b><h3 style="color: #ec522b"><center>HỖ TRỢ TỪ CHÚNG TÔI</center></h3></b></p>
<p>- Tư vấn và cung cấp những sản phẩm chất lượng hàng đầu đã được chọn lọc kỹ càng để đưa đến với người tiêu dùng.</p>
<p>- Nhận đặt hàng trực tuyến và giao hàng tận nơi. Không hỗ trợ đặt mua và nhận hàng trực tiếp tại mọi chi nhánh văn phòng trên toàn quốc.</p>
<p>- Nhận đổi trả, đền bù trong vòng 3 - 4 ngày nếu sản phẩm bị hư tổn vì lý do vận chuyển, sản phẩm không đúng theo yêu cầu.</p>
<p style="color: #ec522b"><strong>Mọi thắc mắc và phản hồi xin vui lòng liên hệ:</p></strong>
<style>
.anh img {
    width: 30px;
    height: 30px;
    margin-top: 5px;
}
</style>
<div class="anh">
    <img src="images/hotline.png">
    <a href="#" arget="_blank"  style="color:#ec522b;">Hotline: 1900 XXXX</a><br>
    <img src="images/email.png">
    <a href="mailto:your-email@example.com" arget="_blank" style="color:#ec522b;">Email: TECHNOLOGY@gmail.com</a><br>
    <img src="images/facebook.png">
    <a href="https://www.facebook.com/ntmlanh.194" target="_blank"  style="color:#ec522b;">Facebook: https://www.facebook.com/ntmlanh.194</a><br>
    <img src="images/instagram.png">
    <a href="https://www.instagram.com/ntmlanh.194/" target="_blank"  style="color:#ec522b;">Instagram: https://www.instagram.com/ntmlanh.194/</a><br>
    <img src="images/twitter.png">
    <a href="https://https://twitter.com/i/flow/login" target="_blank"  style="color:#ec522b;">Twitter: https://twitter.com/i/flow/login</a>
</div><br>
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
