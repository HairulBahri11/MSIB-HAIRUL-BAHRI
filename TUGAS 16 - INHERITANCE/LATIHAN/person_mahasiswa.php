<?php
require_once 'person.php';

class Mahasiswa extends Person{
    private $nim;
    private $ipk;
    public function __construct($name, $age, $address,$gender,$hobby, $job, $nim, $ipk){
        //return parameter dari parent
        parent::__construct($name, $age, $address, $gender, $hobby, $job);
        $this->nim = $nim;
        $this->ipk = $ipk;
    }

   public function cetak(){
       parent::cetak();
       echo "NIM : ".$this->nim."<br>";
       echo "IPK : ".$this->ipk."<br> <hr>";
   }
}



?>