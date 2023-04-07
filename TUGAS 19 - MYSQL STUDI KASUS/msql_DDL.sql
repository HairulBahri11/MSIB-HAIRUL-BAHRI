--  masuk kedalam MariaDB dengan menggunakan comamand prompt xampp
C:\Users\ASUS>cd \xampp\mysql\bin

-- login mysql
C:\xampp\mysql\bin>mysql -u root -p

-- untuk melihat seluruh database
MariaDB [(none)]> show databases;

--  membuata database baru
MariaDB [(none)]> CREATE DATABASE dbtoko1;

--  menggunakan DB
MariaDB [(none)]> USE dbtoko1;

--  membuat tabel kartu 
MariaDB [dbtoko1]> CREATE TABLE kartu(
    -> id int NOT NULL auto_increment primary key,
    -> kode varchar(10) unique,
    -> nama varchar(30) NOT NUll,
    -> diskon double default 0,
    -> iuran double default 0);

--  menampilkan tabel kartu
MariaDB [dbtoko1]> DESC kartu;

-- membuat tabel pelanggan
MariaDB [dbtoko1]> CREATE TABLE pelanggan(
    -> id int auto_increment primary key,
    -> kode varchar(10) unique,
    -> nama varchar(45),
    -> jk char(1),
    -> tmp_lahir varchar(30),
    -> tgl_lahir date,
    -> email varchar(45),
    -> kartu_id int not null references kartu(id));

--  menampilkan tabel pelanggan
MariaDB [dbtoko1]> DESC pelanggan;

-- membuat tabel pesanan
MariaDB [dbtoko1]> CREATE TABLE pesanan(
    -> id int not null auto_increment primary key,
    -> tanggal date,
    -> total double,
    -> pelanggan_id int not null references pelanggan(id));

-- menampilkan tabel pesanan
MariaDB [dbtoko1]> DESC pesanan;

-- membuat tabel pembayaran
MariaDB [dbtoko1]> CREATE TABLE pembayaran(
    -> id int not null auto_increment primary key,
    -> nokuitansi varchar(10) unique,
    -> tanggal date,
    -> jumlah double,
    -> ke int,
    -> pesanan_id int not null references pesanan(id));

-- menampilkan tabel pembayaran
MariaDB [dbtoko1]> DESC pembayaran;

-- membuat tabel jenis_produk
MariaDB [dbtoko1]> CREATE TABLE jenis_produk(
    -> id int not null auto_increment primary key,
    -> nama varchar(45));

-- menampilkan tabel jenis_produk
MariaDB [dbtoko1]> DESC jenis_produk;

-- membuat tabel produk
MariaDB [dbtoko1]> CREATE TABLE produk(
    -> id int not null auto_increment primary key,
    -> kode varchar(10) not null unique,
    -> nama varchar(45) not null,
    -> harga_beli double,
    -> harga_jual double,
    -> stok int default 0,
    -> min_stok int default 0,
    -> jenis_produk_id int not null references jenis_produk(id));

-- menampilkan tabel pesanan_items
MariaDB [dbtoko1]> DESC produk;

-- membuat tabel pesanan_items
MariaDB [dbtoko1]> CREATE TABLE pesanan_items(
    -> id int not null auto_increment primary key,
    -> produk_id int not null references produk(id),
    -> pesanan_id int not null references pesanan(id),
    -> qty int default 0,
    -> harga double default 0);

-- menampilkan tabel produk
MariaDB [dbtoko1]> DESC pesanan_items;

-- membuat tabel vendor
MariaDB [dbtoko1]> CREATE TABLE vendor(
    -> nomor varchar(4) not null unique,
    -> nama varchar(40) not null,
    -> kota varchar(30) not null,
    -> kontak varchar(30) not null);

-- menampilkan tabel vendor
MariaDB [dbtoko1]> DESC vendor;

-- membuat table pembelian
MariaDB [dbtoko1]> CREATE TABLE pembelian(
    -> tanggal varchar(45) not null,
    -> nomor varchar(10) not null unique,
    -> produk_id int not null references produk(id),
    -> jumlah int not null,
    -> harga double not null,
    -> vendor_id int not null references vendor(id));

-- menampilkan tabel pembelian
MariaDB [dbtoko1]> DESC pembelian;

-- menampilkan tabel pada table yang digunakan
MariaDB [dbtoko1]> SHOW TABLES;

-- menembahkan colomn alamat pada tabel pelanggan
MariaDB [dbtoko1]> ALTER TABLE pelanggan
    -> ADD alamat varchar(40) AFTER email;

-- mengubah data colomn pada table pelanggan
MariaDB [dbtoko1]> ALTER TABLE pelanggan
    -> CHANGE nama nama_pelanggan varchar(45);

-- mengedit tipe data pelanggan menjadi varchar(50)
MariaDB [dbtoko1]> ALTER TABLE pelanggan
    -> MODIFY nama_pelanggan varchar(50); 

--  menampilkan tabel pelanggan
MariaDB [dbtoko1]> DESC pelanggan;;

