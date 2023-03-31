<?php

require_once 'person.php';

class Staff extends Person
{
    private $nip;
    private $jabatan;
    public function __construct($name, $age, $address, $gender, $hobby, $job, $nip, $jabatan)
    {
        parent::__construct($name, $age, $address, $gender, $hobby, $job);
        $this->nip = $nip;
        $this->jabatan = $jabatan;
    }

    public function cetak()
    {
        parent::cetak();
        echo "NIP : " . $this->nip . "<br>";
        echo "Jabatan : " . $this->jabatan . "<br> <hr>";
    }
}
