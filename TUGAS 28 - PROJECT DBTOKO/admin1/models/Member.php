<?php

class Member{
    private $koneksi;
    public function __construct()
    {
        global $dbh; //instance object koneksi.php
        $this->koneksi = $dbh;
    }

    public function cekLogin($data)
    {
        $sql = "SELECT * FROM member WHERE username = ? AND password = SHA1(MD5(?))";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
        $rs = $ps->fetch();
        return $rs;
    }

    public function dataMember()
    {
        $sql = "SELECT * FROM member";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }
}


?>