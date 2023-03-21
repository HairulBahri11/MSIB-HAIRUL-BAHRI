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
        <div class="col-lg-4">
        </div>
        <div class="col-lg-4">
            <div class="konten mt-5">
                <h5 class="text-center">JAJAR GENJANG</h5>
                <form class="mt-5" method="POST" action="">
                    <div class="mb-3 row">
                        <label for="input" class="col-sm-2 col-form-label">a</label>
                        <div class="col-sm-10">
                            <input type="number" name="input1" class="form-control" id="input1">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input" class="col-sm-2 col-form-label">b</label>
                        <div class="col-sm-10">
                            <input type="number" name="input2" class="form-control" id="input2">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input" class="col-sm-2 col-form-label">t</label>
                        <div class="col-sm-10">
                            <input type="number" name="input3" class="form-control" id="input2">
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
                        <button class="btn btn-primary me-md-2 form-control" type="submit" name="submit">Hitung</button>
                    </div>
                    
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    $a = $_POST['input1'];
                    $b = $_POST['input2'];
                    $t = $_POST['input3'];
                    $luas = $a * $t;
                    $keliling = 2 * ($a + $b);
                    echo "<br>";
                    echo "a = ", $a, "<br>";
                    echo "b = ", $b, "<br>";
                    echo "t = ", $t, "<br>";
                    echo ("Luas Jajar Genjang = " . $a . " x " . $t . " = " . $luas . "<br>");
                    echo ("Keliling Jajar Genjang = " . "2(" . $a . " + " . $b . ")" . " = " . $keliling . "<br>");
                
                }
                ?>
            </div>
        </div>
    </div>


</body>


</html>