create database thuctap;
use thuctap;

--Câu 1: Tạo bảng.
create table KHOA(
    MaKhoa char(15),
    TenKhoa char(30),
    SoDT int,
    constraint pk_KHOA primary key(MaKhoa)
);

create table GIANGVIEN(
   MaGV char(15),
   MaKhoa char(15),
   TenGV char(30),
   Luong int,
   constraint pk_GIANGVIEN primary key(MaGV),
   constraint fk_GIANGVIEN_KHOA foreign key(MaKhoa) references KHOA(MaKhoa)
);

create table SINHVIEN(
   MaSV char(15),
   TenSV char(40),
   MaKhoa char(15),
   NgaySinh int,
   QueQuan char(30),
   constraint pk_SINHVIEN primary key(MaSV),
   constraint fk_SINHVIEN_KHOA foreign key(MaKhoa) references KHOA(MaKhoa)
);

create table DETAI(
    MaDeTai char(15),
    TenDeTai char(30),
    KinhPhi int,
    NoiThucTap char(30),
	constraint pk_DETAI primary key(MaDeTai)
);

create table HUONGDAN(
     MaSV char(15),
     MaDeTai char(15),
     MaGV char(15),
     KetQua int,
	 constraint pk_HUONGDAN primary key(MaSV),
     constraint fk_HUONGDAN_DETAI foreign key(MaDeTai) references DETAI(MaDeTai),
	 constraint fk_HUONGDAN_GIANGVIEN foreign key(MaGV) references GIANGVIEN(MaGV)
);

--Câu 2: Chèn dữ liệu thông tin
insert into KHOA(MaKhoa, TenKhoa, SoDT) values
('Geo','Dia ly va QLTN',3855413),
('Math','Toan',3855411),
('Bio','Cong nghe Sinh hoc',3855412);

insert into GIANGVIEN(MaGV, MaKhoa, TenGV, Luong) values
('MGV11','Geo','Thanh Binh',700),    
('MGV12','Math','Thu Huong',500),
('MGV13','Bio','Chu Vinh',650),
('MGV14','Math','Le Thi Ly',500),
('MGV15','Bio','Tran Son',900);

insert into SINHVIEN(MaSV, TenSV, MaKhoa, NgaySinh, QueQuan) values
('MSV01','Le Van Son','Bio',1990,'Nghe An'),
('MSV02','Nguyen Thi Mai','Geo',1990,'Thanh Hoa'),
('MSV03','Bui Xuan Duc','Math',1992,'Ha Noi'),
('MSV04','Nguyen Van Tung','Bio',null,'Ha Tinh'),
('MSV05','Le Khanh Linh','Bio',1989,'Ha Nam'),
('MSV06','Tran Khac Trong','Geo',1991,'Thanh Hoa'),
('MSV07','Le Thi Van','Math',null,null),
('MSV08','Hoang Van Duc','Bio',1992,'Nghe An');

insert into DETAI(MaDeTai, TenDeTai, KinhPhi, NoiThucTap) values
('DT01','GIS',100,'Nghe An'),
('DT02','ARC GIS',500,'Nam Dinh'),
('DT03','Spatial DB',100, 'Ha Tinh'),
('DT04','MAP',300,'Quang Binh');

insert into HUONGDAN(MaSV, MaDeTai, MaGV, KetQua)values
('MSV01','DT01','MGV13',8),
('MSV02','DT03','MGV14',0),
('MSV03','DT03','MGV12',10),
('MSV05','DT04','MGV14',7),
('MSV06','DT01','MGV13',null),
('MSV07','DT04','MGV11',10),
('MSV08','DT02','MGV15',6);

--Câu 3: Liệt kê thông tin gồm mã số, họ tên và tên khoa của tất cả các giảng viên.
select GIANGVIEN.MaGV, GIANGVIEN.MaKhoa, KHOA.TenKhoa
from GIANGVIEN 
inner join KHOA on GIANGVIEN.MaKhoa = KHOA.MaKhoa;

--Câu 4: Liệt kê thông tin gồm mã số, họ tên và tên khoa của các giảng viên của khoa ‘DIA LY va QLTN’.
select GIANGVIEN.MaGV, GIANGVIEN.MaKhoa, KHOA.TenKhoa
from GIANGVIEN  
inner join KHOA on GIANGVIEN.MaKhoa = KHOA.MaKhoa
where KHOA.TenKhoa = 'Dia ly va QLTN';

--Câu 5: Liệt kê số sinh viên của khoa ‘CONG NGHE SINH HOC’.
select count (SINHVIEN.MaSV) as SoSinhVien
from SINHVIEN
where MaKhoa = 'Bio';

--Câu 6: Liệt kê danh sách gồm mã số, họ tên và tuổi của các sinh viên khoa ‘TOAN’.
select MaSV, TenSV, NgaySinh
from SINHVIEN 
inner join KHOA on SINHVIEN.MaKhoa = KHOA.MaKhoa
where KHOA.TenKhoa = 'TOAN';
 
--Câu 7: Liệt kê số giảng viên của khoa ‘CONG NGHE SINH HOC’.
select count (GIANGVIEN.MaGV) as SoGiangVien
from GIANGVIEN 
inner join KHOA on GIANGVIEN.MaKhoa = KHOA.MaKhoa
where KHOA.TenKhoa = 'CONG NGHE SINH HOC';

