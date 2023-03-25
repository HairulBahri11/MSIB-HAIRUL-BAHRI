<?php
error_reporting(0);
if (isset($_POST['submit'])) {
    $jabatan = '';
    $anak = 0;
    $tunjangan_jabatan = 0;
    $tunjangan_keluarga = 0;
    $tunjangan_zakat = 0;
    $gajipokok = 0;
    $nama = $_POST['name'];
    $jabatan = $_POST['jabatan'];
    $status = $_POST['status'];
    $agama = $_POST['agama'];
    $anak = $_POST['anak'];


    //menentukan gaji pokok
    switch ($jabatan) {
        case 'Manager':
            $gajipokok = 20000000;
            break;
        case 'Asisten':
            $gajipokok = 15000000;
            break;
        case 'Kabag':
            $gajipokok = 10000000;
            break;
        case 'Staff':
            $gajipokok = 4000000;
            break;
    }

    $tunjangan_jabatan = 0.2 * $gajipokok;

    //menentukan tunjangan keluarga
    if ($status == "Menikah" ) {
        if ($anak <= 2) {
            $tunjangan_keluarga = 0.05 * $gajipokok;
        } elseif ($anak > 2 && $anak <= 5) {
            $tunjangan_keluarga = 0.1 * $gajipokok;
        } else {
            $tunjangan_keluarga = 0;
        }
    } else {
        $anak = 0;
        $tunjangan_keluarga = 0;
    }

    //menentukan tunjangan zakat profesi
    $gaji_kotor = $gajipokok + $tunjangan_jabatan + $tunjangan_keluarga;
    $tunjangan_zakat = ($agama == "Islam" && $gaji_kotor >= 6000000) ? $tunjangan_zakat = 0.025 * $gaji_kotor : $tunjangan_zakat = 0;
    
    $take_home_pay = $gaji_kotor - $tunjangan_zakat;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script type="text/javascript" src="jquery-3.6.4.min.js"></script>
    <title>Document</title>
    <script type="text/javascript">
        $(document).ready(function() {
            //membuat form jumlah anak ke hide jika status belum menikah
            $('input.tidakmenikah').click(function() {
                $('input.anak').hide(500);
                $('label.anak').hide(500);

            });
            $('input.menikah').click(function() {
                $('input.anak').show(500);
                $('label.anak').show(500);

            });
            $('input.name').click(function() {
                $('div.hasil').hide(500);
            });


        });
    </script>
    <style>
        .konten {
            border: 1px solid black;
            border-radius: 10px;
            padding: 20px;
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container">
            <!-- Brand/logo -->
            <a class="navbar-brand acitve" href="index.php">Hairul Bahri</a>
            <!-- Links -->
            <ul class="navbar-nav">

            </ul>
        </div>
    </nav>


    <div class="row">
        <div class="col-lg-3">
        </div>
        <div class="col-lg-6">
            <div class="konten mt-5 mb-5">
                <h5 class="text-center">Take Home Pay </h5>
                <form class="mt-5" method="POST" action="">
                    <div class="mb-3 row">
                        <label for="input" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control name" id="name" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input" class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">
                            <select name="jabatan" id="jabatan" class="form-control" required>
                                <option value="">--- Pilih Jabatan ---</option>
                                <option value="Manager">Manager</option>
                                <option value="Asisten">Asisten</option>
                                <option value="Kabag">Kepala Bagian</option>
                                <option value="Staff">Staff</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <input type="radio" id="menikah" name="status" value="Menikah" class="menikah" required />
                            <label for="menikah">Menikah</label><br>
                            <input type="radio" id="tidakmenikah" name="status" value="Belum Menikah" class="tidakmenikah" required/>
                            <label for="tidakmenikah">Belum Menikah</label><br>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input" class="col-sm-2 col-form-label anak">Jumlah Anak</label>
                        <div class="col-sm-10">
                            <input type="number" name="anak" class="form-control anak" id="anak">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input" class="col-sm-2 col-form-label">Agama</label>
                        <div class="col-sm-10">
                            <select name="agama" id="agama" class="form-control">
                                <option value="">--- Pilih Agama---</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
                        <button class="btn btn-primary me-md-2 form-control" type="submit" name="submit">Hitung</button>
                    </div>

                    <div class="hasil">

                        <div class="row">
                            <div class="col-lg-6">
                                <?php
                                echo "<br> <h5>Hasil Inputan :</h5>  <br>";
                                echo "<br> Nama : $nama <br>";
                                echo "<br> Jabatan : $jabatan <br>";
                                echo "<br> Status : $status <br>";
                                echo "<br> Jumlah Anak : $anak <br>";
                                echo "<br> Agama : $agama <br>";
                                

                                ?>

                            </div>
                            <div class="col-lg-6" style="text-align: end;">
                                <?php
                                echo "<br> <h5>Hasil Perhitungan :</h5> <br>";
                                echo "<br> Gaji Pokok : $gajipokok <br>";
                                echo "<br> Tunjangan Jabatan : $tunjangan_jabatan <br>";
                                echo "<br> Tunjangan Keluarga : $tunjangan_keluarga <br>";
                                echo "<br> Tunjangan Zakat : $tunjangan_zakat <br>";
                                echo "<br> Gaji Kotor : $gaji_kotor <br>";
                                ?>
                            </div>

                        </div>

                        <?php
                        echo " <br> <h5 class='text-center'>Take Home Pay : $take_home_pay</h5>";
                        ?>
                    </div>

                </form>

            </div>
        </div>





    </div>


</body>


</html>