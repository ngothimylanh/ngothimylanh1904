  create database karaoke;
use karaoke;

--Câu 1: Tạo bảng.
create table KHACHHANG(
    MaKH nvarchar(100),
    TenKH nvarchar(50),
    DiaChi nvarchar(50),
    SoDT varchar(10),
	MaSoThue varchar(10),
	constraint pk_KHACHHANG primary key(MaKH) 
);

create table MUCTIENGIO(
    MaTienGio nvarchar(50),
    DonGia int,
    MoTa varchar(200),
    constraint pk_MUCTIENGIO primary key (MaTienGio)
);

create table PHONG(
     MaPhong nvarchar(50),
     SoKhachToiDa int,
     TrangThai nvarchar(50),
     MoTa varchar(200),
	 constraint pk_PHONG primary key (MaPhong)
);

create table DICHVU(
	MaDV nvarchar(50),
	TenDV nvarchar(100),
	DonViTinh char(10),
    DonGia int,
	constraint pk_DICHVU primary key(MaDV)
);

create table HOADON(
   MaHD nvarchar(100),
   MaKH nvarchar(100),
   MaPhong nvarchar(50),
   MaTienGio nvarchar(50),
   ThoiGianBatDauSD varchar(50),
   ThoiGianKetThucSD varchar(50),
   TrangThaiHD nvarchar(50),
   constraint pk_HOADON primary key(MaHD),
   constraint fk_HOADON_KHACHHANG foreign key (MaKH) references KHACHHANG(MaKH),
   constraint fk_HOADON_PHONG foreign key (MaPhong) references PHONG(MaPhong),
   constraint fk_HOADON_MUCTIENGIO foreign key (MaTienGio) references MUCTIENGIO(MaTienGio)
);

create table CHITIET_SUDUNGDV(
    MaHD nvarchar(100),
    MaDV nvarchar(50),
	SoLuong int,
    constraint pk_CHITIET_SUDUNGDV primary key(MaHD, MaDV),
	constraint fk_CHITIET_SUDUNGDV_HOADON foreign key (MaHD) references HOADON(MaHD),
	constraint fk_CHITIET_SUDUNGDV_DICHVU foreign key (MaDV) references DICHVU(MaDV)
);

--Câu 2: Chèn toàn bộ dữ liệu.
insert into KHACHHANG (MaKH, TenKH, DiaChi, SoDT, MaSoThue) values
('KH001','Tran Van Nam','Hai Chau','0905123456','12345678'),
('KH002','Nguyen Mai Anh','Lien Chieu','0905123457','12345679'),
('KH003','Phan Hoai Lan Khue','Hoa Vang','0905123458','12345680'),
('KH004','Nguyen Hoai Nguyen','Hoa Cam','0905123459','12345681'),
('KH005','Le Truong Ngoc Anh','Hai Chau','0905123460','12345682'),
('KH006','Ho Hoai Anh','Hai Chau','0905123461','12345683'),
('KH007','Pham Thi Huong','Son Tra','0905123462','12345684'),
('KH008','Chau Trinh Tri','Hai Chau','0905123463','12345685'),
('KH009','Phan Nhu Thao','Hoa Khanh','0905123464','12345686'),
('KH010','Tran Thi To Tam','Son Tra','0905123465','12345687');

insert into PHONG (MaPhong,SoKhachToiDa,TrangThai,MoTa) values
('VIP01',5,'Duoc su dung','phong vip'),
('P02',10,'Duoc su dung','phong binh thuong'),
('P03',15,'Duoc su dung','phong binh thuong'),
('VIP04',20,'Duoc su dung','phong vip'),
('P05',25,'Duoc su dung','phong binh thuong'),
('P06',30,'Duoc su dung','phong binh thuong'),
('VIP07',35,'Duoc su dung','phong vip'),
('P08',40,'Duoc su dung','phong binh thuong'),
('VIP09',45,'Duoc su dung','phong vip'),
('P010',50,'Duoc su dung','phong binh thuong');

insert into DICHVU (MaDV,TenDV,DonViTinh,DonGia) values
('DV01','Hat Dua','Bao',5000),
('DV02','Trai cay','Dia',30000),
('DV03','Bia','Lon',35000),
('DV04','Nuoc Ngot','Chai',10000),
('DV05','Ruou','Chai',200000);

