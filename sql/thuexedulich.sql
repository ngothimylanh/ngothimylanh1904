create database thuexedulich;
use thuexedulich;

--Câu 1.1. Tạo đầy đủ lược đồ cơ sở dữ liệu quan hệ như mô tả ở trên. Sinh viên tự định nghĩa kiểu dữ liệu cho các cột.
create table KHACHHANG(
	MaKH nvarchar(50),
	HoTenKH nvarchar(50),
	DiaChiKH nvarchar(50), 
	SoDienThoaiKH nvarchar(50),
	constraint pk_KHACHHANG primary key(MaKH)
);

create table LOAIXE(
	MaLoaiXe nvarchar(50),
	MoTaLoaiXe nvarchar(50),
	constraint pk_LOAIXE primary key(MaLoaiXe)
);

create table XE(
	MaXe nvarchar(50),
	BienSo nvarchar(50),
    HangXe nvarchar(50),
	MaLoaiXe nvarchar(50), 
	DonGiaChoThue real,
	constraint pk_XE primary key(MaXe),
    constraint fk_XE_LOAIXE foreign key(MaLoaiXe) references LOAIXE(MaLoaiXe)
);

create table LOAIDICHVU(
	MaLoaiDV nvarchar(50),
	MoTaLoaiDV nvarchar(50),
	constraint pk_LOAIDICHVU primary key(MaLoaiDV)
);

create table HOPDONGCHOTHUE(
	MaHopDong nvarchar(50),
	MaKH nvarchar(50), 
	SoTienDatCoc real,
	TrangThaiHopDong nvarchar(50),
	constraint pk_HOPDONGCHOTHUE primary key(MaHopDong),
    constraint fk_HOPDONGCHOTHUE_KHACHHANG foreign key(MaKH) references KHACHHANG(MaKH)
);

create table CHITIETHOPDONG(
	MaHopDong nvarchar(50),
	MaXe nvarchar(50),
	MaLoaiDV nvarchar(50),
	NgayNhanXe date,
	NgayTraXe date,
	constraint pk_CHITIETHOPDONG primary key (MaHopDong,MaXe),
	constraint fk_CHITIETHOPDON_HOPDONGCHOTHUE foreign key(MaHopDong) references HOPDONGCHOTHUE(MaHopDong),
	constraint fk_CHITIETHOPDON_XE foreign key(MaXe) references XE(MaXe),
	constraint fk_CHITIETHOPDON_LOAIDICHVU foreign key(MaLoaiDv) references LOAIDICHVU(MaLoaiDV)
);

insert into KHACHHANG (MaKH,HoTenKH,DiaChiKH,SoDienThoaiKH) values 
('KH1', N'Đặng Hoài Sơn', N'Liên Chiểu', '0905666666'),
('KH2', N'Đặng Ngọc Chi', N'Thanh Khê', '0905123456'),
('KH3', N'Hồ Hảo', N'Liên Chiểu', '09112346'),
('KH4', N'Lê Lan Nhã', N'Hải Châu', '09012346'),
('KH5', N'Trần Khôi Hùng', N'Hải Châu', '0914987654');

insert into LOAIXE (MaLoaiXe,MoTaLoaiXe) values 
('LX1', N'Xe 4 chỗ'),
('LX2', N'Xe 7 chỗ'),
('LX3', N'Xe 24 chỗ');

insert into XE (MaXe,BienSo,HangXe,MaLoaiXe,DonGiaChoThue) values 
('X1','43A-567.28', 'Kia', 'LX1', 300000),
('X2', '43D-129.98','Honda', 'LX1', 400000),
('X3', '43A-126.94', 'Toyota','LX3', 900000),
('X4', '43A-676.22', 'Toyota','LX2', 500000),
('X5', '43X-567.45', 'Kia','LX1', 200000);

insert into LOAIDICHVU (MaLoaiDV,MoTaLoaiDV) values 
('LDV1', N'Đám cưới'),
('LDV2', N'Du lịch');

