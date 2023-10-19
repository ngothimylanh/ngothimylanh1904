create database quanlyhanghoa;
use quanlyhanghoa;

--Câu 1: Tạo bảng.
create table KHACHHANG(
	MaKH nvarchar(50),	
	TenKH nvarchar(50),
	DiaChi nvarchar(50),
	SoDT varchar(15),
	constraint pk_KHACHHANG primary key(MaKH)
);

create table NHANVIEN(
	MaNV nvarchar(50),
	TenNV nvarchar(50),
	SoDT varchar(20),
	constraint pk_NHANVIEN primary key(MaNV)
);

create table SANPHAM(
	MaSP nvarchar(50),
	TenSP nvarchar(50),
	DonViTinh varchar(20),
	XuatXu nvarchar(50),
	GiaTien	int,
	constraint pk_SANPHAM primary key(MaSP)	
);

create table HOADON(
	SoHoaDon int,
	MaKH nvarchar(50),
	MaNV nvarchar(50),
	DonGia int,
	constraint pk_HOADON primary key(SoHoaDon),
	constraint fk_HOADON_NHANVIEN foreign key(MaNV) references NHANVIEN(MaNV),
	constraint fk_HOADON_KHACHHANG foreign key(MaKH) references KHACHHANG(MaKH)
);

create table CHITIETHOADON(
	SoHoaDon int,
	MaSP nvarchar(50),
	SoLuong int,
	constraint pk_CHITIETHOADON primary key(SoHoaDon,MaSP),
	constraint fk_CHITIETHOADON_HOADON foreign key(SoHoaDon) references HOADON(SoHoaDon),
	constraint fk_CHITIETHOADONN_SANPHAM foreign key(MaSP) references SANPHAM(MaSP)
);

--Câu 2: Chèn thông tin
insert into KHACHHANG(MaKH, TenKH, DiaChi,SoDT) values
('KH01','Nguyen Van A','731 Tran Hung Dao','0773004569'),
('KH02','Tran Ngoc Han','23/5 Nguyen Trai','0908256478'),
('KH03','Tran Ngoc Linh','45 Nguyen Canh Chan','0763860001'),
('KH04','Tran Minh Long','50/34 Le Dai Hanh','0917325476'),
('KH05','Le Nhat Minh','34 Truong Dinh','0768246108'),
('KH06','Le Hoai Thuong','227 Nguyen Van Cu','0905831738'),
('KH07','Nguyen Van Tam','32/3 Tran Binh Trong','0905916785'),
('KH08','Phan Thi Thanh','45/2 An Duong Vuong','0765219413'),
('KH09','Le Ha Vinh','873 Le Hong Phong','0760010387');

insert into NHANVIEN(MaNV, TenNV, SoDT)values
('NV01','Nguyen Nhu Nhut','0905273678'),
('NV02','Le Thi Phi Yen','0773549621'),
('NV03','Nguyen Van B','0762159874'),
('NV04','Ngo Thanh Tuan','0905123459'),
('NV05','Nguyen Thi Truc Thanh','0768523697');

insert into SANPHAM(MaSP, TenSP, DonViTinh, XuatXu, GiaTien) values
('BC01','but chi','cay','Singapore',3000),
('TV02','tap 96 trang','chuc','VietNam',23000),
('ST03','so tay','quyen','ThaiLan',55000),
('ST04','phan viet bang','hop','HanQuoc',5000),
('ST05','but long','cay','My',9000);

insert into HOADON(SoHoaDon, MaKH, MaNV, DonGia) values
('1001','KH01','NV01',320000),
('1002','KH01','NV02',840000),
('1003','KH02','NV01',100000),
('1004','KH02','NV01',180000),
('1005','KH01','NV02',3800000),
('1006',NULL,NULL,2430000),
('1007','KH03','NV03',510000),
('1008','KH01','NV03',440000),
('1009','KH03','NV04',200000),
('1010',NULL,NULL,5200000);

insert into CHITIETHOADON(SoHoaDon, MaSP, SoLuong) values
(1001,'TV02',10),
(1002,'BC01',20),
(1003,'TV02',12),
(1004,'TV02',16),
(1005,'ST05',50),
(1006,'ST03',23),
(1007,'BC01',14),
(1008,'ST04',8),
(1009,'BC01',18),
(1010,'ST03',59);

--Câu 3: Liệt kê danh sách các sản phẩm (MaSP,TenSP) có đơn vị tính là “cay”, ”quyen”.
select MaSP,TenSP
from SANPHAM
where (DonViTinh = 'cay') or (DonViTinh = 'quyen');

--Câu 4: Liệt kê danh sách các sản phẩm (MaSP,TenSP) có mã sản phẩm 
--bắt đầu là “B” và kết thúc là “01”.
select MaSP,TenSP
from SANPHAM
where MaSP like'B%01';

