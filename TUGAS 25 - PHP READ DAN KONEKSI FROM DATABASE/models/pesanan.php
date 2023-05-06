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
        $sql = "SELECT ps.*, pi.*, p.nama_pelanggan  as nama_pelanggan, pr.nama as nama_produk FROM pesanan as ps JOIN pelanggan as p ON ps.pelanggan_id = p.id 
        JOIN pesanan_items as pi ON pi.pesanan_id = p.id JOIN produk as pr ON pi.produk_id = pr.id";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        
        return $rs;
    }
}
