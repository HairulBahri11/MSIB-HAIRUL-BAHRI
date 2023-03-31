<?php

require_once 'person_dosen.php';
require_once 'person_mahasiswa.php';
require_once 'person_staff.php';

$dosen1 = new Dosen("Rizal", 25, "Jl. Kebon Jeruk", "Laki-laki", "Membaca", "Dosen", "DS-001", "987654321");
$dosen2 = new Dosen("Rizma", 25, "Jl. Kebon Kelapa", "Perempuan", "Menulis", "Dosen", "DS-002", "987654322");
$mahasiswa1 = new Mahasiswa("Rizky", 20, "Jl. Cikutra", "Laki-laki", "Membaca", "Mahasiswa", "E41200988", 3.5);
$mahasiswa2 = new Mahasiswa("Hairul", 21, "Jl. Cikungunya", "Laki-laki", "Musik", "Mahasiswa", "E41200983", 4.0);
$staff1 = new Staff("Rian", 30, "Jl. Kebon Jeruk", "Laki-laki", "Membaca", "Staff", "ST-001", "TKK A");
$staff2 = new Staff("Ratu", 34, "Jl. Kebon Mangga", "Perempuan", "Menulis", "Staff", "ST-002", "TKK B");

$dataPerson = [$dosen1,$dosen2,$mahasiswa1, $mahasiswa2, $staff1, $staff2];
foreach ($dataPerson as $person) {
    $person->cetak();
}


?>