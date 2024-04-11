<?php
	if(!isset($login)){exit();}
?>
<div class="addproduct">
	<form method="post" action="?menu=exec_them_sp" enctype="multipart/form-data">
		<table style="width:92%;margin-left:55px; border-collapse: collapse;">
		<tr align="center">
<p style="font-weight: bold; font-size: 25px;text-align: center; margin-top:40px;">THÊM SẢN PHẨM MỚI</p>
</tr>
			<tr>
				<td colspan="4" style="text-align: center;font-weight: bold; background-color:#337ab7" >THÔNG TIN SẢN PHẨM</td>
			</tr>
			<tr>
				<td style="text-align: center;"><label for="name" >Tên sản phẩm</label></td>
				<td style="text-align: center;"><label for="cost">Giá</label></td>
				<td style="text-align: center;"><label for="soluong">Số lượng</label></td>
				<td style="text-align: center;"><label for="loaisp">Loại sản phẩm</label></td>

			</tr>
			<tr>
				<td style="text-align: center;"><input type="text" id="name" name="name" required ></td>
				<td style="text-align: center;"><input type="text" id="cost" name="cost" required ></td>
				<td style="text-align: center;"><input type="text" id="soluong" name="soluong" required ></td>
				<td style="text-align: center;">
					<select name="loaisp" id="loaisp"  required >
						<option value="laptop">Laptop</option>
						<option value="mobile">Điện thoại</option>
						<option value="tablet">Máy tính bảng</option>
						<option value="phukien">Phụ kiện</option>
					</select>
				</td>
			</tr>
		</table>
		<table style="width:92%;margin-left:55px; border-collapse: collapse;">
			<tr>
				<td colspan="2" style="text-align: center;font-weight: bold; background-color:#337ab7">HÌNH ẢNH</td>
			</tr>
			<tr>
				<td class="right" style="width:50%;">
					<label for="image1">Ảnh 1:</label><br>
					<label for="image2">Ảnh 2:</label><br>
					<label for="image3">Ảnh 3:</label><br>
					<label for="image4">Ảnh 4:</label><br>
					<label for="image5">Ảnh 5:</label>
				</td>
				<td>
					<input type="file" id="image" name="image"  required ><br>
					<input type="file" id="image2" name="image1"><br>
					<input type="file" id="image3" name="image2"><br>
					<input type="file" id="image4" name="image3"><br>
					<input type="file" id="image5" name="image4">
				</td>
			</tr>
		</table>
		<table style="width:92%;margin-left:55px; border-collapse: collapse;">
			<tr>
				<td colspan="4" style="text-align: center;font-weight: bold; background-color:#337ab7">CẤU HÌNH</td>
			</tr>
			<tr>
				<td style="text-align: center;"><label for="man_hinh">Màn hình</label></td>
				<td style="text-align: center;"><label for="do_phan_giai">Độ phân giải</label></td>
				<td style="text-align: center;"><label for="kich_thuoc_man_hinh">Kích thước màn hình</label></td>
				<td style="text-align: center;"><label for="loai_man_hinh">Loại màn hình</label></td>
			</tr>
			<tr>
				<td style="text-align: center;"><input type="text" id="man_hinh" name="man_hinh" required ></td>
				<td style="text-align: center;"><input type="text" id="do_phan_giai" name="do_phan_giai" required ></td>
				<td style="text-align: center;"><input type="text" id="kich_thuoc_man_hinh" name="kich_thuoc_man_hinh" required ></td>
				<td style="text-align: center;"><input type="text" id="loai_man_hinh" name="loai_man_hinh" required ></td>
			</tr>
			<tr>
				<td colspan="4"><hr></td>
			</tr>
			<tr>
				<td style="text-align: center;"><label for="ngon_ngu">Ngôn ngữ</label></td>
				<td style="text-align: center;"><label for="he_dieu_hanh">Hệ điều hành</label></td>
				<td style="text-align: center;"><label for="ram">RAM</label></td>
				<td style="text-align: center;"><label for="bo_nho_trong">Bộ nhớ trong</label></td>
			</tr>
			<tr>
				<td style="text-align: center;"><input type="text" id="ngon_ngu" name="ngon_ngu" required ></td>
				<td style="text-align: center;"><input type="text" id="he_dieu_hanh" name="he_dieu_hanh" required ></td>
				<td style="text-align: center;"><input type="text" id="ram" name="ram" required ></td>
				<td style="text-align: center;"><input type="text" id="bo_nho_trong" name="bo_nho_trong" required ></td>
			</tr>
			<tr>
				<td colspan="4"><hr></td>
			</tr>
			<tr>
				<td style="text-align: center;"><label for="cpu">CPU</label></td>
				<td style="text-align: center;"><label for="chipset">Chipset</label></td>
				<td style="text-align: center;"><label for="so_nhan">Số nhân</label></td>
				<td style="text-align: center;"><label for="toc_do_cpu">Tốc độ CPU</label></td>
			</tr>
			<tr>
				<td style="text-align: center;"><input type="text" id="cpu" name="cpu" required ></td>
				<td style="text-align: center;"><input type="text" id="chipset" name="chipset" required ></td>
				<td style="text-align: center;"><input type="text" id="so_nhan" name="so_nhan" required ></td>
				<td style="text-align: center;"><input type="text" id="toc_do_cpu" name="toc_do_cpu" required ></td>
			</tr>
			<tr>
				<td colspan="4"><hr></td>
			</tr>
			<tr>
				<td style="text-align: center;"><label for="chip_do_hoa">Chip đồ họa</label></td>
				<td style="text-align: center;"><label for="camera_truoc">Camera Trước</label></td>
				<td style="text-align: center;"><label for="camera_sau">Camera Sau</label></td>
				<td style="text-align: center;"><label for="the_nho">Thẻ nhớ</label></td>
			</tr>
			<tr>
				<td style="text-align: center;"><input type="text" id="chip_do_hoa" name="chip_do_hoa" required ></td>
				<td style="text-align: center;"><input type="text" id="camera_truoc" name="camera_truoc" required  ></td>
				<td style="text-align: center;"><input type="text" id="camera_sau" name="camera_sau" required ></td>
				<td style="text-align: center;"><input type="text" id="the_nho" name="the_nho" required ></td>
			</tr>
			<tr>
				<td colspan="4"><hr></td>
			</tr>
			<tr>
				<td style="text-align: center;"><label for="danh_ba">Danh Bạ</label></td>
				<td style="text-align: center;"><label for="quay_phim">Quay phim</label></td>
				<td style="text-align: center;"><label for="video_call">Video Call</label></td>
				<td style="text-align: center;"><label for="den_flash">Đèn Flash</label></td>
			</tr>
			<tr>
				<td style="text-align: center;"><input type="text" id="danh_ba" name="danh_ba" required >
				<td style="text-align: center;">
					<select name="quay_phim" id="quay_phim">
						<option value="có">Có</option>
						<option value="không">Không</option>
					</select>
				</td>
				<td style="text-align: center;">
					<select name="video_call" id="video_call">
						<option value="có">Có</option>
						<option value="không">Không</option>
					</select>
				</td>
				<td style="text-align: center;">
					<select name="den_flash" id="den_flash">
						<option value="có">Có</option>
						<option value="không">Không</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="4"><hr></td>
			</tr>
			<tr>
				<td style="text-align: center;"><label for="da_phuong_tien">Đa phương tiện</label></td>
				<td style="text-align: center;"><label for="single3g4g">3G/4G</label></td>
				<td style="text-align: center;"><label for="loai_sim">Loại sim</label></td>
				<td style="text-align: center;"><label for="so_sim">Số sim</label></td>
			</tr>
			<tr>
				<td style="text-align: center;"><input type="text" id="da_phuong_tien" name="da_phuong_tien" required ></td>
				<td style="text-align: center;"><select name="single3g4g" id="single3g_4g">
						<option value="3G">3G</option>
						<option value="3G/4G">3G/4G</option>
					</select>
				</td>
				<td style="text-align: center;">
					<select name="loai_sim" id="loai_sim">
						<option value="Sim thường">Sim thường</option>
						<option value="MicroSim">MicroSim</option>
						<option value="NanoSim">NanoSim</option>
					</select>
				</td>
				<td style="text-align: center;"><input type="text" id="so_sim" name="so_sim" required ></td>
			</tr>
			<tr>
				<td colspan="4"><hr></td>
			</tr>
			<tr>
				<td style="text-align: center;"><label for="wifi">Wifi</label></td>
				<td style="text-align: center;"><label for="gps">GPS</label></td>
				<td style="text-align: center;"><label for="bluetooth">Bluetooth</label></td>
				<td style="text-align: center;"><label for="gprs_edge">GPRS/EDGE</label></td>
			</tr>
			<tr>
				<td style="text-align: center;">
					<select name="wifi" id="wifi">
						<option value="có">Có</option>
						<option value="không">Không</option>
					</select>
				</td>
				<td style="text-align: center;">
					<select name="gps" id="gps">
						<option value="có">Có</option>
						<option value="không">Không</option>
					</select>
				</td>
				<td style="text-align: center;">
					<select name="bluetooth" id="bluetooth">
						<option value="có">Có</option>
						<option value="không">Không</option>
					</select>
				</td>
				<td style="text-align: center;">
					<select name="gprs_edge" id="gprs_edge">
						<option value="có">Có</option>
						<option value="không">Không</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="4"><hr></td>
			</tr>
			<tr>
				<td style="text-align: center;"><label for="chuc_nang_khac">Chức năng khác</label></td>
				<td style="text-align: center;"><label for="kich_thuoc">Kích thước</label></td>
				<td style="text-align: center;"><label for="khoi_luong">Khối lượng</label></td>
				<td style="text-align: center;"><label for="pin">Pin</label></td>
			</tr>
			<tr>
				<td style="text-align: center;"><input type="text" id="chuc_nang_khac" name="chuc_nang_khac" required  ></td>
				<td style="text-align: center;"><input type="text" id="kich_thuoc" name="kich_thuoc" required  required ></td>
				<td style="text-align: center;"><input type="text" id="khoi_luong" name="khoi_luong" required ></td>
				<td style="text-align: center;"><input type="text" id="pin" name="pin" required ></td>
			</tr>
		</table>
		<table style="width:92%;margin-left:55px; border-collapse: collapse;">
			<tr>
				<td colspan="4"><hr></td>
			</tr>
			<tr>
			<form method="post" action="?menu=exec_them_sp">
				<td class="right"><input type="submit" name="submit" value="Thêm"></td>
				
				<td><input type="submit" name="cancel" value="Hủy"></td>
				</form>
			</tr>
		</table>
	</form>
</div>