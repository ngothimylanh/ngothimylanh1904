create database quanlyxe;
use quanlyxe;

--Câu 1: Tạo bảng.					
create table NHACUNGCAP(
	MaNhaCC char(10),
	TenNhaCC nvarchar(50),
	DiaChi nvarchar(20),
	SoDT varchar(20),
	MaSoThue varchar(10),
	constraint pk_NHACUNGCAP primary key(MaNhaCC)
);

create table LOAIDICHVU(
	MaLoaiDV char(10),
	TenLoaiDV nvarchar(50),
	constraint pk_LOAIDICHVU primary key(MaLoaiDV)
);

create table DONGXE(
	DongXe varchar(15),
	HangXe varchar(15),
	SoChoNgoi int,
	constraint pk_DONGXE primary key(DongXe)
);

create table MUCPHI(
	MaMP char(10),
	DonGia int,
	MoTa nvarchar(30),
	constraint pk_MUCPHI primary key(MaMP)
);

create table DANGKYCUNGCAP(
	MaDKCC char(10),
	MaNhaCC char(10),
	MaLoaiDV char(10),
	DongXe varchar(15),
	MaMP char(10),
	NgayBatDauCungCap date,
	NgayKetThucCungCap date,
	SoLuongXeDangKy int,
	constraint pk_DANGKYCUNGCAP primary key(MaDKCC),
	constraint fk_DANGKYCUNGCAP_NHACUNGCAP foreign key (MaNhaCC) references NHACUNGCAP(MaNhaCC),
	constraint fk_DANGKYCUNGCAP_LOAIDICHVU foreign key (MaLoaiDV) references LOAIDICHVU(MaLoaiDV),
	constraint fk_DANGKYCUNGCAP_DONGXE foreign key (DongXe) references DONGXE(DongXe),
	constraint fk_DANGKYCUNGCAP_MUCPHI foreign key (MaMP) references MUCPHI(MaMP)
);

--Câu 2: Chèn toàn bộ dữ liệu.				
insert into NHACUNGCAP (MaNhaCC,TenNhaCC,DiaChi,SoDT,MaSoThue) values
('NCC001',N'Cty TNHH Toàn Pháp',N'Hải Châu','05113999888','568941'),
('NCC002',N'Cty cổ phần Đông Du',N'Liên Chiểu','05113999889','456789'),
('NCC003',N'Ông Nguyễn Văn A',N'Hòa Thuận','05113999890','321456'),
('NCC004',N'Cty cổ phần Toàn Cầu Xanh',N'Hải Châu','05113658945','513364'),
('NCC005',N'Cty TNHH AMA',N'Thanh Khê','05113875466','546546'),
('NCC006',N'Bà Trần Thị Bích Vân',N'Liên Chiểu','05113587469','524545'),
('NCC007',N'Cty TNHH Phan Thành',N'Thanh Khê','05113987456','113021'),
('NCC008',N'Ông Phan Đình Nam',N'Hòa Thuận','05113532446','234562'),
('NCC009',N'Tập đoàn Đông Nam Á',N'Liên Chiểu','05113987121','534235'),
('NCC010',N'Cty Cổ phần Rạng Đông',N'Liên Chiểu','05113569654','432465');

insert into LOAIDICHVU (MaLoaiDV,TenLoaiDV) values 
('DV01',N'Dịch vụ xe taxi'),
('DV02',N'Dịch vụ xe buýt công cộng theo tuyến cố định'),
('DV03',N'Dịch vụ xe cho thuê theo hợp đồng');

insert into MUCPHI (MaMP,DonGia,MoTa) values
('MP01',10000, N'Áp dụng từ 1/2015'),
('MP02',15000, N'Áp dụng từ 2/2015'),
('MP03',20000, N'Áp dụng từ 1/2010'),
('MP04',25000, N'Áp dụng từ 2/2011');

insert into DONGXE (DongXe,HangXe,SoChoNgoi) values
('Hiace','Toyota', 16),
('Vios','Toyota', 5),
('Escape','Ford', 5),
('Cerato','KIA', 7),
('Forte','KIA', 5),
('Starex','Huyndai', 7),
('Grand-i10','Huyndai', 7);