insert into HOPDONGCHOTHUE (MaHopDong,MaKH,SoTienDatCoc,TrangThaiHopDong) values 
('HD1', 'KH2', 100000, N'Đã kết thúc'),
('HD2', 'KH2', 0, N'Đang cho thuê'),
('HD3', 'KH1', 0, N'Đã kết thúc'),
('HD4', 'KH5', 200000, N'Đang cho thuê'),
('HD5', 'KH4', 500000, N'Đang cho thuê'),
('HD6', 'KH4', 0, N'Chưa bắt đầu'),
('HD7', 'KH2', 0, N'Đã kết thúc');

insert into CHITIETHOPDONG(MaHopDong,MaXe,NgayNhanXe,NgayTraXe) values 
('HD1', 'X3','LDV2', '2018/06/13', '2018/07/05'),
('HD2', 'X1', 'LDV1', '2018/10/11', '2018/10/22'),
('HD3', 'X4', 'LDV1', '2018/12/23', '2018/12/30'),
('HD4', 'X2', 'LDV2', '2018/01/01', '2018/01/10'),
('HD4', 'X3', 'LDV1', '2019/02/10', '2019/02/12'),
('HD5', 'X2', 'LDV1', '2019/10/16', '2019/10/18'),
('HD6', 'X1', 'LDV2', '2019/09/23', '2019/09/25'),
('HD7', 'X4', 'LDV1', '2019/11/01', '2019/11/10'),
('HD7', 'X1', 'LDV1', '2020/07/07', '2020/07/18');

--Câu 1.3: Liệt kê những xe cho thuê gồm các thông tin về mã xe, biển số xe, hãng xe có đơn giá cho thuê nhỏ hơn 500.000 VND.
select MaXe, BienSO, HangXe, DonGiaChoThue
from XE
where DonGiaChoThue < 500000;

--Câu 1.4: Liệt kê những khách hàng gồm thông tin mã khách hàng, họ và tên khách hàng có địa chỉ ở ‘Liên Chiểu’ 
--mà có số điện thoại bắt đầu bằng ‘090’ và những khách hàng có địa chỉ ở ‘Hải Châu’ mà có số điện thoại bắt đầu bằng ‘091’.
select  MaKH, HoTenKH, DiaChiKH, SoDienThoaiKh
from KHACHHANG
where (DiaChiKH = N'Liên Chiểu' and SoDienThoaiKh like '090%') or (DiaChiKH = N'Hải Châu' and SoDienThoaiKh like '091%');

--Câu 1.5.Liệt kê thông tin của các khách hàng có họ (trong họ tên) là ‘Đặng’.
select * from KhachHang where HoTenKH like N'Đặng%';
  
--Câu 1.6.Liệt kê thông tin mã xe, hãng xe của toàn bộ các xe được thuê một lần duy nhất.
select XE.MaXe, HangXe 
from XE
inner join CHITIETHOPDONG on XE.MaXe = CHITIETHOPDONG.MaXe
group by XE.MaXe, HangXe
having count(XE.MaXe) = 1
order by XE.MaXe;

--Câu 1.7.Liệt kê các hợp đồng cho thuê gồm mã hợp đồng, số tiền đặt cọc có trạng thái hợp đồng là ‘Đã kết thúc’ của khách hàng có tên là ‘Chi’.
select MaHopDong, SoTienDatCoc
from HOPDONGCHOTHUE
inner join KHACHHANG on HOPDONGCHOTHUE.MaKH = KHACHHANG.MaKH
where TrangThaiHopDong = N'Đã kết thúc' and HoTenKH like '%Chi';

--Câu 1.8.Liệt kê thông tin của các khách hàng mà chưa có hợp đồng thuê xe nào.
select MaKH from KHACHHANG
except
select MaKH from HOPDONGCHOTHUE;

--Câu 1.9.Cho biết những mã hợp đồng mà vừa sử dụng loại dịch vụ 'Đám cưới' vừa sử dụng loại dịch vụ 'Du lịch'. 
select MaHopDong from CHITIETHOPDONG where MaLoaiDV='LDV1' 
intersect
select MaHopDong from CHITIETHOPDONG where MaLoaiDV='LDV2';

--Câu 1.10.Liệt kê họ và tên khách hàng, mã hợp đồng, trạng thái hợp đồng của tất cả các hợp đồng với yêu cầu 
--những khách hàng chưa có một hợp đồng nào thì cũng phải liệt kê thông tin những họ và tên khách hàng đó ra.
select HoTenKH, HOPDONGCHOTHUE.MaHopDong, HOPDONGCHOTHUE.TrangThaiHopDong
from KHACHHANG
left join HOPDONGCHOTHUE on KHACHHANG.MaKH = HOPDONGCHOTHUE.MaKH;

