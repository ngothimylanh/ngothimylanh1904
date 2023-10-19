create database banhang;
use banhang;

--Câu 1.1: Tạo bảng.
create table KHACHHANG(
     MaKH nvarchar(50),
	 TenKH varchar(50),
	 Email varchar(50),
	 SoDT int,
	 DiaChi nvarchar(50),
	 constraint pk_KHACHHANG primary key(MaKH)
);

create table DMSANPHAM(
     MaDM varchar(50),
	 TenDanhMuc nvarchar(50),
	 MoTa varchar(200),
	 constraint pk_DMSANPHAM primary key(MaDM)
);

create table SANPHAM(
     MaSP nvarchar(50),
	 MaDM varchar(50),
	 TenSP varchar(50),
	 GiaTien int,
	 SoLuong int,
	 XuatXu varchar(100),
     constraint pk_SANPHAM primary key(MaSP),
     constraint fk_SANPHAM_DMSANPHAM foreign key (MaDM) references DMSANPHAM(MaDM)
);

create table THANHTOAN(
      MaTT varchar(50),
	  PhuongThucTT varchar(100),
	  constraint pk_THANHTOAN primary key(MaTT)
);

create table DONHANG(
     MaDH varchar(50),
	 MaKH nvarchar(50),
	 MaTT varchar(50),
	 NgayDat date,
	 constraint pk_DONHANG primary key(MaDH),
	 constraint fk_DONHANG_KHACHHANG foreign key (MaKH) references KHACHHANG(MaKH),
	 constraint fk_DONHANG_THANHTOAN foreign key (MaTT) references THANHTOAN(MaTT)
);

create table CHITIETDONHANG(
     MaDH varchar(50),
     MaSP nvarchar(50),
	 SoLuong int,
	 TongTien int,
     constraint pk_CHITIETDONHANG primary key(MaDH,MaSP),
     constraint fk_CHITIETDONHANG_DONHANG foreign key (MaDH) references DONHANG(MaDH),
	 constraint fk_CHITIETDONHANG_SANPHAM foreign key (MaSP) references SANPHAM(MaSP)
);

--Câu 1.2: Chèn dữ liệu thông tin.
insert into KHACHHANG (MaKH,TenKH,Email,SoDT,DiaChi) values
('KH001','Tran Van An','antv@gmail.com',0905123564,'Lang Son'),
('KH002','Phan Phuoc','phuocp@gmail.com',0932568984,'Da Nang'),
('KH003','Tran Huu Anh','anhth@gmail.com',0901865232,'Ha Noi');

insert into DMSANPHAM (MaDM,TenDanhMuc,MoTa) values
('DM01','Thoi Trang Nu','vay, ao danh cho nu'),
('DM02','Thoi Trang Nam','quan danh cho nam'),
('DM03','Trang suc','danh cho nu va nam');

insert into SANPHAM (MaSP,MaDM,TenSP,SoLuong,GiaTien,XuatXu) values
('SP001','DM01','Dam Maxi',200,195000,'VN'),
('SP002','DM01','Tui Da Mỹ',50,3000000,'HK'),
('SP003','DM02','Lac tay Uc',300,300000,'HQ');

insert into THANHTOAN (MaTT,PhuongThucTT) values
('TT01','Visa'),
('TT02','Master Card'),
('TT03','JCB');

insert into DONHANG (MaDH,MaKH,MaTT,NgayDat) values
('DH001','KH002','TT01','2014/10/20'),
('DH002','KH002','TT01','2015/5/15'),
('DH003','KH001','TT03','2015/4/20');

insert into CHITIETDONHANG(MaDH,MaSP,SoLuong,TongTien) values
('DH001','SP002',3,56000),
('DH003','SP001',10,27444),
('DH002','SP002',10,67144);

--Câu 1.3: Liệt kê thông tin toàn bộ sản phẩm.
select * from SANPHAM;

---Câu 1.4: Liệt kê thông tin những sản phẩm có SoLuong lớn hơn 50 thuộc danh mục là 'Thoi trang nu' 
--và những sản phẩm có SoLuong lớn hơn 100 thuộc danh mục là 'Thoi trang nam'.
select * from SANPHAM
where (MaDM = 'DM01' and SoLuong > 50)  or (MaDM = 'DM02' and SoLuong > 100);

--Câu 1.5: Liệt kê những khách hàng có tên bắt đầu là ký tự 'A' và có độ dài là 5 ký tự.
select * from KHACHHANG 
where TenKH like 'A%';

--Câu 1.6: Liệt kê toàn bộ sản phẩm, sắp xếp giảm dần theo TenSP và tăng dần theo SoLuong.
select * from SANPHAM 
order by TenSP desc, SoLuong asc;

--Câu 1.7: Đếm các sản phẩm tương ứng theo từng khách hàng đã đặt hàng, 
--chỉ đếm những sản phẩm được khách hang đặt hàng trên 5 sản phẩm.
select MaSP, count (MaSP) as KhachHangDaDatHang
from SANPHAM
where MaSP > 5
group by MaSP;