insert into DANGKYCUNGCAP (MaDKCC,MaNhaCC,MaLoaiDV,DongXe,MaMP,NgayBatDauCungCap,NgayKetThucCungCap,SoLuongXeDangKy) values 
('DK001','NCC001','DV01','Hiace','MP01','2015-11-20','2016-11-20',4),
('DK002','NCC002','DV02','Vios','MP02','2015-11-20','2017-11-20',3),
('DK003','NCC003','DV03','Escape','MP03','2017-11-20','2018-11-20',5),
('DK004','NCC005','DV01','Cerato','MP04','2015-11-20','2019-11-20',7),
('DK005','NCC002','DV02','Forte','MP03','2019-11-20','2020-11-20',1),
('DK006','NCC004','DV03','Starex','MP04','2016-11-10','2021-11-20',2),
('DK007','NCC005','DV01','Cerato','MP03','2015-11-30','2016-01-25',8),
('DK008','NCC006','DV01','Vios','MP02','2016-02-28','2016-08-15',9),
('DK009','NCC005','DV03','Grand-i10','MP02','2016-04-27','2017-04-30',10),
('DK010','NCC006','DV01','Forte','MP02','2015-11-21','2016-02-22',4),
('DK011','NCC007','DV01','Forte','MP01','2016-12-25','2017-02-20',5),
('DK012','NCC007','DV03','Cerato','MP01','2016-04-14','2017-12-20',6),
('DK013','NCC003','DV02','Cerato','MP01','2015-12-21','2016-12-21',8),
('DK014','NCC008','DV02','Cerato','MP01','2016-05-20','2016-12-30',1),
('DK015','NCC003','DV01','Hiace','MP02','2018-04-24','2019-11-20',6),
('DK016','NCC001','DV03','Grand-i10','MP02','2016-06-22','2016-12-21',8),
('DK017','NCC002','DV03','Cerato','MP03','2016-09-30','2019-09-30',4),
('DK018','NCC008','DV03','Escape','MP04','2017-12-13','2018-09-30',2),
('DK019','NCC003','DV03','Escape','MP03','2016-01-24','2016-12-30',8),
('DK020','NCC002','DV03','Cerato','MP04','2016-05-03','2017-10-21',7),
('DK021','NCC006','DV01','Forte','MP02','2015-01-30','2016-12-30',9),
('DK022','NCC002','DV02','Cerato','MP04','2016-07-25','2017-12-30',6),
('DK023','NCC002','DV01','Forte','MP03','2017-11-30','2018-05-20',5),
('DK024','NCC003','DV03','Forte','MP04','2017-12-23','2019-11-30',8),
('DK025','NCC003','DV03','Hiace','MP02','2016-08-24','2017-10-25',1);

--Câu 3: Liệt kê những dòng xe có số chỗ ngồi trên 5 chỗ.
select * from DONGXE 
where SoChoNgoi > 5;

--Câu 4: Liệt kê thông tin của các nhà cung cấp đã từng đăng ký cung cấp những dòng xe thuộc hãng xe "Toyota" 
--với mức phí có đơn giá là 15.000 VNĐ/km hoặc những dòng xe thuộc hãng xe "KIA" với mức phí có đơn giá là 20.000 VNĐ/km.
select * from NHACUNGCAP 
inner join DANGKYCUNGCAP on NHACUNGCAP.MaNhaCC = DANGKYCUNGCAP.MaNhaCC
inner join DONGXE on DANGKYCUNGCAP.DongXe = DONGXE.DongXe
inner join MUCPHI on DANGKYCUNGCAP.MaMP = MUCPHI.MaMP
where (HangXe = 'Toyota' and DonGia = 15000) or (HangXe = 'KIA' and DonGia = 20000);

--Câu 5: Liệt kê thông tin của các dòng xe thuộc hãng xe có tên bắt đầu là ký tự "T" và có độ dài là 5 ký tự.
select * from DONGXE 
where HangXe like'T%' and len(HangXe) = 5;

--Câu 6: Liệt kê thông tin toàn bộ nhà cung cấp được sắp xếp tăng dần theo tên nhà cung cấp và giảm dần theo mã số thuế.
select * from NHACUNGCAP 
order by TenNhaCC asc, MaSoThue desc;

