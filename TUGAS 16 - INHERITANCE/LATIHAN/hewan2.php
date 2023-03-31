<?php

require_once 'abstract.php';

//membuat kelas turunan dari kelas Hewan
class Ayam extends Hewan {

    public function suara() {
        return "Suara Ayam : Kukuruyuk <br>";
    }

    public function makanan() {
        return "Makanan Ayam : Biji-bijian <br>";
    }

    public function jenis() {
        return "Ayam termasuk hewan unggas <br>";
    }

    public function kaki() {
        return "Ayam memiliki 2 kaki <br> <hr>";
    }
}
