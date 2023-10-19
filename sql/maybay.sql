create database maybay;
use maybay;

--Câu 1: Tạo bảng.
create table LOAIMAYBAY(
   MaLoai nvarchar(50),
   LoaiMB varchar(50),
   DongCo varchar(50),
   ToDoToiThieu	varchar(50),
   TocDoToiDa varchar(50),
   constraint pk_LOAIMAYBAY primary key(MaLoai)
);

create table MAYBAY(
   SoHieu varchar(50),
   MaLoai nvarchar(50),
   NgayBatDauSD date,
   constraint pk_MAYBAY primary key(SoHieu),
   constraint fk_MAYBAY_LOAIMAYBAY foreign key(MaLoai) references LOAIMAYBAY(MaLoai)
);

create table PHICONG(
    MaPC nvarchar(50),
	TenPC varchar(50),
	TrinhDo	varchar(50),
	NamKN char(10),
	constraint pk_PHICONG primary key(MaPC)
);

create table LICHTRINHBAY(
   MaLT	nvarchar(50),
   SoHieu varchar(50),
   MaPC	nvarchar(50),
   NoiDi varchar(50),	
   NoiDen varchar(50),
   ThoiGianDi varchar(50),	
   ThoiGianDen varchar(50),
   constraint pk_LICHTRINHBAY primary key(MaLT),
   constraint fk_LICHTRINHBAY_PHICONG foreign key(MaPC) references PHICONG(MaPC),
   constraint fk_LICHTRINHBAY_MAYBAY foreign key(SoHieu) references MAYBAY(SoHieu)
);

--Câu 2: Chèn thông tin.
insert into LOAIMAYBAY (MaLoai,LoaiMB,DongCo,ToDoToiThieu,TocDoToiDa) values
('L01','Boeing 747','tuoc bin canh quat','1000km/h','3000km/h'),
('L02','A321','tuoc bin phan luc','1500km/h','3200km/h'),
('L03','Boeing 737','tuoc bin roc ket','1100km/h','2500km/h');

insert into MAYBAY (SoHieu,MaLoai,NgayBatDauSD) values 
('VN01','L01','05-20-15'),
('JS02','L01','05-21-15'),
('AS01','L02','05-22-15');

insert into PHICONG (MaPC,TenPC,TrinhDo,NamKN) values 
('PC01','Tran Dinh Nam','Co Pho','3'),
('PC02','jonh henry','CoTruong','8');

insert into LICHTRINHBAY (MaLT,SoHieu,MaPC,NoiDi,NoiDen,ThoiGianDi,ThoiGianDen) values
('LT001','VN01','PC02','Ha Noi','Da Nang','05-20-15:14:00','05-20-15:16:00'),
('LT002','AS01','PC01','Da Nang','Thai Lan','04-13-15:08:00','04-13-15:13:00');

--Câu 3: Liệt kê thông tin toàn bộ máy bay.
select * from MAYBAY;

--Câu 4: Xoá toàn bộ máy bay sử dụng động cơ là 'tuoc bin rocket'.
delete from LOAIMAYBAY
where DongCo = 'tuoc bin rocket';

--Câu 5: Cập nhật giá trị của trường NamKN trong bảng PHICONG thành 5 nếu trường NamKN đang có giá trị là 3.
update PHICONG 
set NamKN = 5
where NamKN = 3;

--Câu 6: Liệt kê thông tin của những máy bay thuộc loại 'Boeing 747' được bắt đầu sử dụng từ ngày 01/01/2014 
--và những máy bay thuộc loại 'A321' được bắt đầu sử dụng trước ngày 12/31/2014.
select * from LOAIMAYBAY
where (LoaiMB = 'Boeing 747' and NgayBatDauSD = '01/01/2014') or (LoaiMB = 'A321' and NgayBatDauSD = '12/31/2014');

--Câu 7: Liệt kê những phi công có tên bắt đầu là ký tự 'N' và có độ dài là 7 ký tự.
select * from PHICONG where TenPC like '%_______%';

-- Câu 8: Liệt kê toàn bộ máy bay, sắp xếp giảm dần theo MaLoai và tăng dần theo NgayBatDauSD.
select * from MAYBAY 
order by MaLoai desc, NgayBatDauSD asc;

--Câu 9: Đếm số lần bay tương ứng theo từng phi công, chỉ đếm các lần bay được thực hiện bay trong năm 2014.
select MaPC, count(MaPC) as CacLanBay
from LICHTRINHBAY
WHERE year(ThoiGianDi) = '2014'
group by MaPC;

-- Câu 10: Liệt kê tên của toàn bộ phi công (tên nào giống nhau thì chỉ liệt kê một lần).
select TenPC
from PHICONG
group by TenPC;