--Câu 7: Đếm số lần đăng ký cung cấp phương tiện tương ứng cho từng nhà cung cấp với yêu cầu chỉ đếm 
--cho những nhà cung cấp thực hiện đăng ký cung cấp có ngày bắt đầu cung cấp là "20/11/2015".
select MaNhaCC, COUNT(MaNhaCC) as SoLanDangKy
from DANGKYCUNGCAP
where NgayBatDauCungCap = '2015/11/20' 
group by MaNhaCC;

--Câu 8: Liệt kê tên của toàn bộ các hãng xe có trong cơ sở dữ liệu với yêu cầu mỗi hãng xe chỉ được liệt kê một lần.
select HangXe 
from DONGXE 
group by HangXe;

--Câu 9: Liệt kê MaDKCC, TenLoaiDV, TenNhaCC, DonGia, DongXe, HangXe, NgayBatDauCC, NgayKetThucCC, SoLuongXeDangKy của tất cả các lần đăng ký cung cấp phương tiện.
select DANGKYCUNGCAP.MaDKCC, LOAIDICHVU.TenLoaiDV, NHACUNGCAP.TenNhaCC, MUCPHI.DonGia, DONGXE.DongXe, DONGXE.HangXe, 
DANGKYCUNGCAP.NgayBatDauCungCap, DANGKYCUNGCAP.NgayKetThucCungCap, DANGKYCUNGCAP.SoLuongXeDangKy
from DANGKYCUNGCAP
inner join LOAIDICHVU on DANGKYCUNGCAP.MaLoaiDV = LOAIDICHVU.MaLoaiDV
inner join NHACUNGCAP on DANGKYCUNGCAP.MaNhaCC = NHACUNGCAP.MaNhaCC
inner join MUCPHI on DANGKYCUNGCAP.MaMP = MUCPHI.MaMP
inner join DONGXE on DANGKYCUNGCAP.DongXe = DONGXE.DongXe;

--Câu 10: Liệt kê MaDKCC, MaNhaCC, TenNhaCC, DiaChi, MaSoThue, TenLoaiDV, DonGia, HangXe, NgayBatDauCC, NgayKetThucCC 
--của tất cả các lần đăng ký cung cấp phương tiện với yêu cầu những nhà cung cấp nào chưa từng thực hiện đăng ký cung cấp 
--phương tiện thì cũng liệt kê thông tin những nhà cung cấp đó ra.
select DANGKYCUNGCAP.MaDKCC, NHACUNGCAP.MaNhaCC, NHACUNGCAP.TenNhaCC, NHACUNGCAP.DiaChi, NHACUNGCAP.MaSoThue, LOAIDICHVU.TenLoaiDV
from NHACUNGCAP 
left join DANGKYCUNGCAP on DANGKYCUNGCAP.MaNhaCC = NHACUNGCAP.MaNhaCC
left join LOAIDICHVU on DANGKYCUNGCAP.MaLoaiDV = LOAIDICHVU.MaLoaiDV;

--Câu 11: Liệt kê thông tin của các nhà cung cấp đã từng đăng ký cung cấp phương tiện thuộc dòng xe "Hiace" 
--hoặc từng đăng ký cung cấp phương tiện thuộc dòng xe "Cerato".
select * from NHACUNGCAP 
inner join  DANGKYCUNGCAP on NHACUNGCAP.MaNhaCC = DANGKYCUNGCAP.MaNhaCC
inner join DONGXE on DANGKYCUNGCAP.DongXe = DONGXE.DongXe
where MaDKCC in (select distinct MaDKCC from DANGKYCUNGCAP where DongXe = 'Hiace')
or MaDKCC in (select distinct MaDKCC from DANGKYCUNGCAP where DongXe = 'Cerato');

--Câu 12: Liệt kê thông tin của các nhà cung cấp chưa từng thực hiện đăng ký cung cấp phương tiện lần nào cả.
select * from NHACUNGCAP 
where MaNhaCC not in (select distinct MaNhaCC from DANGKYCUNGCAP);

--Câu 13: Liệt kê thông tin của các nhà cung cấp đã từng đăng ký cung cấp phương tiện thuộc dòng xe "Hiace" 
--và chưa từng đăng ký cung cấp phương tiện thuộc dòng xe "Cerato".
select * from NHACUNGCAP
inner join DANGKYCUNGCAP on NHACUNGCAP.MaNhaCC = DANGKYCUNGCAP.MaNhaCC
inner join DONGXE on DANGKYCUNGCAP.DongXe = DONGXE.DongXe
where MaDKCC in (select distinct MaDKCC from DANGKYCUNGCAP where DongXe = 'Hiace')
and MaDKCC not in (select distinct MaDKCC from DANGKYCUNGCAP where DongXe = 'Cerato');

