-- create Table member 
create Table member (
    id int primary key  AUTO_INCREMENT,
    fullname varchar(30) NOT NULL,
    username varchar(30) NOT NULL,
    password varchar(30) NOT NULL,
    role enum('admin','manager','staff') NOT NULL,
    foto varchar(30));

insert into member (fullname,username,password,role,foto) values ('admin1','admin1','admin1','admin','admin1.jpg');
insert into member (fullname,username,password,role,foto) values ('staff2','staff2',SHA1(MD5('staff2')),'staff','staff2.jpg');
insert into member (fullname,username,password,role,foto) values ('manager1','manager1','manager','manager1','manager1.jpg');



insert into member (fullname,username,password,role,foto) values ('staff2','staff2',SHA1(MD5('staff2')),'staff','staff2.jpg');
-- manager 2
insert into member (fullname,username,password,role,foto) values ('manager2','manager2',SHA1(MD5('manager2')),'manager2','manager2.jpg');
--admin 2
insert into member (fullname,username,password,role,foto) values ('admin2','admin2',SHA1(MD5('admin2')),'admin2','admin2.jpg');
--manager 3
insert into member (fullname,username,password,role,foto) values ('manager3','manager3',SHA1(MD5('manager3')),'manager','manager3.jpg');
--admin3 
insert into member (fullname,username,password,role,foto) values ('admin3','admin3',SHA1(MD5('admin3')),'admin','admin3.jpg');
--staff 3
insert into member (fullname,username,password,role,foto) values ('staff3','staff3',SHA1(MD5('staff3')),'staff','staff3.jpg');