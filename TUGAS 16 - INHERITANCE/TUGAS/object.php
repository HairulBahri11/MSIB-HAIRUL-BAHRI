<?php

require_once 'lingkaran.php';
require_once 'segitiga.php';
require_once 'persegipanjang.php';

$lingkaran = new Lingkaran(7);
$lingkaran2 = new Lingkaran(14);
$segitiga = new Segitiga(10, 5);
$segitiga2 = new Segitiga(20, 10);
$persegipanjang = new PersegiPanjang(10, 5);
$persegipanjang2 = new PersegiPanjang(20, 10);

$dataBidang = [$lingkaran,$lingkaran2, $segitiga,$segitiga2, $persegipanjang,$persegipanjang2];
foreach ($dataBidang as $bidang) {
    echo "

    <table border='1' cellpadding='10' cellspacing='0' style='margin-top:2%; width:25%'>
        <tr>
            <th>Nama Bidang</th>
            <th>Luas</th>
            <th>Keliling</th>
        </tr>
        <tr>
            <td> ".$bidang->namaBidang()."</td>
            <td> ".$bidang->luas()."</td>
            <td> ".$bidang->keliling()."</td>
        </tr>

    </table>
    
    ";
}




?>