insert into MUCTIENGIO (MaTienGio,DonGia,MoTa) values
('MT01',60000,'Ap dung tu 6 gio den 17 gio'),
('MT02',80000,'Ap dung sau 17 gio den 22 gio'),
('MT03',100000,'Ap dung tu sau 22 gio den 6 gio sang');

insert into HOADON (MaHD,MaKH,MaPhong,MaTienGio,ThoiGianBatDauSD,ThoiGianKetThucSD,TrangThaiHD) values
('HD001','KH001','VIP01','MT01','11/20/2015 12:30','11/20/2015 12:30','Da thanh toan'),
('HD002','KH002','P02','MT01','12/12/2015 13:10','12/12/2015 17:20','Chua thanh toan'),
('HD003','KH001','P02','MT01','10/15/2015 12:12','10/15/2014 16:30','Da thanh toan'),
('HD004','KH003','VIP01','MT02','9/20/2015 18:30','6/20/2015 21:00','Chua thanh toan'),
('HD005','KH001','P03','MT02','11/25/2014 22:00','11/25/2014','Thanh toan mot phan'),
('HD006','KH001','VIP01','MT01','9/12/2014 9:20','9/12/2014 10:45','Da thanh toan'),
('HD007','KH006','VIP04','MT01','12/22/2014 11:00','12/22/2014 14:20','Da thanh toan'),
('HD008','KH007','VIP04','MT02','8/23/2014 20:10','8/23/2014 22:00','Chua thanh toan'),
('HD009','KH006','P05','MT03','12/20/2015 22:30','12/20/2015 1:15','Chua thanh toan'),
('HD010','KH005','VIP01','MT03','10/10/2015 1:30','10/10/2015 3:15','Da thanh toan'),
('HD011','KH004','VIP07','MT03','12/25/2015 22:15','12/26/2015 2:00','Da thanh toan'),
('HD012','KH008','P06','MT03','7/25/2014 23:45','7/26/2014 2:15','Da thanh toan'),
('HD013','KH007','VIP07','MT02','8/21/2015 18:15','8/21/2015 20:45','Da thanh toan'),
('HD014','KH004','P06','MT02','12/31/2015 19:12','12/31/2015 21:15','Thanh toan mot phan'),
('HD015','KH001','P06','MT01','6/24/2014 13:00','6/24/2014 13:15','Thanh toan mot phan'),
('HD016','KH003','P08','MT01','5/12/2014 8:00','5/12/2014 10:45','Thanh toan mot phan'),
('HD017','KH003','VIP09','MT01','11/20/2015 12:45','11/20/2015 14:20','Da thanh toan'),
('HD018','KH001','P010','MT01','4/12/2015 14:45','4/12/2015 16:45','Da thanh toan'),
('HD019','KH002','VIP09','MT03','11/12/2015 22:12','11/13/2015 2:00','Da thanh toan'),
('HD020','KH004','VIP09','MT03','2/25/2014 1:15','2/25/2014 4:15','Chua thanh toan');

insert into CHITIET_SUDUNGDV (MaHD,MaDV,SoLuong) values
('HD001','DV01',5),
('HD002','DV01',8),
('HD002','DV02',5),
('HD002','DV03',2),
('HD003','DV04',1),
('HD003','DV05',6),
('HD004','DV01',5),
('HD005','DV02',3),
('HD005','DV03',10),
('HD005','DV04',2),
('HD006','DV01',5),
('HD007','DV03',8),
('HD007','DV04',10),
('HD007','DV05',4),
('HD013','DV02',9),
('HD011','DV02',8);

--Câu 3: Liệt kê những phòng karaoke chứa được số lượng tối đa dưới 20 khách.
--Cách 1:
select * from PHONG 
where SoKhachToiDa < 20;

--Cách 2:
select MaPhong,SoKhachToiDa,TrangThai,MoTa from PHONG 
where SoKhachToiDa < 20;

