<?php

require_once 'abstract.php';

//membuat kelas turunan dari kelas Hewan
class Kucing extends Hewan
{
    //membuat method suara
    public function suara()
    {
        return "Suara Kucing : Meong <br>";
    }

    public function makanan()
    {
        return "Makanan Kucing : Ikan <br>";
    }

    public function jenis(){
        return "Kucing termasuk hewan mamalia <br>";
    }

    public function kaki(){
        return "Kucing memiliki 4 kaki <br> <hr>";
    }
}


?>