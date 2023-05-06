<?php
// include 'koneksi.php';
class Pelanggan
{
    private $koneksi;
    public function __construct()
    {
        global $dbh; //instance object koneksi.php
        $this->koneksi = $dbh;
    }

    public function dataPelanggan()
    {
        $sql = "SELECT pelanggan.*, kartu.nama as kartu FROM pelanggan INNER JOIN kartu ON pelanggan.kartu_id = kartu.id";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }
}
