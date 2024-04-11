
<div class="panel panel-primary" style="border: 0.1px solid #ec522b;">
	<div class="panel-heading" style="cursor: pointer; border: 0.1px solid #ec522b; background-color: #ec522b;">ĐĂNG NHẬP TÀI KHOẢN</div>
	<div class="panel-body">
<form action="?menu=exec_dang_nhap" method="post" class="login-form">
    <table class="table">
	    <tr>
			<td><label for="user">Tên đăng nhập: </label></td>
			<td><input  class="form-control" type="text" name="username" id="user" placeholder="Nhập tên đăng nhập..." required style="width:500px; margin-left:20px;"></td>
		</tr>
		<tr>
			<td><label for="pass">Mật khẩu:</label></td>
			<td><input class="form-control" type="password" name="password" id="pass" placeholder="Nhập mật khẩu..." required style="width:500px; margin-left:20px;"></td>
		</tr>
        <tr>
            <td colspan="2" align="center">
            <div class="button-container">
                <input type="submit" name="submit" class="btn btn-nhap" value="Đăng nhập" style="width: 100px; color: #fff; background-color: #337ab7; margin-left: 50px; margin-top: 30px;">
                <form action="?menu=exec_dang_nhap" method="post">
                 <input type="submit" class="btn btn-huy" name="cancel" value="Hủy" style="width: 100px; color: #fff; background-color: #DC143C; margin-top: 30px;">
                </form>
                </div>
            </td>
           
    


        </tr>
    </table>
</form>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        document.title = 'Đăng nhập';
    });
</script>