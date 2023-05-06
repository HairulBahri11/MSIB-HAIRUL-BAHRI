--SOAL 1
DELIMITER $$
CREATE TRIGGER keranjang_pesanan_items BEFORE INSERT ON pesanan_items
 FOR EACH ROW
 BEGIN
SET @stok = (SELECT stok FROM produk where id = NEW.produk_id);
SET @sisa = @stok - NEW.qty;
IF @sisa < 0 THEN
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Stok tidak cukup';
END IF;
UPDATE produk SET stok = @sisa WHERE id = NEW.produk_id;
END
$$
DELIMITER ;

--kondisi tabel produk awal 
-- +----+-------+-----------------+------------+------------+------+----------+-----------------+
-- | id | kode  | nama            | harga_beli | harga_jual | stok | min_stok | jenis_produk_id |
-- +----+-------+-----------------+------------+------------+------+----------+-----------------+
-- |  1 | TV001 | Toshiba         |     100000 |     120000 |   12 |       15 |               1 |
-- |  2 | K0001 | Home Kulkas     |     300000 |     320000 |   10 |       12 |               2 |
-- |  3 | C0001 | Blue Jeans      |     120000 |     130000 |    3 |        4 |               4 |
-- |  4 | KM001 | Flanel Kemejaku |      70000 |      80000 |    3 |        5 |               3 |
-- |  5 | TV002 | Dell            |    1000000 |    2000000 |   10 |        5 |               1 |
-- +----+-------+-----------------+------------+------------+------+----------+-----------------+
-- 5 rows in set (0.000 sec)

--menambahkan data pesanan_items
INSERT INTO pesanan_items (pesanan_id, produk_id, qty,harga) VALUES (1, 1, 2,456000);
--output tabel
-- +----+-----------+------------+------+---------+
-- | id | produk_id | pesanan_id | qty  | harga   |
-- +----+-----------+------------+------+---------+
-- |  1 |         3 |          1 |    2 | 1234000 |
-- |  2 |         4 |          2 |    5 |   65700 |
-- |  3 |         1 |          2 |    1 |  456000 |
-- +----+-----------+------------+------+---------+
-- 3 rows in set (0.001 sec)

--kondisi setelah trigger dan menambahkan produk baru di pesanan_items
-- +----+-------+-----------------+------------+------------+------+----------+-----------------+
-- | id | kode  | nama            | harga_beli | harga_jual | stok | min_stok | jenis_produk_id |
-- +----+-------+-----------------+------------+------------+------+----------+-----------------+
-- |  1 | TV001 | Toshiba         |     100000 |     120000 |   11 |       15 |               1 |
-- |  2 | K0001 | Home Kulkas     |     300000 |     320000 |   10 |       12 |               2 |
-- |  3 | C0001 | Blue Jeans      |     120000 |     130000 |    3 |        4 |               4 |
-- |  4 | KM001 | Flanel Kemejaku |      70000 |      80000 |    3 |        5 |               3 |
-- |  5 | TV002 | Dell            |    1000000 |    2000000 |   10 |        5 |               1 |
-- +----+-------+-----------------+------------+------------+------+----------+-----------------+
-- 5 rows in set (0.000 sec)

--SOAL KE 2
--kondisi jika qty diupdate pada tabel pesanan_items
DELIMITER $$
CREATE TRIGGER keranjang_pesanan_items_update BEFORE UPDATE ON pesanan_items
 FOR EACH ROW
 BEGIN
 IF Old.id = NEW.produk_id THEN
SET @stok = (SELECT stok FROM produk where id = OLD.produk_id);
SET @sisa = (@stok + OLD.qty) - NEW.qty;
IF @sisa < 0 THEN
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Stok tidak cukup';
END IF;
UPDATE produk SET stok = @sisa WHERE id = OLD.produk_id;
ELSE
SET @stok_lama = (SELECT stok FROM produk where id = OLD.produk_id);
SET @sisa_lama = @stok_lama + OLD.qty;
UPDATE produk SET stok = @sisa_lama WHERE id = OLD.produk_id;
SET @stok_baru = (SELECT stok FROM produk where id = NEW.produk_id);
SET @sisa_baru = @stok_baru - NEW.qty;
IF @sisa_baru < 0 THEN
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Stok tidak tersedia';
END IF;
UPDATE produk SET stok = @sisa_baru WHERE id = NEW.produk_id;
END IF;
END;
$$;
DELIMITER ;

--kondisi tabel produk sebelum update
-- +----+-------+-----------------+------------+------------+------+----------+-----------------+
-- | id | kode  | nama            | harga_beli | harga_jual | stok | min_stok | jenis_produk_id |
-- +----+-------+-----------------+------------+------------+------+----------+-----------------+
-- |  1 | TV001 | Toshiba         |     100000 |     120000 |   11 |       15 |               1 |
-- |  2 | K0001 | Home Kulkas     |     300000 |     320000 |   10 |       12 |               2 |
-- |  3 | C0001 | Blue Jeans      |     120000 |     130000 |    3 |        4 |               4 |
-- |  4 | KM001 | Flanel Kemejaku |      70000 |      80000 |    3 |        5 |               3 |
-- |  5 | TV002 | Dell            |    1000000 |    2000000 |   10 |        5 |               1 |
-- +----+-------+-----------------+------------+------------+------+----------+-----------------+
-- 5 rows in set (0.000 sec)

--kondisi tabel pesanan_items sebelum update
-- +----+-----------+------------+------+---------+
-- | id | produk_id | pesanan_id | qty  | harga   |
-- +----+-----------+------------+------+---------+
-- |  1 |         3 |          1 |    2 | 1234000 |
-- |  2 |         4 |          2 |    5 |   65700 |
-- |  3 |         1 |          2 |    1 |  456000 |
-- +----+-----------+------------+------+---------+
-- 3 rows in set (0.001 sec)

--testing
UPDATE pesanan_items SET qty = 1 WHERE id = 1;


--kondisi tabel produk setelah update
-- +----+-------+-----------------+------------+------------+------+----------+-----------------+
-- | id | kode  | nama            | harga_beli | harga_jual | stok | min_stok | jenis_produk_id |
-- +----+-------+-----------------+------------+------------+------+----------+-----------------+
-- |  1 | TV001 | Toshiba         |     100000 |     120000 |   11 |       15 |               1 |
-- |  2 | K0001 | Home Kulkas     |     300000 |     320000 |   10 |       12 |               2 |
-- |  3 | C0001 | Blue Jeans      |     120000 |     130000 |    4 |        4 |               4 |
-- |  4 | KM001 | Flanel Kemejaku |      70000 |      80000 |    3 |        5 |               3 |
-- |  5 | TV002 | Dell            |    1000000 |    2000000 |   10 |        5 |               1 |
-- +----+-------+-----------------+------------+------------+------+----------+-----------------+
-- 5 rows in set (0.001 sec)

--kondisi tabel pesanan_items setelah update
-- +----+-----------+------------+------+---------+
-- | id | produk_id | pesanan_id | qty  | harga   |
-- +----+-----------+------------+------+---------+
-- |  1 |         3 |          1 |    1 | 1234000 |
-- |  2 |         4 |          2 |    5 |   65700 |
-- |  3 |         1 |          2 |    1 |  456000 |
-- +----+-----------+------------+------+---------+
-- 3 rows in set (0.000 sec)