--Câu 5: Liệt kê danh sách các sản phẩm (MaSP,TenSP) do “Trung Quoc” sản xuất có giá từ bé hơn 30.000 đến 40.000.
select MaSP,TenSP, XuatXu
from SANPHAM
where (GiaTien < 30000)  or (GiaTien < 40000);

--Câu 6: Liệt kê các số hóa đơn, đơn giá và sắp xếp theo đơn giá của hóa đơn giảm dần.
select SoHoaDon, DonGia
from HOADON
order by DonGia desc;

--Câu 7: Liệt kê danh sách các khách hàng (MaKH,TenKH) đã mua hàng.
select distinct KHACHHANG.MaKH,TenKH
from KHACHHANG
inner join HOADON on KHACHHANG.MaKH = HOADON.MaKH;

--Câu 8: Liệt kê số hóa đơn, trị giá các hóa đơn do nhân viên có tên “Nguyen Van B” lập.
select SoHoaDon, DonGia
from HOADON
inner join NHANVIEN on HOADON.MaNV = NHANVIEN.MaNV
where TenNV = 'Nguyen Van B';

--Câu 9: Tìm các số hóa đơn đã mua sản phẩm có mã số “BC01” hoặc “TV02”.
select * from CHITIETHOADON
where (MaSP = 'BC01') or (MaSP = 'TV02');

--Câu 10: Tìm các số hóa đơn đã mua sản phẩm có mã số “BC01” hoặc “TV02”
--mỗi sản phẩm mua với số lượng bé hơn 10 đến 20.
select * from CHITIETHOADON
where ((MaSP = 'BC01' and SoLuong < 10)  or (MaSP = 'TV02' and SoLuong < 20));

--Câu 11: Có bao nhiêu hóa đơn không phải của khách hàng đăng ký thành viên mua.
select count(*)
from HOADON
where MaKH not in( 
    select MaKH
	from KHACHHANG 
    where KHACHHANG.MaKH = HOADON.MaKH
);

--Câu 12: Có bao nhiêu sản phẩm khác nhau được bán ra.
select count (distinct MaSP)
from CHITIETHOADON 
inner join HOADON on CHITIETHOADON.SoHoaDon = HOADON.SoHoaDon;

--Câu 13: Cho biết đơn giá hóa đơn cao nhất, thấp nhất là bao nhiêu.
select max(DonGia) as max, min(DonGia) as min from HOADON;

--Câu 14: Tính đơn giá trung bình của tất cả các hóa đơn được bán ra là bao nhiêu.
select avg(DonGia) TRUNGBINH from HOADON;

--Câu 15: Tìm số hóa đơn có trị giá cao nhất.
select * from HOADON
where DonGia = (select max(DonGia) from HOADON);

--Câu 16: Liệt kê danh sách các sản phẩm (MaSP, TenSP) có giá bán bằng một trong ba mức giá cao nhất.
select MaSP, TenSP
from SANPHAM
where GiaTien in(
     select distinct top 3 GiaTien
	 from SANPHAM
	 order by GiaTien desc
);

--Câu 17: Tính tổng số sản phẩm của từng nước sản xuất.
select XuatXu, count (distinct MaSP) as TongSoSanPham
from SANPHAM
group by XuatXu;

--Câu 18: Với từng nước sản xuất, tìm giá bán cao nhất, thấp nhất, trung bình của các sản phẩm.
select XuatXu, max (GiaTien) as max, min (GiaTien) as min, avg (GiaTien) as avg
from SANPHAM
group by XuatXu;

--Câu 19: Tính tổng số lượng của từng sản phẩm bán ra.
select MaSP, count(distinct MaSP) as TongSoLuong
from SANPHAM
where MaSP in(
    select MASP
    from CHITIETHOADON 
    inner join HOADON on CHITIETHOADON.SoHoaDon = HOADON.SoHoaDon)
    group by MaSP;

--Câu 20: Tìm hóa đơn có mua ít nhất bốn sản phẩm khác nhau.
select * from HOADON
where SoHoaDon in(
    select SoHoaDon
    from CHITIETHOADON
    where SoLuong >= 4
);

--Câu 21: Tìm khách hàng (MaKH, TenKH) có số lần mua hàng nhiều nhất. 
select MaKH, TenKH
from KHACHHANG
where MaKH = (
     select top 1 MaKH
     from HOADON
     group by MaKH
     order by count(distinct SoHoaDon) desc
);

--Câu 22: Tìm sản phẩm (MaSP, TenSP) có tổng số lượng bán ra thấp nhất.
select MaSP, TenSP
from SANPHAM
where MaSP = (
     select top 1 MASP
     from CHITIETHOADON
     group by MaSP
     order by sum(SoLuong) desc
);