--Câu 11: Liệt kê SoHieu, MaLoai, TenPC, NoiDi, NoiDen, ThoiGianDi, ThoiGianDen (của tất cả các lần bay của các máy bay).
select LICHTRINHBAY.SoHieu, MAYBAY.MaLoai, PHICONG.TenPC, LICHTRINHBAY.NoiDi, LICHTRINHBAY.NoiDen, LICHTRINHBAY.ThoiGianDi, LICHTRINHBAY.ThoiGianDen
from PHICONG 
inner join LICHTRINHBAY on LICHTRINHBAY.MaPC = PHICONG.MaPC
inner join MAYBAY on MAYBAY.SoHieu = LICHTRINHBAY.SoHieu;

--Câu 12: Liệt kê SoHieu, MaLoai, TenPC, NoiDi, NoiDen, ThoiGianDi, ThoiGianDen 
--của tất cả các lần bay của máy bay (Liệt kê cả những máy bay chưa được bay lần nào).
select LICHTRINHBAY.SoHieu, MAYBAY.MaLoai, PHICONG.TenPC, LICHTRINHBAY.NoiDi, LICHTRINHBAY.NoiDen, LICHTRINHBAY.ThoiGianDi, LICHTRINHBAY.ThoiGianDen
from PHICONG 
left join LICHTRINHBAY on LICHTRINHBAY.MaPC = PHICONG.MaPC 
left join MAYBAY on MAYBAY.SoHieu = LICHTRINHBAY.SoHieu;

--Câu 13: Liệt kê SoHieu, MaLoai của những máy bay đã thực hiện bay với điểm xuất phát 
--từ sân bay 'Ha noi' hoặc thuộc loại máy bay là 'Boeing 747'.
select LICHTRINHBAY.SoHieu, MAYBAY.MaLoai
from PHICONG 
inner join LICHTRINHBAY on LICHTRINHBAY.MaPC = PHICONG.MaPC 
inner join MAYBAY on MAYBAY.SoHieu = LICHTRINHBAY.SoHieu
where NoiDi = 'Ha noi' or LoaiMB = 'Boeing 747';

--Câu 14: Liệt kê SoHieu, MaLoai của những máy bay chưa từng thực hiện bay lần nào.
select LICHTRINHBAY.SoHieu, MAYBAY.MaLoai
from MAYBAY 
inner join LICHTRINHBAY on LICHTRINHBAY.SoHieu = MAYBAY.SoHieu;

--Câu 15: Liệt kê SoHieu, MaLoai của những máy bay đã từng thực hiện bay với điểm xuất phát từ sân bay 'Ha noi'
--và chưa từng thực hiện bay lần nào với điểm xuất phát là sân bay 'Thanh pho Ho Chi Minh'.
select LICHTRINHBAY.SoHieu, MAYBAY.MaLoai
from MAYBAY 
inner join LICHTRINHBAY on LICHTRINHBAY.SoHieu = MAYBAY.SoHieu
inner join LOAIMAYBAY on LOAIMAYBAY.MaLoai = MAYBAY.MaLoai
where NoiDi = 'Ha Noi' and NoiDi not in (select NoiDi = 'Thanh pho Ho Chi Minh' from MAYBAY);

--Câu 16: Liệt kê SoHieu, MaLoai, TenPC, NoiDi, NoiDen, ThoiGianDi, ThoiGianDen, TenPC của những máy bay thuộc loại 'A321' 
--và chỉ mới thực hiện bay một lần duy nhất. Kết quả liệt kê sắp xếp tăng dần theo ThoiGianDi.
select LICHTRINHBAY.SoHieu, MAYBAY.MaLoai, PHICONG.TenPC, LICHTRINHBAY.NoiDi, LICHTRINHBAY.NoiDen, LICHTRINHBAY.ThoiGianDi, LICHTRINHBAY.ThoiGianDen
from LICHTRINHBAY
inner join MAYBAY on LICHTRINHBAY.SoHieu = MAYBAY.SoHieu
inner join LOAIMAYBAY on MAYBAY.MaLoai = LOAIMAYBAY.MaLoai
inner join PHICONG on LICHTRINHBAY.MaPC = PHICONG.MaPC
where LoaiMB = 'A321' 
group by LICHTRINHBAY.SoHieu, MAYBAY.MaLoai, PHICONG.TenPC, LICHTRINHBAY.NoiDi, LICHTRINHBAY.NoiDen, LICHTRINHBAY.ThoiGianDi, LICHTRINHBAY.ThoiGianDen
having count(LoaiMB) = 1
order by ThoiGianDi asc;