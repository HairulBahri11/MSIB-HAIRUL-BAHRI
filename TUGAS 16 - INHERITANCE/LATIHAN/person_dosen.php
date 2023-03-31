<?php

require_once 'person.php';

class Dosen extends Person   
{
    private $nip;
    private $nidn;
    public function __construct($name, $age, $address, $gender, $hobby, $job, $nip, $nidn)
    {
        parent::__construct($name, $age, $address, $gender, $hobby, $job);
        $this->nip = $nip;
        $this->nidn = $nidn;
        
    }

    public function cetak()
    {
        parent::cetak();
        echo "NIP : ".$this->nip."<br>";
        echo "NIDN : ".$this->nidn."<br> <hr>";
    }
}

?>