<p><b><h3 style="color: #ec522b;"><center>ĐIỀU KHOẢN SỬ DỤNG</center></h3></b></p>
<p><b style="color: #ec522b;"><center>Áp dụng cho toàn bộ đơn hàng của Quý Khách tại TECHNOLOGY</center></b></p>
<p>- Chào mừng bạn đến với TECHNOLOGY! Trước mua sắm, vui lòng đọc quy định trên trang TECHNOLOGY. Hỗ trợ qua email: TECHNOLOGY@gmail.com. Đồng hành cùng bạn!</p>
<b style="color: #ec522b;">1. TÀI KHOẢN CỦA KHÁCH HÀNG</b>
<p>&ensp;- Để trải nghiệm tốt nhất với dịch vụ TECHNOLOGY, vui lòng cung cấp thông tin chính xác khi đăng ký tài khoản. Hãy duy trì bảo mật, cập nhật thông tin đúng, và đăng xuất an toàn sau mỗi lần sử dụng để bảo vệ thông tin cá nhân của bạn. Thông tin không đầy đủ hoặc sai có thể dẫn đến từ chối phục vụ. Cảm ơn sự hợp tác của bạn!</p>
<b style="color: #ec522b;">2. QUYỀN LỢI BẢO MẬT THÔNG TIN CỦA KHÁCH HÀNG</b>
<p>&ensp;- TECHNOLOGY cam kết bảo mật thông tin quý khách, chỉ sử dụng để cải thiện dịch vụ và không chuyển giao cho bên thứ ba vì mục đích thương mại. Thông tin chỉ được tiết lộ khi có yêu cầu pháp luật. Cảm ơn sự tin tưởng của quý khách!</p>
<b style="color: #ec522b;">3. TRÁCH NHIỆM CỦA KHÁCH HÀNG KHI SỬ DỤNG DỊCH VỤ CỦA TECHNOLOGY</b>
<p>&ensp;- Vui lòng không can thiệp hoặc thay đổi dữ liệu trên trang web TECHNOLOGY bằng bất kỳ cách nào không hợp pháp. Nếu phát hiện lỗi hệ thống, vui lòng liên hệ ngay với quản trị web qua số điện thoại: <strong style="color: #ec522b;">1900 XXXX</strong> hoặc email: <strong style="color: #ec522b;">TECHNOLOGY@gmail.com</strong>. Xin cảm ơn sự hợp tác của quý khách!</p>
<p>&ensp;- Vui lòng không có ý kiến hoặc hành động có thể gây xúc phạm, quấy rối, hoặc làm phiền người khác. Cảm ơn sự hợp tác của quý khách!</p>
<b style="color: #ec522b;">4. TRÁCH NHIỆM VÀ QUYỀN LỢI CỦA TECHNOLOGY</b>
<p>&ensp;- TECHNOLOGY không chịu trách nhiệm về tổn thất ngoài ý muốn hoặc trách nhiệm cá nhân. Quảng bá sản phẩm trên website đòi hỏi sự đồng ý bằng văn bản từ TECHNOLOGY. Điều khoản sử dụng có thể thay đổi và sẽ được thông báo trên trang web. Cảm ơn sự hiểu biết và hợp tác của quý khách!</p>
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