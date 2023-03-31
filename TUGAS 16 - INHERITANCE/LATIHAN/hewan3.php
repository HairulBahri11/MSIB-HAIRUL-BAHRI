<?php

require_once 'abstract.php';
class Ular extends Hewan
{
    public function suara()
    {
        return "Suara Ular : Hiss <br>";
    }

    public function makanan()
    {
        return "Makanan Ular : Tikus <br>";
    }

    public function jenis(){
        return "Ular termasuk hewan reptil <br>";
    }

    public function kaki(){
        return "Ular tidak memiliki kaki <br> <hr>";
    }
}
?>