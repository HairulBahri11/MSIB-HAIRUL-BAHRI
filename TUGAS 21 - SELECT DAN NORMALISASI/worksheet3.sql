-- Soal 3.1
-- 1.	Tampilkan produk yang asset nya diatas 20jt
SELECT * FROM produk WHERE harga_beli*stok > 20000000;
-- Empty set (0.000 sec)

-- 2.	Tampilkan data produk beserta selisih stok dengan minimal stok
SELECT  SUM(stok - min_stok) as selisih from produk;
-- +---------+
-- | selisih |
-- +---------+
-- |      -8 |
-- +---------+
-- 1 row in set (0.000 sec)

-- 3.	Tampilkan total asset produk secara keseluruhan
SELECT SUM(stok) as asset_total from produk;
-- +-------------+
-- | asset_total |
-- +-------------+
-- |          28 |
-- +-------------+
-- 1 row in set (0.001 sec)

-- 4.	Tampilkan data pelanggan yang lahirnya antara tahun 1999 sampai 2004
SELECT * FROM pelanggan WHERE year(tgl_lahir) BETWEEN 1990 AND 2004;
-- +----+-------+----------------+------+-----------+------------+-----------------+----------------------+----------+
-- | id | kode  | nama_pelanggan | jk   | tmp_lahir | tgl_lahir  | email           | alamat               | kartu_id |
-- +----+-------+----------------+------+-----------+------------+-----------------+----------------------+----------+
-- |  1 | OR001 | Hairul Bahri   | L    | Situbondo | 2002-04-02 | irul@gmail.com  | Situbondo Jawa Timur |        2 |
-- |  2 | OR002 | Zafran Gazi    | L    | Jember    | 2002-05-02 | zafrn@gmail.com | Jember Jatim         |        2 |
-- |  3 | OR003 | Sofyan Saori   | L    | Bondowoso | 1998-04-01 | sof@gmail.com   | Bondowoso Jawa Timur |        2 |
-- |  4 | OR004 | Laili Laiya    | P    | Jember    | 2000-05-02 | lay@email.com   | Jember Jatim         |        3 |
-- +----+-------+----------------+------+-----------+------------+-----------------+----------------------+----------+
-- 4 rows in set (0.000 sec)


-- 5.	Tampilkan data pelanggan yang lahirnya tahun 1998
SELECT * FROM pelanggan WHERE year(tgl_lahir) = 1998;
-- +----+-------+----------------+------+-----------+------------+---------------+----------------------+----------+
-- | id | kode  | nama_pelanggan | jk   | tmp_lahir | tgl_lahir  | email         | alamat               | kartu_id |
-- +----+-------+----------------+------+-----------+------------+---------------+----------------------+----------+
-- |  3 | OR003 | Sofyan Saori   | L    | Bondowoso | 1998-04-01 | sof@gmail.com | Bondowoso Jawa Timur |        2 |
-- +----+-------+----------------+------+-----------+------------+---------------+----------------------+----------+
-- 1 row in set (0.000 sec)


-- 6.	Tampilkan data pelanggan yang berulang tahun bulan agustus
SELECT * FROM pelanggan WHERE month(tgl_lahir) = 8;
-- Empty set (0.032 sec)


-- 7.	Tampilkan data pelanggan : nama, tmp_lahir, tgl_lahir dan umur (selisih tahun sekarang dikurang tahun kelahiran)
SELECT nama_pelanggan, tmp_lahir, tgl_lahir, YEAR(CURDATE()) - YEAR(tgl_lahir) AS umur FROM pelanggan;
-- +----------------+-----------+------------+------+
-- | nama_pelanggan | tmp_lahir | tgl_lahir  | umur |
-- +----------------+-----------+------------+------+
-- | Hairul Bahri   | Situbondo | 2002-04-02 |   21 |
-- | Zafran Gazi    | Jember    | 2002-05-02 |   21 |
-- | Sofyan Saori   | Bondowoso | 1998-04-01 |   25 |
-- | Laili Laiya    | Jember    | 2000-05-02 |   23 |
-- +----------------+-----------+------------+------+
-- 4 rows in set (0.001 sec)

-- Soal 3.2
-- 1.	Berapa jumlah pelanggan yang tahun lahirnya 1998
SELECT COUNT(*) FROM pelanggan WHERE year(tgl_lahir) = 1998;
-- +----------+
-- | COUNT(*) |
-- +----------+
-- |        1 |
-- +----------+
-- 1 row in set (0.001 sec)

-- 2.	Berapa jumlah pelanggan perempuan yang tempat lahirnya di Jakarta
SELECT COUNT(*) FROM pelanggan WHERE jk = 'P' AND tmp_lahir = 'Jakarta';
-- +----------+
-- | COUNT(*) |
-- +----------+
-- |        0 |
-- +----------+
-- 1 row in set (0.000 sec)

