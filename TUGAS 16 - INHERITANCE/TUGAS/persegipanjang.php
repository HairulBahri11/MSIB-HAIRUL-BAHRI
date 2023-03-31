<?php

require_once 'abstract.php';

class PersegiPanjang extends Bentuk2D{
    private $panjang;
    private $lebar;
    private $namaBidang;

    public function __construct($panjang, $lebar){
        $this->panjang = $panjang;
        $this->lebar = $lebar;
    }

    public function namaBidang(){
        $namaBidangnya = "Persegi Panjang";
        $this->namaBidang = $namaBidangnya;
        return $this->namaBidang;
    }

    public function luas(){
        return $this->panjang * $this->lebar;
    }

    public function keliling(){
        return 2 * ($this->panjang + $this->lebar);
    }
}

?>