create database thuctapsinhvien;
use thuctapsinhvien;

--Tạo bảng.
create table SINHVIEN(
   MaSV char(15),
   TenSV char(40),
   NamSinh int,
   QueQuan char(30),
   HocLuc char(15),
   constraint pk_SINHVIEN primary key(MaSV),
);

create table DETAI(
    MaDT char(15),
    TenDT char(30),
	ChuNhiemDT char(30),	
    KinhPhi int,
	constraint pk_DETAI primary key(MaDT)
);

create table SD(
     MaSV char(15),
     MaDT char(15),
	 NoiThucTap char(30),
     KhoangCach int,
     KetQua int,
	 constraint pk_SD primary key(MaSV),
     constraint fk_SD_DETAI foreign key(MaDT) references DETAI(MaDT),
	 constraint fk_SD_SINHVIEN foreign key(MaSV) references SINHVIEN(MaSV)
);

--Chèn dữ liệu thông tin.
insert into SINHVIEN(MaSV, TenSV, Namsinh, QueQuan, HocLuc) values
('01','Le Van Son',1990,'Nghe An','Xuat Sac'),
('02','Nguyen Thi Mai',1993,'Quang Nam','Gioi'),
('03','Bui Xuan Duc',2001,'Ha Noi','Trung Binh'),
('04','Huynh Van Tung',1999,'Can Tho','Kha'),
('05','Vu Khanh Linh',1995,'Da Nang','Trung Binh'),
('06','Tran Khac Trong',1989,'Thanh Hoa','Gioi'),
('07','Hoang Van Hai',2000,'An Giang','Kha');

insert into DETAI(MaDT, TenDT, ChuNhiemDT, KinhPhi) values
('DT01','AAA','Nguyen',1500),
('DT02','BBB','Nam',5000),
('DT03','CCC','Ha',2000),
('DT04','DDD','Binh',3000),
('DT05','EEE','Quang',4000),
('DT06','HHH','Thi',3000),
('DT07','GGG','Chien',4000);

insert into SD(MaSV, MaDT, NoiThucTap, KhoangCach, KetQua)values
('02','DT01', 'An Giang',100,8),
('05','DT03','Da Nang',200,5),
('01','DT05', 'Can Tho',300,10), 
('04','DT04', 'Thanh Hoa',400,7),
('03','DT06','Ha Noi',500,6),
('07','DT07','Quang Nam',600,7),
('06','DT02', 'Nghe An',700,9);

-- 1. Thông tin về những sinh viên sinh trước năm 1996, quê ở Đà Nẵng.
select * from SINHVIEN
where SINHVIEN.NamSinh < 1996 and SINHVIEN.QueQuan = 'Da Nang';

--2. Danh sách các tỉnh có sinh viên đến thực tập.
select distinct NoiThucTap
from SD;

--3. Các địa điểm thực tập xa trường (KM>100) của đề tài số 7.
select MaDT, NoiThucTap, KhoangCach
from SD
where SD.KhoangCach > 100 and SD.MaDT = 'DT07';

--4. Thông tin về việc thực tập tại Quảng Nam của các sinh viên.
select * from SINHVIEN
where SINHVIEN.QueQuan = 'Quang Nam';

--5. Danh sách sinh viên thực tập tại quê nhà.
select SD.MaSV, SINHVIEN.TenSV, SINHVIEN.QueQuan, SD.MaDT, SD.NoiThucTap
from SINHVIEN 
inner join SD on SD.MaSV = SINHVIEN.MaSV
where SINHVIEN.QueQuan = SD.NoiThucTap;

--6. Thông tin về các đề tài có sinh viên thực tập.
select DETAI.MaDT, DETAI.TenDT, SD.MaSV, SD.NoiThucTap
from DETAI
inner join SD on DETAI.MaDT = SD.MaDT;

--7. Mã các đề tài không có sinh viên nào tham gia.
select MaDT, TenDT
from DETAI
where DETAI.MaDT not in (select MaDT from SD);

--8. Mã những đề tài có kinh phí 1.5 triệu và những đề tài có kinh phí trên 2 triệu.
select MaDT, KinhPhi
from DETAI
where DETAI.KinhPhi = 1500 or DETAI.KinhPhi > 2000;

--9. Mã những sinh viên dưới 23 tuổi, thực tập loại khá (có kết quả trên 7).
select SINHVIEN.NamSinh, SD.KetQua
from SINHVIEN
inner join SD on SINHVIEN.MaSV = SD.MaSV
where SINHVIEN.NamSinh > 1999 and SD.KetQua > 7; 

--10.Danh sách các đề tài có sinh viên học giỏi nhất lớp tham gia.
select DETAI.MaDT, SINHVIEN.MaSV, SINHVIEN.TenSV, SD.KetQua, SINHVIEN.HocLuc
from DETAI
inner join SD on DETAI.MaDT = SD.MaDT
inner join SINHVIEN on SD.MaSV = SINHVIEN.MaSV
where SD.KetQua = (select max(KetQua) from SD);

--11. Danh sách các đề tài không có sinh viên học kém nhất lớp tham gia.
select DETAI.MaDT, DETAI.TenDT, SINHVIEN.MaSV, SINHVIEN.TenSV, SD.KetQua, SINHVIEN.HocLuc
from DETAI
inner join SD on DETAI.MaDT = SD.MaDT
inner join SINHVIEN on SD.MaSV = SINHVIEN.MaSV
where SD.KetQua not in (select min(KetQua) from SD);

--12. Danh sách những sinh viên thực tập theo đề tài có kinh phí lớn hơn một phần trăm tổng kinh phí cấp cho các đề tài. 
select SINHVIEN.MaSV, SINHVIEN.TenSV, DETAI.MaDT, DETAI.TenDT, DETAI.KinhPhi
from SINHVIEN
inner join SD on SD.MaSV = SINHVIEN.MaSV
inner join DETAI on DETAI.MaDT = SD.MaDT
where KinhPhi > (select sum(KinhPhi)/100 from DETAI);

--13. Mã của những đề tài có nơi thực tập giống như đề tài mã số 1.
select MaDT from SD
where NoiThucTap = (select NoiThucTap from SD where MaDT='DT01');

--14. Danh sách những đề tài được triển khai thực tập ở tất cả các tỉnh có sinh viên thực tập.
select MaDT, TenDT
from DETAI
where DETAI.MaDT in (select MaDT from SD);

--15.Danh sách những sinh viên có điểm học tập cao hơn điểm thực tập trung bình của đề tài mã số 4.
select * from SINHVIEN
where HocLuc > (select avg (KetQua) from SD where MaDT ='DT04');