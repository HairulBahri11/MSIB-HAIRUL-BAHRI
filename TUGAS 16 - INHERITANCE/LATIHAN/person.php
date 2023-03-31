<?php

class Person{
    public $name;
    public $age;
    public $address;
    public $gender;
    public $hobby;
    public $job;

    public function __construct($name,$age,$address,$gender,$hobby,$job){

        $this->name = $name;
        $this->age = $age;
        $this->address = $address;
        $this->gender = $gender;
        $this->hobby = $hobby;
        $this->job = $job;
    }

    public function cetak(){
        echo "Nama : ".$this->name."<br>";
        echo "Umur : ".$this->age."<br>";
        echo "Alamat : ".$this->address."<br>";
        echo "Gender : ".$this->gender."<br>";
        echo "Hobby : ".$this->hobby."<br>";
        echo "Pekerjaan : ".$this->job."<br>";
    }
  
}

?>