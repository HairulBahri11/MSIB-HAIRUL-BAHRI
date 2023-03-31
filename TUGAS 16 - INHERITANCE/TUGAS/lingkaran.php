<?php

require_once 'abstract.php';

class Lingkaran extends Bentuk2D{
    private $jari;
    private $namaBidang;
    private $phi = 3.14;

    public function __construct($jari){
        $this->jari = $jari;
    }

    public function namaBidang(){
        $namaBidangnya = "Lingkaran";
        $this->namaBidang = $namaBidangnya;
        return $this->namaBidang;
    }

    public function luas(){
        return $this->phi * $this->jari * $this->jari;
    }

    public function keliling(){
        return 2 * $this->phi * $this->jari;
    }
    
}
