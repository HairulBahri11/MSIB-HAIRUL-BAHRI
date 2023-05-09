<?php
$dbname = 'dbtoko';
$dsn = 'mysql:dbname=' . $dbname . ';host:localhost';
$user = 'root';
$password = '';
try {
    $dbh = new PDO($dsn, $user . $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "koneksi sukses";
} catch (PDOException $e) {
    echo "database tidak konek" . $e->getMessage();
}
