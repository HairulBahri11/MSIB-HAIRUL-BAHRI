<?php

error_reporting(0);
$ar_prodi = ["SI" => "Sistem Informasi", "TI" => "Teknik Informatika", "ILKOM" => "Ilmu Komputer", "TE" => "Teknik Elektro"];
$ar_skill = ["HTML" => 10, "CSS" => 10, "Javascript" => 20, "RWD Bootstrap" => 20, "PHP" => 30, "MySQL" => 30, "Laravel" => 30];


if (isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $name = $_POST['name'];
    $jk = $_POST['jk'];
    $prodi = $_POST['prodi'];
    $skill = $_POST['skill'];
    $email = $_POST['email'];



function myskill()
{
    $skillku = "";
    $skill = $_POST['skill'];
    foreach ($skill as $s) {
        $skillku .= $s . " ";
    }

    return $skillku;
}



function myskor(){
    $skor = 0;
    $skill = $_POST['skill'];
    foreach ($skill as $s) {
        if ($s == "HTML" || $s == "CSS") {
            $skor += 10;
        } elseif ($s == "Javascript" || $s == "RWD Bootstrap") {
            $skor += 20;
        } elseif ($s == "PHP" || $s == "MySQL") {
            $skor += 30;
        } elseif ($s == "Laravel") {
            $skor += 30;
        } else {
            $skor += 0;
        }
    }
    return $skor;
}


function kategori_skill()
{
    $skor = myskor();
    $kategori = "";
    if ($skor >= 101 && $skor <= 150) {
        $kategori = "Sangat Baik";
    } elseif ($skor >= 61 && $skor <= 100) {
        $kategori = "Baik";
    } elseif ($skor >= 41 && $skor <= 60) {
        $kategori = "Cukup";
    } elseif ($skor >= 1 && $skor <= 40) {
        $kategori = "Kurang";
    } else {
        $kategori = "Tidak Memadai";
    }
    return $kategori;
}

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
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
                <h5 class="text-center">MY ROOMATE</h5>
                <form class="mt-5" method="POST" action="">
                    <div class="mb-3 row">
                        <label for="input" class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-10">
                            <input type="text" name="nim" class="form-control " id="nim" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control name" id="name" required>
                        </div>
                    </div>
                    <div class="mb-3 row">

                        <label for="input" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <input type="radio" id="L" name="jk" value="L" required />
                            <label for="L">L</label><br>
                            <input type="radio" id="P" name="jk" value="P" required />
                            <label for="P" for="P">P</label><br>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input" class="col-sm-2 col-form-label">Prodi</label>
                        <div class="col-sm-10">
                            <select name="prodi" id="prodi" class="form-control" required>
                                <option value="">--- Pilih Prodi ---</option>
                                <?php foreach ($ar_prodi as $kode => $nama_prodi) { ?>
                                    <option value="<?php echo $kode; ?>"><?php echo $nama_prodi; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                   

                    <div class="mb-3 row">
                        <label for="input" class="col-sm-2 col-form-label anak">Skill</label>
                        <div class="col-sm-10">
                            <?php foreach ($ar_skill as $skill => $s) { ?>
                                <input type="checkbox" name="skill[]" class="me-5" id="skill" value="<?= $skill ?>"><?= $skill ?>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control " id="email" required>
                        </div>
                    </div>


                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
                        <button class="btn btn-primary me-md-2 form-control" type="submit" name="submit">Hitung</button>
                    </div>

                    <?php

                    echo "

                    <table class='mt-4'>
                    <tr>
                        <td>NIM</th>
                        <td>:</td>
                        <td>$nim</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Nama</th>
                        <td>:</td>
                        <td>$name</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</th>
                        <td>:</td>
                        <td>$jk</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Prodi</th>
                        <td>:</td>
                        <td>$prodi</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Skill</th>
                        <td>:</td>
                        <td>".myskill()."</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Kategori Skill</th>
                        <td>:</td>
                        <td>". kategori_skill()."</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Email</th>
                        <td>:</td>
                        <td>$email</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Skor</th>
                        <td>:</td>
                        <td>". myskor()."</td>
                        <td></td>
                    </tr>

                </table>
                    ";

                    ?>
            </div>

            </form>

        </div>
    </div>





    </div>


</body>


</html>