--Câu 8: Liệt kê thông tin về sinh viên không tham gia thực tập.
select * from SINHVIEN
where not exists(
    select * from HUONGDAN
    where SINHVIEN.MaSV = HUONGDAN.MaSV
);

--Câu 9: Liệt kê mã khoa, tên khoa và số giảng viên của mỗi khoa.
select KHOA.MaKhoa, KHOA.TenKhoa, COUNT(KHOA.Makhoa) as SoGiangVien
from GIANGVIEN 
inner join KHOA on GIANGVIEN.MaKhoa = KHOA.MaKhoa
group by KHOA.MaKhoa, KHOA.TenKhoa;

--Câu 10: Liệt kê số điện thoại của khoa mà sinh viên có tên ‘Le van son’ đang theo học.
select KHOA.MaKhoa, SINHVIEN.TenSV, KHOA.SoDT
from KHOA
inner join SINHVIEN on KHOA.MaKhoa = SINHVIEN.MaKhoa
where SINHVIEN.TenSV = 'Le Van Son';

--Câu 11: Liệt kê mã số và tên của các đề tài do giảng viên ‘Tran son’ hướng dẫn.
select DETAI.MaDeTai, DETAI.TenDeTai, GIANGVIEN.MaGV, GIANGVIEN.TenGV
from GIANGVIEN  
inner join HUONGDAN on GIANGVIEN.MaGV = HUONGDAN.MaGV
inner join DETAI on DETAI.MaDeTai = HUONGDAN.MaDeTai
where GIANGVIEN.TenGV = 'Tran Son';

--Câu 12: Liệt kê tên đề tài không có sinh viên nào thực tập.
select DETAI.MaDeTai,DETAI.TenDeTai
from DETAI
where not exists(
     select HUONGDAN.MaDeTai
     from HUONGDAN
     where HUONGDAN.MaDeTai = DETAI.MaDeTai
);

--Câu 13: Liệt kê mã số, họ tên, tên khoa của các giảng viên hướng dẫn từ ba sinh viên trở lên.
select GIANGVIEN.MaGV, GIANGVIEN.TenGV,KHOA.TenKhoa
from GIANGVIEN 
inner join KHOA on GIANGVIEN.MaKhoa = KHOA.MaKhoa
where GIANGVIEN.MaGV in(
     select HUONGDAN.MaSV
     from HUONGDAN
     group by HUONGDAN.MaSV
     having count(HUONGDAN.MaSV) > 3
);

--Câu 14: Liệt kê mã số, tên đề tài của đề tài có kinh phí cao nhất.
select DETAI.MaDeTai,DETAI.TenDeTai
from DETAI 
where DETAI.KinhPhi =(
     select max (DETAI.KinhPhi)
     from DETAI
);

--Câu 15: Liệt kê mã số và tên các đề tài có nhiều hơn hai sinh viên tham gia thực tập.
select DETAI.MaDeTai,DETAI.TenDeTai
from DETAI 
where DETAI.MaDeTai in(
    select HUONGDAN.MaDeTai
    from HUONGDAN
    group by HUONGDAN.MaDeTai
     having count(HUONGDAN.MaDeTai) > 2
);

--Câu 16: Liệt kê mã số, họ tên và điểm của các sinh viên khoa ‘DIALY và QLTN’.
select SINHVIEN.MaSV,SINHVIEN.TenSV,HUONGDAN.KetQua
from SINHVIEN
inner join HUONGDAN on SINHVIEN.MaSV = HUONGDAN.MaSV
inner join KHOA on SINHVIEN.MaKhoa = KHOA.MaKhoa
where KHOA.TenKhoa = 'Dia ly va QLTN';

--Câu 17: Liệt kê tên khoa, số lượng sinh viên của mỗi khoa.
select KHOA.TenKhoa, count(SINHVIEN.MaSV) as SoSinhVien
from SINHVIEN 
inner join KHOA on SINHVIEN.MaKhoa = KHOA.MaKhoa
group by KHOA.TenKhoa;

--Câu 18: Liệt kê thông tin về các sinh viên thực tập tại quê nhà.
select SINHVIEN.MaSV, SINHVIEN.TenSV, DETAI.MaDeTai, SINHVIEN.QueQuan, DETAI.NoiThucTap
from SINHVIEN 
inner join HUONGDAN on HUONGDAN.MaSV = SINHVIEN.MaSV
inner join DETAI on DETAI.MaDeTai = HUONGDAN.MaDeTai
where SINHVIEN.Quequan = DETAI.Noithuctap;

--Câu 19: Hãy cho biết thông tin về những sinh viên chưa có điểm thực tập.
select SINHVIEN.MaSV, SINHVIEN.TenSV, HUONGDAN.MaDeTai, HUONGDAN.KetQua
from SINHVIEN
inner join HUONGDAN on HUONGDAN.MaSV = SINHVIEN.MaSV
where HUONGDAN.KetQua is null;

--Câu 20: Liệt kê danh sách gồm mã số, họ tên các sinh viên có điểm thực tập bằng 0.
select SINHVIEN.MaSV, SINHVIEN.TenSV, HUONGDAN.KetQua
from SINHVIEN 
inner join HUONGDAN on HUONGDAN.MaSV = SINHVIEN.MaSV
where HUONGDAN.KetQua = 0;