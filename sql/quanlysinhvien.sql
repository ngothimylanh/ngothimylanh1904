create database quanlysinhvien;
use quanlysinhvien;

--Câu 1: Tạo bảng.
create table KHOA(
     MaKhoa char(20),
     TenKhoa nvarchar(30),
	 constraint pk_KHOA primary key(MaKhoa)
);

create table SINHVIEN(
     MaSV char(20),
	 MaKhoa char(20),
     TenSV nvarchar(50),
     HocBong int,
	 constraint pk_SINHVIEN primary key(MaSV),
	 constraint fk_SINHVIEN_KHOA foreign key (MaKhoa) references KHOA(MaKhoa)
);

create table MONHOC(
    MaMH char(20),
    TenMH nvarchar(50),
    SoTietHoc int,
    constraint pk_MONHOC primary key(MaMH),
);

create table KETQUA(
    MaSV char(20),
    MaMH char(20),
    SoLanThi int,
    Diem int,
    constraint pk_KETQUA primary key (MaSV,MaMH,SoLanThi),
	constraint fk_KETQUA_SINHVIEN foreign key (MaSV) references SINHVIEN(MaSV),
	constraint fk_KETQUA_MONHOC foreign key (MaMH) references MONHOC(MaMH)
);

--Câu 2: Chèn thông tin dữ liệu.
insert into MONHOC(MaMH,TenMH, SoTietHoc) values
('01',N'Cơ Sở Dữ Liệu',45),
('02',N'Trí Tuệ Nhân Tạo',45),
('03',N'Truyền Tin',45),
('04',N'Đồ Họa',60),
('05',N'Văn Phạm',60);

insert into KHOA(MaKhoa,TenKhoa) values
('AV',N'Anh Văn'),
('TH',N'Tin Học'),
('TR',N'Triết'),
('VL',N'Vật Lý');

insert into SINHVIEN(MaSV,MaKhoa,TenSV,HocBong) values
('A01','TH',N'Nguyễn Thị Hải',130000),
('A02','VL',N'Trần Văn Chính',150000),
('A03','TH',N'Lê Thu Bạch Yến',170000),
('A04','AV',N'Trần Anh Tuấn',80000),
('A05','TR',N'Trần Thanh Mai',700000);

insert into KETQUA(MaSV,MaMH,SoLanThi,Diem) values
('A01','01',1,3),
('A01','02',2,6),
('A02','01',2,7),
('A03','04',2,5),
('A04','05',2,10),
('A05','03',1,7);

--Câu 2: Cập nhật.
update MONHOC
set SoTietHoc = 45
where MaMH ='05';

--Câu 3: Xóa.
delete from KETQUA
where SoLanThi = 2 and Diem < 5;

--Câu 4: Liệt kê thông tin các sinh viên và sắp xếp theo thứ tự tên sinh viên tăng dần và học bổng giảm dần.
select * from SINHVIEN 
order by TenSV asc, HocBong desc;

--Câu 5: Liệt kê danh sách những khoa có ký tự thứ hai của tên khoa có chứa chữ N.
select * from KHOA
where TenKhoa like '_N%';

--Câu 6: Liệt kê danh sách những sinh viên có ký tự đầu tiên của tên nằm trong khoảng từ a đến m. 
select * from SINHVIEN
where TenSV between 'a' and 'm';

--Câu 7: Liệt kê danh sách các sinh viên có học bổng lớn hơn 100000 và sắp xếp theo thứ tự mã khoa giảm dần.
select * from SINHVIEN
where HocBong > 100000
order by MaKhoa desc;

--Câu 8: Liệt kê danh sách các sinh viên của khoa anh văn và khoa vật lý.
select * from SINHVIEN
where MaKhoa = 'AV' or MaKhoa = 'VL';

--Câu 9: Liệt kê danh sách những sinh viên có học bổng từ 80.000 đến 150.000.
select * from SINHVIEN 
where HocBong >= 80000 and HocBong <= 150000;

--Câu 10: Tính tổng số sinh viên của toàn trường.
select sum = count(MaSV)
from SINHVIEN;

--Câu 11: Liệt kê số lượng môn học mà sinh viên đã học.
select count(distinct MaMH)
from KETQUA;

--Câu 12: Tính tổng số học bổng của mỗi khoa.
select SINHVIEN.MaKhoa ,sum(HocBong) SoHocBong
from SINHVIEN
group by SINHVIEN.MaKhoa;

--Câu 13: Tính học bổng cao nhất của mỗi khoa.
select SINHVIEN.MaKhoa ,max(HocBong)  HocBongCaoNhat
from SINHVIEN
group by SINHVIEN.MaKhoa;

--Câu 13: Liệt kê sinh viên có học bổng cao nhất.
select * from SINHVIEN
where HocBong = (select max(HocBong) from SINHVIEN);

--Câu 14: Liệt kê sinh viên chưa thi môn cơ sở dữ liệu.
select * from SINHVIEN 
where not exists(
   select distinct * from KETQUA
   where MaMH = '01' and MaSV = SINHVIEN.MaSV
);

--Câu 15: Liệt kê ba sinh viên có học nhiều môn nhất.
select top 3 MaSV, count(distinct MaMH) SoMonHoc
from KETQUA 
group by MaSV
having count(distinct MaMH) >= all (select count( distinct MaMH)
from KETQUA 
group by MaSV
);