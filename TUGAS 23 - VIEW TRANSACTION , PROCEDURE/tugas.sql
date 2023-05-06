-- TUGAS 7 DATABASE MYSQL

-- Buat fungsi inputPelanggan(), setelah itu panggil fungsinya
DELIMITER $$
CREATE PROCEDURE inputanPelanggan()
BEGIN
    INSERT INTO pelanggan (kode, nama_pelanggan, jk , tmp_lahir, tgl_lahir,  email, alamat, kartu_id) VALUES 
    ('OR005', 'Budi', 'L', 'Jakarta', '1990-01-01', 'Budi@email.com' , 'Jl. Raya Gaspol','3');
END
$$
DELIMITER ;
CALL inputanPelanggan();

-- Buat fungsi showPelanggan(), setelah itu panggil fungsinya
DELIMITER $$
CREATE PROCEDURE showPelanggan()
BEGIN
    SELECT p.id, p.kode, p.nama_pelanggan, p.jk, p.tmp_lahir, p.tgl_lahir, p.email, p.alamat,kartu_id, k.nama
    FROM pelanggan p JOIN kartu k ON p.kartu_id = k.id;
END
$$
DELIMITER ;
CALL showPelanggan();

-- output
-- +----+-------+----------------+------+-----------+------------+-----------------+----------------------+----------+----------+
-- | id | kode  | nama_pelanggan | jk   | tmp_lahir | tgl_lahir  | email           | alamat               | kartu_id | nama     |
-- +----+-------+----------------+------+-----------+------------+-----------------+----------------------+----------+----------+
-- |  1 | OR001 | Hairul Bahri   | L    | Situbondo | 2002-04-02 | irul@gmail.com  | Situbondo Jawa Timur |        2 | PLATINUM |
-- |  2 | OR002 | Zafran Gazi    | L    | Jember    | 2002-05-02 | zafrn@gmail.com | Jember Jatim         |        2 | PLATINUM |
-- |  3 | OR003 | Sofyan Saori   | L    | Bondowoso | 1998-04-01 | sof@gmail.com   | Bondowoso Jawa Timur |        2 | PLATINUM |
-- |  4 | OR004 | Laili Laiya    | P    | Jember    | 2000-05-02 | lay@email.com   | Jember Jatim         |        3 | Gold     |
-- |  5 | OR005 | Budi           | L    | Jakarta   | 1990-01-01 | Budi@email.com  | Jl. Raya Gaspol      |        3 | Gold     |
-- +----+-------+----------------+------+-----------+------------+-----------------+----------------------+----------+----------+
-- 5 rows in set (0.001 sec)


-- Buat fungsi inputProduk(), setelah itu panggil fungsinya
DELIMITER $$
CREATE PROCEDURE inputProduk()
BEGIN
    INSERT INTO produk (kode, nama, harga_beli,harga_jual, stok,min_stok,jenis_produk_id) VALUES 
    ('TV002','Dell', 1000000, 2000000, 10, 5, 1);

END
$$
DELIMITER ;
CALL inputProduk();


-- Buat fungsi showProduk(), setelah itu panggil fungsinya
DELIMITER $$
CREATE PROCEDURE showProduk()
BEGIN
    SELECT p.id, p.kode, p.nama, p.harga_beli, p.harga_jual, p.stok, p.min_stok, p.jenis_produk_id, jp.nama
    FROM produk p JOIN jenis_produk jp ON p.jenis_produk_id = jp.id;
END
$$
DELIMITER ;
CALL showProduk();

--output
-- +----+-------+-----------------+------------+------------+------+----------+-----------------+----------+
-- | id | kode  | nama            | harga_beli | harga_jual | stok | min_stok | jenis_produk_id | nama     |
-- +----+-------+-----------------+------------+------------+------+----------+-----------------+----------+
-- |  1 | TV001 | Toshiba         |     100000 |     120000 |   12 |       15 |               1 | Televisi |
-- |  2 | K0001 | Home Kulkas     |     300000 |     320000 |   10 |       12 |               2 | Kulkas   |
-- |  3 | C0001 | Blue Jeans      |     120000 |     130000 |    3 |        4 |               4 | Celana   |
-- |  4 | KM001 | Flanel Kemejaku |      70000 |      80000 |    3 |        5 |               3 | Kemeja   |
-- |  5 | TV002 | Dell            |    1000000 |    2000000 |   10 |        5 |               1 | Televisi |
-- +----+-------+-----------------+------------+------------+------+----------+-----------------+----------+
-- 5 rows in set (0.001 sec)
-- Query OK, 0 rows affected (0.029 sec)

-- Buat fungsi totalPesanannya(), setelah itu panggil fungsinya
DELIMITER $$
CREATE PROCEDURE totalPesanannya()
BEGIN
    SELECT COUNT(*) AS total_pesanan FROM pesanan;

END
$$
DELIMITER ;
CALL totalPesanannya();

-- output
-- +---------------+
-- | total_pesanan |
-- +---------------+
-- |             2 |
-- +---------------+
-- 1 row in set (0.000 sec)

-- Query OK, 0 rows affected (0.009 sec)





-- tampilkan seluruh pesanan dari semua pelanggan
SELECT ps.tanggal, ps.total, p.nama_pelanggan, pr.nama , jp.nama , pa.qty FROM pesanan_items pa 
JOIN pesanan ps ON pa.pesanan_id = ps.id
JOIN pelanggan p ON ps.pelanggan_id = p.id 
JOIN produk pr ON pa.produk_id = pr.id 
JOIN jenis_produk jp ON pr.jenis_produk_id = jp.id 
--output
-- +------------+---------+----------------+-----------------+--------+------+
-- | tanggal    | total   | nama_pelanggan | nama            | nama   | qty  |
-- +------------+---------+----------------+-----------------+--------+------+
-- | 2022-08-23 |  150000 | Hairul Bahri   | Blue Jeans      | Celana |    2 |
-- | 2023-05-02 | 1456000 | Sofyan Saori   | Flanel Kemejaku | Kemeja |    5 |
-- +------------+---------+----------------+-----------------+--------+------+






-- buatkan query panjang di atas menjadi sebuah view baru: pesanan_produk_vw (menggunakan join dari table pesanan,pelanggan dan produk)
CREATE VIEW pesanan_produk_vw AS
SELECT ps.tanggal, ps.total, p.nama_pelanggan, pr.nama , jp.nama , pa.qty FROM pesanan_items pa 
JOIN pesanan ps ON pa.pesanan_id = ps.id
JOIN pelanggan p ON ps.pelanggan_id = p.id 
JOIN produk pr ON pa.produk_id = pr.id 
JOIN jenis_produk jp ON pr.jenis_produk_id = jp.id 

SELECT * FROM pesanan_produk_vw;



-- output
-- +------------+---------+----------------+-----------------+--------+------+
-- | tanggal    | total   | nama_pelanggan | nama            | nama   | qty  |
-- +------------+---------+----------------+-----------------+--------+------+
-- | 2022-08-23 |  150000 | Hairul Bahri   | Blue Jeans      | Celana |    2 |
-- | 2023-05-02 | 1456000 | Sofyan Saori   | Flanel Kemejaku | Kemeja |    5 |
-- +------------+---------+----------------+-----------------+--------+------+