-- 3.	Berapa jumlah total stok semua produk yang harga jualnya dibawah 10rb
SELECT SUM(stok) FROM produk WHERE harga_jual < 10000;
-- +-----------+
-- | SUM(stok) |
-- +-----------+
-- |      NULL |
-- +-----------+
-- 1 row in set (0.000 sec)

-- 4.	Ada berapa produk yang mempunyai kode awal K
SELECT COUNT(*) FROM produk WHERE kode LIKE 'K%';
-- +----------+
-- | COUNT(*) |
-- +----------+
-- |        2 |
-- +----------+
-- 1 row in set (0.000 sec)

-- 5.	Berapa harga jual rata-rata produk yang diatas 1jt
SELECT AVG(harga_jual) FROM produk WHERE harga_jual > 1000000;
-- +-----------------+
-- | AVG(harga_jual) |
-- +-----------------+
-- |            NULL |
-- +-----------------+
-- 1 row in set (0.000 sec)

-- 6.	Tampilkan jumlah stok yang paling besar
SELECT MAX(stok) FROM produk;
-- +-----------+
-- | MAX(stok) |
-- +-----------+
-- |        12 |
-- +-----------+
-- 1 row in set (0.000 sec)

-- 7.	Ada berapa produk yang stoknya kurang dari minimal stok
SELECT COUNT(*) FROM produk WHERE stok < min_stok;
-- +----------+
-- | COUNT(*) |
-- +----------+
-- |        4 |
-- +----------+
-- 1 row in set (0.000 sec)

-- 8.	Berapa total asset dari keseluruhan produk
SELECT SUM(harga_beli*stok) FROM produk;
-- +----------------------+
-- | SUM(harga_beli*stok) |
-- +----------------------+
-- |              4770000 |
-- +----------------------+
-- 1 row in set (0.000 sec)

-- Soal 3.3
-- 1.	Tampilkan data produk : id, nama, stok dan informasi jika stok telah sampai batas minimal atau kurang dari minimum stok dengan informasi ‘segera belanja’ jika tidak ‘stok aman’.
SELECT id, nama, stok, IF(stok < min_stok, 'segera belanja', 'stok aman') AS info FROM produk;
-- +----+-----------------+------+----------------+
-- | id | nama            | stok | info           |
-- +----+-----------------+------+----------------+
-- |  1 | Toshiba         |   12 | segera belanja |
-- |  2 | Home Kulkas     |   10 | segera belanja |
-- |  3 | Blue Jeans      |    3 | segera belanja |
-- |  4 | Flanel Kemejaku |    3 | segera belanja |
-- +----+-----------------+------+----------------+
-- 4 rows in set (0.000 sec)

-- 2.	Tampilkan data pelanggan: id, nama, umur dan kategori umur : jika umur < 17 → ‘muda’ , 17-55 → ‘Dewasa’, selainnya ‘Tua’
SELECT id, nama_pelanggan, YEAR(CURDATE()) - YEAR(tgl_lahir) AS umur, IF(YEAR(CURDATE()) - YEAR(tgl_lahir) < 17, 'muda', IF(YEAR(CURDATE()) - YEAR(tgl_lahir) BETWEEN 17 AND 55, 'dewasa', 'tua')) AS kategori_umur FROM pelanggan;
-- +----+----------------+------+---------------+
-- | id | nama_pelanggan | umur | kategori_umur |
-- +----+----------------+------+---------------+
-- |  1 | Hairul Bahri   |   21 | dewasa        |
-- |  2 | Zafran Gazi    |   21 | dewasa        |
-- |  3 | Sofyan Saori   |   25 | dewasa        |
-- |  4 | Laili Laiya    |   23 | dewasa        |
-- +----+----------------+------+---------------+
-- 4 rows in set (0.000 sec)

-- 3.	Tampilkan data produk: id, kode, nama, dan bonus untuk kode ‘TV01’ →’DVD Player’ , ‘K001’ → ‘Rice Cooker’ selain dari diatas ‘Tidak Ada’
SELECT id, kode, nama, IF(kode = 'TV01', 'DVD Player', IF(kode = 'K001', 'Rice Cooker', 'Tidak Ada')) AS bonus FROM produk;
-- +----+-------+-----------------+-----------+
-- | id | kode  | nama            | bonus     |
-- +----+-------+-----------------+-----------+
-- |  1 | TV001 | Toshiba         | Tidak Ada |
-- |  2 | K0001 | Home Kulkas     | Tidak Ada |
-- |  3 | C0001 | Blue Jeans      | Tidak Ada |
-- |  4 | KM001 | Flanel Kemejaku | Tidak Ada |
-- +----+-------+-----------------+-----------+
-- 4 rows in set (0.000 sec)


-- Soal 3.4
-- 1.	Tampilkan data statistik jumlah tempat lahir pelanggan
SELECT tmp_lahir, COUNT(*) AS jumlah FROM pelanggan GROUP BY tmp_lahir;
-- +-----------+--------+
-- | tmp_lahir | jumlah |
-- +-----------+--------+
-- | Bondowoso |      1 |
-- | Jember    |      2 |
-- | Situbondo |      1 |
-- +-----------+--------+
-- 3 rows in set (0.001 sec)