--Câu 1.8: Liệt kê tên của toàn bộ khách hàng (tên nào giống nhau thì chỉ liệt kê một lần).
select TenKH 
from KHACHHANG 
group by TenKH;

--Câu 1.9: Liệt kê MaKH, TenKH, TenSP, SoLuong, NgayDat, GiaTien,TongTien 
--(của tất cả các lần đặt hàng của khách hàng).
select KHACHHANG.MaKH, KHACHHANG.TenKH, DONHANG.MaDH, SANPHAM.TenSP, CHITIETDONHANG.SoLuong, CHITIETDONHANG.TongTien
from KHACHHANG
inner join DONHANG on DONHANG.MaKH = KHACHHANG.MaKH
inner join CHITIETDONHANG on CHITIETDONHANG.MaDH = DONHANG.MaDH
inner join SANPHAM on SANPHAM.MaSP = CHITIETDONHANG.MaSP;

--Câu 1.10: Liệt kê MaKH, TenKH, MaDH, TenSP, SoLuong, TongTien 
--của tất cả các lần đặt hàng của khách hàng.
select KHACHHANG.MaKH, KHACHHANG.TenKH, DONHANG.MaDH, SANPHAM.TenSP, CHITIETDONHANG.SoLuong, CHITIETDONHANG.TongTien
from KHACHHANG
left join DONHANG on DONHANG.MaKH = KHACHHANG.MaKH
left join CHITIETDONHANG on CHITIETDONHANG.MaDH = DONHANG.MaDH
left join SANPHAM on SANPHAM.MaSP = CHITIETDONHANG.MaSP;

--Câu 1.11: Liệt kê MaKH, TenKH của những khách hàng đã từng đặt hàng 
--với thực hiện thanh toán qua 'Visa' hoặc đã thực hiện thanh toán qua 'JCB'.
select DONHANG.MaKH, KHACHHANG.TenKH 
from KHACHHANG
inner join DONHANG on DONHANG.MaKH = KHACHHANG.MaKH
inner join THANHTOAN on THANHTOAN.MaTT = DONHANG.MaTT  
where PhuongThucTT = 'Visa' or PhuongThucTT = 'JCB';

--Câu 1.12: Liệt kê MaKH, TenKH của những khách hàng chưa từng mua bất kỳ sản phẩm nào.
select MaKH, TenKH
from KHACHHANG 
where MaKH not in (select distinct MaKH from DONHANG);

--Câu 1.13: Liệt kê MaKH, TenKH của những khách hàng từng đặt hàng đã 
--thanh toán qua 'VISA' và chưa từng đặt hàng với việc thanh toán qua 'JCB'.
select DONHANG.MaKH, KHACHHANG.TenKH 
from KHACHHANG
inner join DONHANG on DONHANG.MAKH = KHACHHANG.MAKH 
inner join THANHTOAN on THANHTOAN.MaTT = DONHANG.MaTT  
where PhuongThucTT = 'Visa' and PhuongThucTT not in (select PhuongThucTT='JBC' from DONHANG);

--Câu 1.14: Liệt kê MaKH, TenKH, TenSP, SoLuong, GiaTien, PhuongThucTT, NgayDat, TongTien của những Khách hàng có địa chỉ là 'Da Nang' và 
--mới thực hiện đặt hàng một lần duy nhất. Kết quả liệt kê được sắp xếp tăng dần của trường TenKH.
select KHACHHANG.MaKH, KHACHHANG.TenKH, SANPHAM.TenSP, SANPHAM.SoLuong, SANPHAM.GiaTien, THANHTOAN.PhuongThucTT, DONHANG.NgayDat, CHITIETDONHANG.TongTien
from KHACHHANG
inner join DONHANG on DONHANG.MaKH = KHACHHANG.MaKH
inner join CHITIETDONHANG on CHITIETDONHANG.MaDH = DONHANG.MaDH
inner join SANPHAM on SANPHAM.MaSP = CHITIETDONHANG.MaSP
inner join THANHTOAN on DONHANG.MaTT = THANHTOAN.MaTT
where DiaChi = 'Da Nang'
group by KHACHHANG.MaKH, KHACHHANG.TenKH, SANPHAM.TenSP, SANPHAM.SoLuong, SANPHAM.GiaTien, THANHTOAN.PhuongThucTT, DONHANG.NgayDat, CHITIETDONHANG.TongTien
having count(KHACHHANG.MaKH) = 1
order by TenKH asc;

--Câu 1.15: Xóa toàn bộ khách hàng có DiaChi'LangSon'.
delete from KHACHHANG 
where DiaChi = 'Lang Son';

--Câu 1.16: Cập nhật giá trị của trường XuatXu trong bảng SanPham thành 'Viet Nam'.
--đối với trường XuatXu có giá trị là 'VN'.
update SANPHAM 
set XuatXu = 'Viet Nam' 
where XuatXu = 'VN';