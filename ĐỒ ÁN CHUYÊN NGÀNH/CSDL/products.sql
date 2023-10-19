-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3307
-- Thời gian đã tạo: Th12 23, 2022 lúc 04:23 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webvanphongpham`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `prd_id` int(5) NOT NULL,
  `prd_name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `image` char(50) CHARACTER SET utf8mb4 NOT NULL,
  `price` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `quantily` int(10) NOT NULL,
  `description` varchar(500) CHARACTER SET utf8mb4 NOT NULL,
  `brand_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`prd_id`, `prd_name`, `image`, `price`, `quantily`, `description`, `brand_id`) VALUES
(41, 'CUỘN BĂNG KEO', 'bangkeo.jpg', '4.000', 10, '• Tên sản phẩm: băng keo\r\n• Màu sắc: đủ màu\r\n• Kích thước: 8 x 8mm\r\n• Chất liệu: giấy washi', 2),
(46, 'BỘ ĐỒ CHƠI RÚT GỖ', 'dochoi.jpg', '128.000', 20, '• Tên sản phẩm: bộ đồ chơi rút gỗ (54 thanh gỗ, 4 xúc xắc)\r\n• Màu sắc: đủ màu\r\n• Chất liệu: gỗ', 4),
(51, 'BÚT XÓA', 'butxoa.jpg', '8.000', 20, '• Tên sản phẩm: bút xóa\r\n• Màu sắc: đủ màu\r\n• Kích thước: 6m\r\n• Chất liệu: nhựa', 2),
(52, 'ĐÈN NGỦ PHÁT SÁNG', 'denngu.jpg', '48.000', 10, '• Tên sản phẩm: đèn ngủ\r\n• Màu sắc: đủ màu\r\n• Kích thước: 20 x 30cm\r\n• Chất liệu: sillicon', 3),
(54, 'BÚT BI', 'butbi.jpg', '12.000', 30, '• Tên sản phẩm: bút bi nước\r\n• Màu sắc: đen\r\n• Kích thước: 0.38mm\r\n• Chất liệu: nhựa', 2),
(56, 'BỘ ĐỒ CHƠI ELSA', 'dochoielsa.jpg', '94.000', 10, '• Tên sản phẩm: bộ đồ chơi elsa\r\n• Màu sắc: xanh\r\n• Chất liệu: nhựa', 4),
(58, 'ĐỒNG HỒ BÁO THỨC', 'dongho5.jpg', '43.000', 20, '• Tên sản phẩm: đồng hồ báo thức\r\n• Màu sắc: xám, hồng, xanh dương\r\n• Kích thước: 14 x 7 x 12m\r\n• Chất liệu: nhựa, inox', 3),
(60, 'KÉO THỦ CÔNG', 'keo.jpg', '6.000', 20, '• Tên sản phẩm: kéo thủ công\r\n• Màu sắc: xanh dương, hồng, be\r\n• Kích thước: 14 x 7cm\r\n• Chất liệu: lưỡi kéo kim loại, đầu và tay cầm bọc nhựa', 2),
(65, 'TÚI BÚT BƠ', 'tuibut.jpg', '18.000', 20, '• Tên sản phẩm: túi bút bơ\r\n• Màu sắc: trơn\r\n• Kích thước: 20 x 9cm\r\n• Chất liệu: PVC', 2),
(66, 'BỘ ĐỒ CHƠI BÁC SĨ', 'dochoibacsi.jpg', '128.000', 10, '• Tên sản phẩm: bộ đồ chơi bác sĩ\r\n• Màu sắc: hồng\r\n• Chất liệu: nhựa', 4),
(67, 'VỞ HỌC SINH', 'vohoc.jpg', '8.000', 100, '• Tên sản phẩm: vở học sinh 96 trang 4 ô ly\r\n• Màu sắc: y hình\r\n• Kích thước: 16 x 21cm\r\n• Độ trắng: 90 - 92% ISO', 1),
(68, 'GẤU BÔNG BƠ', 'gaubong.jpg', '76.000', 10, '• Tên sản phẩm: gấu bông bơ\r\n• Kích thước: 35cm\r\n• Thiết kế : ngộ nghĩnh đáng yêu\r\n• Chất liệu: vải nhung mềm, không xù lông, hình thêu', 3),
(69, 'BỘ THƯỚC EKE', 'thuocke.jpg', '16.000', 10, '• Tên sản phẩm: bộ thước eke (4 món)\r\n• Màu sắc: trắng\r\n• Kích thước: 10 - 20cm\r\n• Chất liệu: nhựa', 2),
(70, 'VỞ HỌC SINH', 'vo.jpg', '9.000', 100, '• Tên sản phẩm: vở học sinh 96 trang 4 ô ly\r\n• Màu sắc: y hình\r\n• Kích thước: 16 x 21cm\r\n• Độ trắng: 90 - 92% ISO', 1),
(73, 'ĐỒNG HỒ CÁT', 'donghocat.jpg', '72.000', 10, '• Tên sản phẩm: đồng hồ cát\r\n• Màu sắc: trắng, đen\r\n• Kích thước: 135 x 50 x 30mm\r\n• Chất liệu: thủy tinh', 3),
(74, 'GỌT BÚT CHÌ', 'gotbutchi.jpg', '3.000', 20, '• Tên sản phẩm: gọt bút chì\r\n• Màu sắc: đủ màu\r\n• Kích thước: 5cm\r\n• Chất liệu: nhựa', 2),
(75, 'QUẢ CẦU THỦY TINH', 'qualuuniem.jpg', '113.000', 10, '• Tên sản phẩm: quả cầu tuyết rơi\r\n• Màu sắc: đủ màu\r\n• Kích thước: 0.2kg\r\n• Chất liệu: nhựa, thủy tinh', 3),
(76, 'MÓC KHÓA HOẠT HÌNH', 'mockhoa.jpg', '7.000', 50, '• Tên sản phẩm: móc khóa hoạt hình\r\n• Màu sắc: đủ màu\r\n• Kích thước: 10cm\r\n• Chất liệu: nhựa', 3),
(77, 'CHUÔNG GIÓ', 'chuonggio.jpg', '83.000', 10, '• Tên sản phẩm: chuông gió\r\n• Màu sắc: trắng\r\n• Kích thước: 24 x 5cm\r\n• Chất liệu: nhựa', 3),
(78, 'SÁCH TIẾNG ANH', 'sachtienganh.jpg', '148.000', 10, '• Tên sản phẩm: sách tiếng anh\r\n• Kích thước: 20 x 25cm\r\n• Loại bìa: bìa mềm', 1),
(79, 'BỘ SÁCH GIÁO KHOA', 'sgk.jpg', '265.000', 100, '• Tên sản phẩm: bộ sách giáo khoa (10 - 15 cuốn)\r\n• Kích thước: 15 x 21cm\r\n• Loại bìa: bìa mềm', 1),
(80, 'VỞ HỌC SINH', 'vo1.jpg', '17.000', 100, '• Tên sản phẩm: vở học sinh 200 trang 4 ô ly\r\n• Màu sắc: y hình\r\n• Kích thước: 175 x 250mm\r\n• Độ trắng: 90 - 92% ISO', 1),
(81, 'VỞ HỌC SINH', 'vo11.jpg', '18.000', 50, '• Tên sản phẩm: vở học sinh 200 trang 4 ô ly\r\n• Màu sắc: y hình\r\n• Kích thước: 175 x 250mm\r\n• Độ trắng: 90 - 92% ISO', 1),
(82, 'BỘ ĐỒ CHƠI NHÀ BẾP', 'dochoinhabep.jpg', '234.000', 10, '• Tên sản phẩm: bộ đồ chơi nhà bếp\r\n• Màu sắc: hồng\r\n• Chất liệu: nhựa', 4),
(83, 'BỘ XE ĐỒ CHƠI', ' xedochoi.jpg', '33.000', 10, '• Tên sản phẩm: bộ xe đồ chơi (4 món)\r\n• Màu sắc: đủ màu\r\n• Chất liệu: nhựa', 4),
(85, 'RUBIK', 'dochoi1.jpg', '45.000', 10, '• Tên sản phẩm: rubik\r\n• Màu sắc: đủ màu\r\n• Kích thước: 57 x 57 x 57mm\r\n• Chất liệu: nhựa', 4),
(86, 'BỘ ĐỒ CHƠI BI DA', 'dochoi2.jpg', '21.000', 20, '• Tên sản phẩm: bộ đồ chơi bi da\r\n• Màu sắc: y hình\r\n• Kích thước: 41 x 30cm\r\n• Chất liệu: nhựa', 4),
(89, 'COMBO SÁCH', 'sach.jpg', '138.000', 10, '• Tên sản phẩm: sách tiếng anh\r\n• Kích thước: 20 x 25cm\r\n• Loại bìa: bìa mềm', 1),
(90, 'CỤC GÔM ', 'tay2.jpg', '6.000', 20, '• Tên sản phẩm: tẩy\r\n• Màu sắc: ngẫu nhiên\r\n• Kích thước: 5 x 3cm\r\n• Khối lượng tịnh: 20g', 2),
(91, 'HỒ DÁN', 'hodan.jpg', '5.000', 20, '• Tên tin sản phẩm: hồ dán in hình hoạt họa\r\n• Chất liệu: hồ khô\r\n• Màu sắc: ngẫu nhiên\r\n• Kích thước: 8 x 2cm\r\n• Khối lượng: 16g', 2),
(92, 'GỌT BÚT CHÌ', 'gotbutchi1.jpg', '2.000', 10, '• Tên sản phẩm: gọt bút chì\r\n• Màu sắc: đủ màu\r\n• Kích thước: 5cm\r\n• Chất liệu: nhựa', 2),
(95, 'VỞ HỌC SINH', 'vo2.jpg', '18.000', 10, '• Tên sản phẩm: vở học sinh 200 trang 4 ô ly\r\n• Màu sắc: y hình\r\n• Kích thước: 175 x 250mm\r\n• Độ trắng: 90 - 92% ISO', 1),
(96, 'TRUYỆN TRANH DORAEMON', 'truyen.jpg', '18.000', 30, '• Truyện Doraemon tập ngắn - Trọn bộ 45 tập - NXB Kim Đồng\r\n• Tác giả: Fujiko F Fujio\r\n• Năm phát hành: 2021\r\n• Số trang: 196\r\n• Hình thức: đọc ngược', 1),
(97, 'VỞ HỌC SINH', 'vo22.jpg', '9.000', 100, '• Tên sản phẩm: vở học sinh 96 trang 4 ô ly\r\n• Màu sắc: y hình\r\n• Kích thước: 16 x 21cm\r\n• Độ trắng: 90 - 92% ISO', 1),
(98, 'GẤU BÔNG TUẦN LỘC', 'gau.jpg', '59.000', 20, '• Tên sản phẩm: gấu bông tuần lộc\r\n• Kích thước: 25cm\r\n• Thiết kế : ngộ nghĩnh đáng yêu\r\n• Chất liệu: vải nhung mềm, không xù lông, hình thêu', 3),
(99, 'VÒNG TAY', 'vongtay.jpg', '20.000', 20, '• Tên sản phẩm: vòng tay hạt cườm mặt cười handmade\r\n• Màu sắc: đủ màu\r\n• Kích thước: 16 - 18cm\r\n• Chất liệu: nhựa, dây cước có giãn', 3),
(100, 'VÒNG TAY', 'vong,jpg', '68.000', 10, '• Tên sản phẩm: vòng tay thuê\r\n• Màu sắc: đủ màu\r\n• Kích thước: 16 - 18cm\r\n• Chất liệu: nhựa', 3),
(101, 'ĐỒ CHƠI BẮN VÒNG NƯỚC WATER', 'dochoi11.jpg', '26.000', 10, '• Tên sản phẩm: đồ chơi bắn vòng nước water\r\n• Màu sắc: ngẫu nhiên\r\n• Kích thước: 10 - 5cm\r\n• Chất liệu: nhựa', 4),
(102, 'BỘ ĐỒ CHƠI CỜ VUA', 'dochoi22.jpg', '188.000', 10, '• Tên sản phẩm: bộ đồ chơi cờ vua\r\n• Màu sắc: vàng, bạc\r\n• Kích thước: 25 x 25 x 2cm\r\n• Chất liệu: nhựa ABS', 4),
(103, 'BỘ XẾP HÌNH XE PHÓNG TÊN LỬA', 'dochoi111.jpg', '116.000', 10, '• Tên sản phẩm: bộ xếp hình xe phóng tên lửa\r\n• Màu sắc: đủ màu\r\n• Chất liệu: nhựa', 4);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prd_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `prd_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
