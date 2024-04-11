<p><b><h3 style="color: #ec522b"><center>TIỆN ÍCH - GIẢI TRÍ - KẾT NỐI</center></h3></b></p>
<b style="color: #ec522b">1. GIỚI THIỆU:</b>
<p>- TECHNOLOGY xuất hiện mang đến làn gió mới, xuất hiện từ đầu năm 2024 đầy biến động nhưng những gì TECHNOLOGY thực hiện đem tới một chất lượng và giá thành tốt nhất thị trường hiện nay.</p>
<p>- Với lực lượng sản xuất chuyên nghiệp, để có những sản phẩm đầy chất lượng và tốt nhất mang tới cho người dùng, shop không ngừng nỗ lực.</p>
<p>- Với tư duy nghiên cứu và phát triển, chú trọng đầu tư công nghệ, thiết bị tiên tiến hàng đầu, không ngừng học hỏi để làm ra những sản phẩm đạt tiêu chuẩn, có tính cạnh tranh cao.</p>
<b style="color: #ec522b">2. GIÁ TRỊ CỐT LÕI:</b>
<p>- Luôn đặt sự hài lòng của khách hàng ưu tiên số 1 trong mọi suy nghĩ và hành động của mình.<br>
<p>- Làm đúng, làm đủ theo thiết kế.</p>
<p>- Khi nỗ lực hết mình mà thấy không thể giữ lời thì lập tức thông tin cho người liên quan, tìm hiểu, dọn dẹp hậu quả và đưa lời hứa mới.</p>
<b style="color: #ec522b">3. TRIẾT LÝ KINH DOANH:</b>
<p>- Luôn luôn đổi mới, phát triển, chấp nhận thất bại và tiếp tục nỗ lực.</p>
<p>- Thiết kế đi đôi với hình ảnh, đem tới những sản phẩm gần gũi, tưới sáng.</p>
<p>- Đổi mới về mô hình kinh doanh.</p>
<p>- Dịch vụ và sản phẩm tốt nhất cho người dùng.</p>
<p>- Cam kết mang đến một dịch vụ và trải nghiệm tốt nhất trong tầm giá.</p>
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