--Câu 14: Liệt kê thông tin của những dòng xe chưa được nhà cung cấp nào đăng ký cho thuê vào năm "2015" nhưng đã từng được đăng ký cho thuê vào năm "2016".
select * from DONGXE
where DongXe not in (select distinct DongXe from DANGKYCUNGCAP where year(NgayBatDauCungCap) = 2015) 
and DongXe in (select distinct DongXe from DANGKYCUNGCAP where year(NgayBatDauCungCap) = 2016);

--Câu 15: Hiển thị thông tin của những dòng xe có số lần được đăng ký cho thuê nhiều nhất tính từ đầu năm 2016 đến hết năm 2019.
select top 1 DANGKYCUNGCAP.DongXe, HangXe, SoChoNgoi, count(DANGKYCUNGCAP.DongXe) as SoLanDangKy
from DONGXE 
inner join DANGKYCUNGCAP on DONGXE.DongXe = DANGKYCUNGCAP.DongXe
where year(NgayBatDauCungCap) between 2016 and 2019 
group by DANGKYCUNGCAP.DongXe, HangXe, SoChoNgoi 
order by SoLanDangKy desc;

--Câu 16: Tính tổng số lượng xe đã được đăng ký cho thuê tương ứng với từng dòng xe 
--với yêu cầu chỉ thực hiện tính đối với những lần đăng ký cho thuê có mức phí với đơn giá là 20.000 VNĐ trên 1 km.
select DANGKYCUNGCAP.DongXe, MUCPHI.DonGia, sum(DANGKYCUNGCAP.SoLuongXeDangKy) as SoLuongXe
from DANGKYCUNGCAP 
inner join MUCPHI on DANGKYCUNGCAP.MaMP = MUCPHI.MaMP
where DonGia = 20000 
group by DANGKYCUNGCAP.DongXe, MUCPHI.DonGia;

--Câu 17: Liệt kê MaNCC, SoLuongXeDangKy với yêu cầu chỉ liệt kê những nhà cung cấp có địa chỉ là "Hai Chau" 
--và chỉ mới thực hiện đăng ký cho thuê một lần duy nhất, kết quả được sắp xếp tăng dần theo số lượng xe đăng ký.
select DANGKYCUNGCAP.MaNhaCC, SoLuongXeDangKy
from DANGKYCUNGCAP
where MaNhaCC in (
		select DANGKYCUNGCAP.MaNhaCC
		from DANGKYCUNGCAP  
		inner join NHACUNGCAP on DANGKYCUNGCAP .MaNhaCC = NHACUNGCAP.MaNhaCC
		where DiaChi = N'Hải Châu'
		group by DANGKYCUNGCAP.MaNhaCC
		having count(MaDKCC) = 1)
		order by SoLuongXeDangKy asc;

--Câu 18: Cập nhật cột SoLuongXeDangKy trong bảng DANGKYCUNGCAP thành giá trị 20 đối với những dòng xe thuộc hãng "Toyota" 
--và có NgayKetThucCungCap trước ngày 30/12/2016.
update DANGKYCUNGCAP
set SoLuongXeDangKy = 20
where DongXe in (select DongXe from DONGXE where HangXe = 'Toyota') and NgayKetThucCungCap < '2016-12-30';

--Câu 19: Cập nhật cột MoTa trong bảng MUCPHI thành giá trị "Được sử dụng nhiều" 
--cho những mức phí được sử dụng để đăng ký cung cấp cho thuê phương tiện từ 5 lần trở lên trong năm 2016.
update MUCPHI
set MoTa = N'Được sử dụng nhiều'
where MaMP in(
        select MaMP from DANGKYCUNGCAP
        where year(NgayBatDauCungCap) = 2016 
		group by MaMP
        having count(MaDKCC) > 5
);

--Câu 20: Xóa những lần đăng ký cung cấp cho thuê phương tiện có ngày bắt đầu cung cấp sau ngày 10/11/2015 và đăng ký cho thuê dòng xe "Vios".
delete from DANGKYCUNGCAP
where NgayBatDauCungCap > '2015-11-10' and DongXe = 'Vios';