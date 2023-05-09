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

    public function getPelanggan($id)
    {
        $sql = "SELECT pelanggan.*, kartu.nama as kartu FROM pelanggan INNER JOIN kartu ON pelanggan.kartu_id = kartu.id WHERE pelanggan.id = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch();
        return $rs;
    }

    public function simpan($data)
    {
        $sql = "INSERT INTO pelanggan(kode,nama,gender,tmp_lahir,tgl_lahir,email,kartu_id) VALUES (?,?,?,?,?,?,?)";
        $ps = $this->koneksi->prepare($sql);
        var_dump($data);
        $ps->execute($data);
    }

    public function ubah($id)
    {
    }
}