--Câu 4: Liệt kê thông tin của các dịch vụ có đơn vị tính là "Chai" với đơn giá nhỏ hơn 
--20.000 VNĐ và các dịch vụ có đơn vị tính là "Lon" với đơn giá lớn hơn 30.000 VNĐ.
select * from DICHVU
where (DonViTinh = 'Chai' and DonGia < 20000) or (DonViTinh = 'Lon' and DonGia > 30000);

--Câu 5: Liệt kê thông tin của các phòng karaoke có mã phòng bắt đầu bằng cụm từ "VIP".
select * from PHONG 
where MaPhong like 'VIP%';

--Câu 6: Liệt kê thông tin của toàn bộ các dịch vụ, yêu cầu sắp xếp giảm dần theo đơn giá.
select * from DICHVU 
order by DonGia desc;

--Câu 7: Đếm số hóa đơn có trạng thái là "Chưa thanh toán" và có thời gian bắt đầu sử dụng nằm trong ngày hiện tại.
select TrangThaiHD, count(TrangThaiHD) as HoaDonChuaThanhToan
from HOADON
where TrangThaiHD = 'Chua thanh toan' and ThoiGianBatDauSD = getdate()
group by TrangThaiHD;

--Câu 8: Liệt kê địa chỉ của toàn bộ các khách hàng với yêu cầu mỗi địa chỉ được liệt kê một lần duy nhất.
select DiaChi 
from KHACHHANG 
group by DiaChi;

--Câu 9: Liệt kê MaHD, MaKH, TenKH, DiaChi, MaPhong, DonGia (Tiền giờ), 
--ThoiGianBatDauSD, ThoiGianKetThucSD của tất cả các hóa đơn có trạng thái là "Đã thanh toán".
select HOADON.MaHD, HOADON.MaKH, KHACHHANG.TenKH, KHACHHANG.DiaChi, HOADON.MaPhong, MUCTIENGIO.DonGia,HOADON.ThoiGianBatDauSD, HOADON.ThoiGianKetThucSD
from HOADON
inner join KHACHHANG on HOADON.MaKH = KHACHHANG.MaKH 
inner join MUCTIENGIO on HOADON.MaTienGio = MUCTIENGIO.MaTienGio
where TrangThaiHD = 'Da thanh toan';

--Câu 10: Liệt kê MaKH, TenKH, DiaChi, MaHD, TrangThaiHD của tất cả các hóa đơn với 
--yêu cầu những khách hàng chưa từng có một hóa đơn nào thì cũng liệt kê thông tin những khách hàng đó ra.
select KHACHHANG.MAKH, KHACHHANG.TENKH,KHACHHANG.DIACHI,HOADON.MAHD,HOADON.TRANGTHAIHD
from KHACHHANG  
left join HOADON on HOADON.MAKH = KHACHHANG.MAKH;

--Câu 11: Liệt kê thông tin của các khách hàng đã từng sử dụng dịch vụ "Trái cây" hoặc từng 
--sử dụng phòng karaoke có mã phòng là "VIP07".
select KHACHHANG.MAKH, KHACHHANG.TENKH, KHACHHANG.DIACHI, KHACHHANG.SODT, DICHVU.TENDV, HOADON.MAPHONG
from KHACHHANG
inner join HOADON on HOADON.MAKH = KHACHHANG.MAKH 
inner join CHITIET_SUDUNGDV on HOADON.MAHD = CHITIET_SUDUNGDV.MAHD 
inner join DICHVU on CHITIET_SUDUNGDV.MADV = DICHVU.MADV 
where DICHVU.TENDV ='Trai cay' or HOADON.MAPHONG ='VIP07';

--Câu 12: Liệt kê thông tin của các khách hàng chưa từng sử dụng dịch vụ hát karaoke lần nào cả.
select * from KHACHHANG
where MaKH not in (select distinct MaKH from HOADON);

--Câu 13: Liệt kê thông tin của các khách hàng đã từng sử dụng dịch vụ hát karaoke và chưa 
--từng sử dụng dịch vụ nào khác kèm theo.
select * from KHACHHANG
where MaKH in (select distinct MaKH from HOADON) and MaKH not in (select distinct MaHD from CHITIET_SUDUNGDV);