-- 2.	Tampilkan jumlah statistik produk berdasarkan jenis produk
SELECT jp.nama AS jenis_produk, COUNT(*) AS statistik FROM produk as p JOIN jenis_produk as jp ON p.jenis_produk_id = jp.id GROUP BY jp.id;
-- +--------------+-----------+
-- | jenis_produk | statistik |
-- +--------------+-----------+
-- | Televisi     |         1 |
-- | Kulkas       |         1 |
-- | Kemeja       |         1 |
-- | Celana       |         1 |
-- +--------------+-----------+
-- 4 rows in set (0.001 sec)

-- 3.	Tampilkan data pelanggan yang usianya dibawah rata usia pelanggan
SELECT * FROM pelanggan WHERE DATE(CURDATE()) - DATE(tgl_lahir) < (SELECT AVG(DATE(CURDATE()) - DATE(tgl_lahir)) FROM pelanggan);
-- +----+-------+----------------+------+-----------+------------+-----------------+----------------------+----------+
-- | id | kode  | nama_pelanggan | jk   | tmp_lahir | tgl_lahir  | email           | alamat               | kartu_id |
-- +----+-------+----------------+------+-----------+------------+-----------------+----------------------+----------+
-- |  1 | OR001 | Hairul Bahri   | L    | Situbondo | 2002-04-02 | irul@gmail.com  | Situbondo Jawa Timur |        2 |
-- |  2 | OR002 | Zafran Gazi    | L    | Jember    | 2002-05-02 | zafrn@gmail.com | Jember Jatim         |        2 |
-- +----+-------+----------------+------+-----------+------------+-----------------+----------------------+----------+
-- 2 rows in set (0.000 sec)

-- 4.	Tampilkan data produk yang harganya diatas rata-rata harga produk
SELECT * FROM produk WHERE harga_jual > (SELECT AVG(harga_jual) FROM produk);
-- +----+-------+-------------+------------+------------+------+----------+-----------------+
-- | id | kode  | nama        | harga_beli | harga_jual | stok | min_stok | jenis_produk_id |
-- +----+-------+-------------+------------+------------+------+----------+-----------------+
-- |  2 | K0001 | Home Kulkas |     300000 |     320000 |   10 |       12 |               2 |
-- +----+-------+-------------+------------+------------+------+----------+-----------------+
-- 1 row in set (0.000 sec)

-- 5.	Tampilkan data pelanggan yang memiliki kartu dimana iuran tahunan kartu diatas 90rb
SELECT p.*, k.iuran AS iuran FROM pelanggan AS p JOIN kartu AS k ON p.kartu_id = k.id WHERE k.iuran > 90000;
-- +----+-------+----------------+------+-----------+------------+-----------------+----------------------+----------+-------+
-- | id | kode  | nama_pelanggan | jk   | tmp_lahir | tgl_lahir  | email           | alamat               | kartu_id | iuran |
-- +----+-------+----------------+------+-----------+------------+-----------------+----------------------+----------+-------+
-- |  1 | OR001 | Hairul Bahri   | L    | Situbondo | 2002-04-02 | irul@gmail.com  | Situbondo Jawa Timur |        2 | 97000 |
-- |  2 | OR002 | Zafran Gazi    | L    | Jember    | 2002-05-02 | zafrn@gmail.com | Jember Jatim         |        2 | 97000 |
-- |  3 | OR003 | Sofyan Saori   | L    | Bondowoso | 1998-04-01 | sof@gmail.com   | Bondowoso Jawa Timur |        2 | 97000 |
-- +----+-------+----------------+------+-----------+------------+-----------------+----------------------+----------+-------+
-- 3 rows in set (0.000 sec)


-- 6.	Tampilkan statistik data produk dimana harga produknya dibawah rata-rata harga produk secara keseluruhan
SELECT * FROM produk WHERE harga_jual < (SELECT AVG(harga_jual) FROM produk);
-- +----+-------+-----------------+------------+------------+------+----------+-----------------+
-- | id | kode  | nama            | harga_beli | harga_jual | stok | min_stok | jenis_produk_id |
-- +----+-------+-----------------+------------+------------+------+----------+-----------------+
-- |  1 | TV001 | Toshiba         |     100000 |     120000 |   12 |       15 |               1 |
-- |  3 | C0001 | Blue Jeans      |     120000 |     130000 |    3 |        4 |               4 |
-- |  4 | KM001 | Flanel Kemejaku |      70000 |      80000 |    3 |        5 |               3 |
-- +----+-------+-----------------+------------+------------+------+----------+-----------------+
-- 3 rows in set (0.001 sec)

-- 7.	Tampilkan data pelanggan yang memiliki kartu dimana diskon kartu yang diberikan diatas 3%
SELECT p.*, k.diskon AS diskon FROM pelanggan AS p JOIN kartu AS k ON p.kartu_id = k.id WHERE k.diskon > 3;
-- Empty set (0.001 sec)