--Câu 1.11.Liệt kê không trùng lặp thông tin mã khách hàng, họ và tên khách hàng của các khách hàng có địa chỉ là ‘Hải Châu’ đã từng thuê xê thuộc loại xe 
--có mô tả là ‘Xe 24 chỗ’ hoặc các khách hàng từng thuê xe có thời gian nhận xe là 07/07/2020. Sắp xếp tăng dần theo mã khách hàng và giảm dần 
--theo họ và tên khách hàng.
select distinct KHACHHANG.MaKH, HoTenKH 
from KHACHHANG
inner join HOPDONGCHOTHUE on HOPDONGCHOTHUE.MaKH = KHACHHANG.MaKH
inner join CHITIETHOPDONG on CHITIETHOPDONG.MaHopDong = HOPDONGCHOTHUE.MaHopDong
inner join XE on CHITIETHOPDONG.MaXe = XE.MaXe
inner join LOAIXE on XE.MaLoaiXe = LOAIXE.MaLoaiXe
where (DiaChiKH = N'Hải Châu' and LOAIXE.MoTaLoaiXe = N'Xe 24 chỗ') or CHITIETHOPDONG.NgayNhanXe = '07/07/2020'
order by MaKH, HoTenKH desc;

--Câu 1.12.Thống kê số lần được thuê của các xe mà xe đó có số ngày mượn lớn hơn 10 ngày gồm các thông tin mã xe, số lần thuê.
select XE.MaXe, HangXe 
from CHITIETHOPDONG
inner join XE on CHITIETHOPDONG.MaXe = XE.MaXe
where datediff (day, NgayNhanXe, NgayTraXe) > 10
group by XE.MaXe, HangXe;

--Câu 1.13.Cho biết có bao nhiêu xe đã được đùng để cho thuê trong tổng số xe.
select count(distinct XE.MaXe) from XE
inner join CHITIETHOPDONG on CHITIETHOPDONG.MaXe=XE.MaXe


--Câu 1.14.Liệt kê thông tin của những khách hàng đã từng thuê xe vào năm 2018 nhưng chưa từng thuê vào năm 2019.
select KHACHHANG.MaKH, HoTenKH, DiaChiKH, SoDienThoaiKh, HOPDONGCHOTHUE.MaHopDong, SoTienDatCoc, TrangThaiHopDong, MaLoaiDV, NgayNhanXe, NgayTraXe
from KHACHHANG
left join HOPDONGCHOTHUE on HOPDONGCHOTHUE.MaKH = KHACHHANG.MaKH
left join CHITIETHOPDONG on CHITIETHOPDONG.MaHopDong = HOPDONGCHOTHUE.MaHopDong
where HOPDONGCHOTHUE.MaHopDong not in (select MaHopDong from CHITIETHOPDONG where YEAR(NgayNhanXe) = 2019)
and  HOPDONGCHOTHUE.MaHopDong in (select  MaHopDong from CHITIETHOPDONG where YEAR(NgayNhanXe) = 2018);

-- Câu 1.15. Liệt kê họ và tên của khách hàng mà có từ hai hợp đồng thuê xe trở lên.
select HoTenKH 
from KHACHHANG
inner join HOPDONGCHOTHUE on HOPDONGCHOTHUE.MaKH = KHACHHANG.MaKH
group by HoTenKH
having count(KHACHHANG.MaKH) >= 2;

-- Câu 1.16. Cập nhật cột trạng thái hợp đồng thành ‘Bị hủy’ đối với những hợp đồng có trạng thái là ‘Chưa bắt đầu’ và có số tiền đặt cọc là 0.
update HOPDONGCHOTHUE set TrangThaiHopDong = N'Bị hủy'
where TrangThaiHopDong = N'Chưa bắt đầu' and SoTienDatCoc = 0;

-- Câu 1.17. Xóa những loại dịch vụ chưa từng được sử dụng trong bất kỳ một hợp đồng nào.
delete from LOAIDICHVU where MaLoaiDV not in  (select MaLoaiDV from CHITIETHOPDONG);
