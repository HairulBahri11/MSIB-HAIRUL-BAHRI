<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan OOP</title>
</head>

<body>
    <?php
    //Belajar OOP PHP
    //Class
    class Bank
    {
        protected $norek;
        public $nama;
        private $saldo;
        static $jumlah = 0;
        const BANK = "Bank Republik Indonesia";
        public function __construct($norek, $nama, $saldo)
        {
            //this nunjuk dirinya sendiri
            $this->norek = $norek;
            $this->nama = $nama;
            $this->saldo = $saldo;
            //nunjuk classnya sendiri
            self::$jumlah++;
        }

        public function setor($uang)
        {
            $this->saldo += $uang;
        }

        public function tarik($uang)
        {
            $this->saldo -= $uang;
        }

        public function cetak()
        {
            echo "Nama Bank : " . self::BANK . "<br>";
            echo "No Rekening : " . $this->norek . "<br>";
            echo "Nama : " . $this->nama . "<br>";
            echo "Saldo : Rp. " . number_format($this->saldo, 0, ',', '.');
            echo "<hr>";
        }
    }
    //object
    $bank1 = new Bank("123456789", "Rizky", 1000000);
    $bank2 = new Bank("987654321", "Rian", 2000000);
    $bank3 = new Bank("123456789", "Ridho", 3000000);
    $bank4 = new Bank("987654322", "Beni", 4000000);
    $bank1->setor(23000000);
    $bank2->tarik(1000000);

    $databank = [$bank1, $bank2, $bank3, $bank4];
    foreach ($databank as $bank) {
        $bank->cetak();
    }
    echo "Jumlah Nasabah : " . Bank::$jumlah;


    ?>
</body>

</html>