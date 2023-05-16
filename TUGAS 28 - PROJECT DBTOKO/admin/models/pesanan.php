<?php
// include 'koneksi.php';
class Pesanan
{
    private $koneksi;
    public function __construct()
    {
        global $dbh; //instance object koneksi.php
        $this->koneksi = $dbh;
    }

    public function dataPesanan()
    {
        $sql = "SELECT ps.id as id_pesanan, ps.*, pi.*, p.nama  as nama_pelanggan, pr.nama as nama_produk FROM pesanan as ps JOIN pelanggan as p ON ps.pelanggan_id = p.id 
        JOIN pesanan_items as pi ON pi.pesanan_id = p.id JOIN produk as pr ON pi.produk_id = pr.id";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }

    public function getPesanan($id)
    {
        $sql = "SELECT ps.id as id_pesanan, ps.*, pi.*, p.nama  as nama_pelanggan, pr.nama as nama_produk FROM pesanan as ps JOIN pelanggan as p ON ps.pelanggan_id = p.id 
        JOIN pesanan_items as pi ON pi.pesanan_id = p.id JOIN produk as pr ON pi.produk_id = pr.id WHERE ps.id = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch();
        return $rs;
    }

    public function simpan($data)
    {
        $sql = "INSERT INTO pesanan(tanggal,total,pelanggan_id) VALUES (?,?,?)";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function ubah($data)
    {
        $sql = "UPDATE pesanan SET tanggal = ?,total = ?,pelanggan_id = ?  WHERE id = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM pesanan WHERE id = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
    }
}
