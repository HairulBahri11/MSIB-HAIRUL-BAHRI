<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>TUGAS 7</title>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container">
            <!-- Brand/logo -->
            <a class="navbar-brand acitve" href="index.html">Hairul Bahri</a>
            <!-- Links -->
            <ul class="navbar-nav">

            </ul>
        </div>
    </nav>


    <div class="row mt-5">

        <div class="col-lg-3">

        </div>
        <div class="col-lg-6 ">
            
            <?php

            $p1 = array(
                "nim" => "E41200981",
                "nama" => "Arip",
                "nilai" => 90,
                "kelas" => "XII RPL 1"
            );
            $p2 = array(
                "nim" => "E41200982",
                "nama" => "Ali",
                "nilai" => 81,
                "kelas" => "XII RPL 2"
            );
            $p3 = array(
                "nim" => "E41200983",
                "nama" => "Aldi",
                "nilai" => 72,
                "kelas" => "XII RPL 3"
            );
            $p4 = array(
                "nim" => "E41200984",
                "nama" => "Ani",
                "nilai" => 63,
                "kelas" => "XII RPL 4"
            );
            $p5 = array(
                "nim" => "E41200985",
                "nama" => "Budi",
                "nilai" => 50,
                "kelas" => "XII RPL 3"
            );
            $p6 = array(
                "nim" => "E41200986",
                "nama" => "Caca",
                "nilai" => 40,
                "kelas" => "XII RPL 1"
            );
            $p7 = array(
                "nim" => "E41200987",
                "nama" => "Dedi",
                "nilai" => 80,
                "kelas" => "XII RPL 1"
            );
            $p8 = array(
                "nim" => "E41200988",
                "nama" => "Euis",
                "nilai" => 70,
                "kelas" => "XII RPL 2"
            );
            $p9 = array(
                "nim" => "E41200989",
                "nama" => "Fafa",
                "nilai" => 90,
                "kelas" => "XII RPL 3"
            );
            $p10 = array(
                "nim" => "E41200990",
                "nama" => "Gaga",
                "nilai" => 100,
                "kelas" => "XII RPL 1"
            );
            $p11 = array(
                "nim" => "E41200991",
                "nama" => "Hani",
                "nilai" => 90,
                "kelas" => "XII RPL 2"
            );
            $p12 = array(
                "nim" => "E41200992",
                "nama" => "Ika",
                "nilai" => 83,
                "kelas" => "XII RPL 3"
            );
            $p13 = array(
                "nim" => "E41200993",
                "nama" => "Beei",
                "nilai" => 75,
                "kelas" => "XII RPL 4"
            );
            $p14 = array(
                "nim" => "E41200994",
                "nama" => "Heli",
                "nilai" => 89,
                "kelas" => "XII RPL 1"
            );
            $p15 = array(
                "nim" => "E41200995",
                "nama" => "Joko",
                "nilai" => 90,
                "kelas" => "XII RPL 2"
            );
            $p16 = array(
                "nim" => "E41200996",
                "nama" => "Kiki",
                "nilai" => 100,
                "kelas" => "XII RPL 3"
            );
            $p17 = array(
                "nim" => "E41200997",
                "nama" => "Lala",
                "nilai" => 90,
                "kelas" => "XII RPL 4"
            );
            $p18 = array(
                "nim" => "E41200998",
                "nama" => "Mimi",
                "nilai" => 90,
                "kelas" => "XII RPL 1"
            );

            $mahasiswa = [$p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10, $p11, $p12, $p13, $p14, $p15, $p16, $p17, $p18];
            $head = array("No", "NIM", "Nama", "Nilai", "Predikat", "Keterangan", "Status", "Kelas");
            $nilai_tertinggi = max(array_column($mahasiswa, 'nilai'));
            $nilai_terendah = min(array_column($mahasiswa, 'nilai'));
            $rata_rata = array_sum(array_column($mahasiswa, 'nilai')) / count($mahasiswa);
            $jumlah_lulus = count(array_filter($mahasiswa, function ($item) {
                return $item['nilai'] >= 70;
            }));
            $jumlah_gagal = count(array_filter($mahasiswa, function ($item) {
                return $item['nilai'] < 70;
            }));
            $jumlah_kelas = count(array_unique(array_column($mahasiswa, 'kelas')));
            $perhitungan =[
                "Nilai Tertinggi" => $nilai_tertinggi,
                "Nilai Terendah" => $nilai_terendah,
                "Rata - Rata" => $rata_rata,
                "Jumlah Lulus" => $jumlah_lulus,
                "Jumlah Gagal" => $jumlah_gagal,
                "Jumlah Kelas" => $jumlah_kelas
            ];
            ?>
            <table style="text-align: center; width: 100%; font-size: 13px; ">
                <thead>
                    <tr>
                        <?php
                        foreach ($head as $h) {
                            echo "<th bgcolor='darkgrey'>$h</th>";
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($mahasiswa as $p) {
                        $cek = ($p['nilai'] >= 70) ? "Lulus" : "Gagal";
                        if ($p['nilai'] >= 90 && $p['nilai'] <= 100) {
                            $predikat = "A";
                        } else if ($p['nilai'] >= 80 && $p['nilai'] <= 89) {
                            $predikat = "B";
                        } else if ($p['nilai'] >= 70 && $p['nilai'] <= 79) {
                            $predikat = "C";
                        } else if ($p['nilai'] >= 60 && $p['nilai'] <= 69) {
                            $predikat = "D";
                        } else if ($p['nilai'] >= 0 && $p['nilai'] <= 59) {
                            $predikat = "E";
                        }
                        $keterangan;
                        switch ($predikat) {
                            case "A":
                                $keterangan = "Sangat Baik";
                                break;
                            case "B":
                                $keterangan = "Baik";
                                break;
                            case "C":
                                $keterangan = "Cukup";
                                break;
                            case "D":
                                $keterangan = "Kurang";
                                break;
                            case "E":
                                $keterangan = "Sangat Kurang";
                                break;
                        }
                        if ($no % 2 == 1) {
                            $warna = "white";
                        } else {
                            $warna = "lightgrey";
                        }
                        echo "<tr  bgcolor=$warna>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . $p['nim'] . "</td>";
                        echo "<td>" . $p['nama'] . "</td>";
                        echo "<td>" . $p['nilai'] . "</td>";
                        echo "<td>" . $predikat . "</td>";
                        echo "<td>" . $keterangan . "</td>";
                        echo "<td>" . $cek . "</td>";
                        echo "<td>" . $p['kelas'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
                <tfoot>
                    <?php
                    foreach ($perhitungan as $ket => $hasil) {
                    ?>
                        <tr>
                            <th colspan="7" bgcolor="darkgrey"><?= $ket ?></th>
                            <th bgcolor="darkgrey"><?= $hasil ?></th>

                        </tr>
                    <?php } ?>
                </tfoot>
            </table>
        </div>
        <div class="col">
        </div>
    </div>
</body>
</html>

