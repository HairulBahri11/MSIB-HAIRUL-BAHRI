<?php

require_once 'abstract.php';

class Segitiga extends Bentuk2D{
    private $alas;
    private $tinggi;
    private $namaBidang;

    public function __construct($alas, $tinggi){
        $this->alas = $alas;
        $this->tinggi = $tinggi;
    }

    public function namaBidang(){
        $namaBidangnya = "Segitiga";
        $this->namaBidang = $namaBidangnya;
        return $this->namaBidang;
    }

    public function luas(){
        return 0.5 * $this->alas * $this->tinggi;
    }

    public function keliling(){
        return $this->alas + $this->tinggi + sqrt($this->alas * $this->alas + $this->tinggi * $this->tinggi);
    }
}


?>