--Câu 14: Liệt kê thông tin của những khách hàng đã từng hát karaoke vào năm "2014" nhưng 
--chưa từng hát karaoke vào năm "2015".
select * from KHACHHANG
where MaKH in (select distinct MaKH from HOADON where year(ThoiGianBatDauSD) = 2014) 
and MaKH not in (select distinct MaKH from HOADON where year(ThoiGianBatDauSD) = 2015);

--Câu 15: Hiển thị thông tin của những khách hàng có số lần hát karaoke nhiều nhất tính từ
--đầu năm 2014 đến hết năm 2014.
select KHACHHANG.MaKH, TenKH, DiaChi, count(HOADON.MaKH) as SoLanHatKaraoke
from HOADON 
inner join KHACHHANG on KHACHHANG.MaKH = HOADON.MaKH
where year(ThoiGianBatDauSD) = 2014
group by KHACHHANG.MaKH, TenKH, DiaChi
having count(HOADON.MaKH) = (
select top 1 count(HOADON.MaHD)
from HOADON 
inner join KHACHHANG on KHACHHANG.MaKH = HOADON.MaKH
where year(ThoiGianBatDauSD) = 2014
group by KHACHHANG.MaKH
order by count(HOADON.MaHD) desc);

--Câu 16: Đếm tổng số lượng loại dịch vụ đã được sử dụng trong năm 2014 với yêu cầu chỉ
--thực hiện tính đối với những loại dịch vụ có đơn giá từ 50.000 VNĐ trở lên.
select CHITIET_SUDUNGDV.MaDV, DICHVU.TenDV, DICHVU.TenDV, DICHVU.DonViTinh, count(CHITIET_SUDUNGDV.MaDV) as SoLuongLoaiDichVu 
from DICHVU
inner join CHITIET_SUDUNGDV on DICHVU.MaDV = CHITIET_SUDUNGDV.MaDV
inner join HOADON on CHITIET_SUDUNGDV.MaHD = HOADON.MaHD
where year(ThoiGianBatDauSD) = 2014 and DICHVU.DonGia > 50000
group by CHITIET_SUDUNGDV.MaDV, DICHVU.TenDV, DICHVU.TenDV, DICHVU.DonViTinh
order by count(CHITIET_SUDUNGDV.MaDV);

--Câu 17: Liệt kê MaKH, TenKH, MaSoThue của khách hàng có địa chỉ là "Hải Châu" và 
--chỉ mới hát karaoke một lần duy nhất, kết quả được sắp xếp giảm dần theo TenKH.
select KHACHHANG.MaKH, TenKH, MaSoThue
from KHACHHANG
inner join HOADON on KHACHHANG.MaKH = HOADON.MaKH
where DiaChi='Hai Chau'
group by KHACHHANG.MaKH, TenKH, MaSoThue
having count(MaHD) = 1
order by TenKH desc;
       
--Câu 18: Cập nhật cột TrangThaiHD trong bảng HOADON thành giá trị "Đã hết hạn" đối với 
--những khách hàng có địa chỉ là "Hải Châu" và có ThoiGianKetThucSD trước ngày 31/12/2015.
update HOADON
set TrangThaiHD = 'Da het han'
where MaKH in (select MaKH from KHACHHANG where DiaChi = 'Hai Chau') and ThoiGianKetThucSD < '31/12/2015'; 

--Câu 19: Cập nhật cột MoTa trong bảng PHONG thành giá trị "Được sử dụng nhiều" cho 
--những phòng được sử dụng từ 5 lần trở lên trong tháng 5 năm 2015 
update PHONG
set MoTa = 'Duoc su dung nhieu'
where MaPhong in(
        select HOADON.MaPhong from PHONG
		inner join HOADON on PHONG.MaPhong = HOADON.MaPhong 
        where month(ThoiGianBatDauSD) = 5 and year(ThoiGianBatDauSD) = 2015
		group by HOADON.MaPhong
        having count(HOADON.MaPhong) > 5
);

--Câu 20: Xóa những hóa đơn có ThoiGianBatDauSD trước ngày 20/11/2015
delete from HOADON
where ThoiGianBatDauSD < '20/11/2015';