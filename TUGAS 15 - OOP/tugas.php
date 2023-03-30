<?php
// Lengkapi file Pegawai. php sebagai berikut:

// setTunjab = 20% dari Gaji Pokok
// setTunkel= 10% dari Gaji Pokok untuk sudah menikah (ternary)
// setZakatProfesi= 2,5% dari GajiPokok untuk muslim dan Gaji Kotor minimal 6jt
// mencetak => nip, nama, jabatan, agama, status, Gaji Pokok, Tunj Jab, Tunkel, Zakat, Gaji Bersih 


// Buatlah objPegawai dengan data:

// 5 instance object pegawai
// cetaklah semua struktur gaji pegawai
class pegawai
{
    private $nama;
    private $nip;
    private $status;
    private $agama;
    private $jabatan;
    // private $jumlah; 

    public function __construct($nama, $nip, $jabatan, $status, $agama)
    {
        $this->nama = $nama;
        $this->nip = $nip;
        $this->jabatan = $jabatan;
        $this->status = $status;
        $this->agama = $agama;
        // self::$jumlah++;
    }

    public function setGaji($jabatan)
    {
        $this->jabatan = $jabatan;
        switch ($jabatan) {
            case "Manager":
                $gaji = 10000000;
                break;
            case "Kepala Bagian":
                $gaji = 7000000;
                break;
            case "Supervisor":
                $gaji = 5000000;
                break;
            case "Staff":
                $gaji = 3000000;
                break;
            default:
                $gaji = 0;
        }

        return $gaji;
    }

    public function setTunJab($jabatan)
    {
        $this->jabatan = $jabatan;
        $tunjab = 0.2 * $this->setGaji($this->jabatan);
        return $tunjab;
    }

    public function setTunKel($status)
    {
        $this->status = $status;
        $tunkel = ($status == "Menikah") ? 0.1 * $this->setGaji($this->jabatan) : 0;
        return $tunkel;
    }

    public function setZakatProfesi($agama)
    {
        $this->agama = $agama;
        $zakat = ($agama == "Islam" && $this->setGaji($this->jabatan) >= 6000000) ? 0.025 * $this->setGaji($this->jabatan) : 0;
        return $zakat;
    }


    public function cetak()
    {

        echo "
        Data Pegawai : <br>

            <table border='1' cellpadding='10' cellspacing='0' style='margin-top:2%; width:25%'>
                <tr>
                    <td>NIP</td>
                    <td>:</td>
                    <td>$this->nip</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>$this->nama</td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>:</td>
                    <td>$this->jabatan</td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>:</td>
                    <td>$this->agama</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td>$this->status</td>
                </tr>
                <tr>
                    <td>Gaji Pokok</td>
                    <td>:</td>
                    <td>Rp. " . number_format($this->setGaji($this->jabatan) , 0 , ',' , '.') . "</td>
                </tr>
                <tr>
                    <td>Tunjangan Jabatan</td>
                    <td>:</td>
                    <td>Rp. " . number_format($this->setTunJab($this->jabatan) , 0 , ',' , '.') . "</td>
                </tr>
                <tr>
                    <td>Tunjangan Keluarga</td>
                    <td>:</td>
                    <td>Rp. " . number_format($this->setTunKel($this->status) , 0 , ',' , '.') . "</td>
                </tr>   
                <tr>
                    <td>Zakat Profesi</td>
                    <td>:</td>
                    <td>Rp. " . number_format($this->setZakatProfesi($this->agama) , 0 , ',' , '.') . "</td>
                </tr>
                <tr>
                    <td>Gaji Bersih</td>
                    <td>:</td>
                    <td>Rp. " . number_format($this->setGaji($this->jabatan) + $this->setTunJab($this->jabatan) + $this->setTunKel($this->status) - $this->setZakatProfesi($this->agama) , 0 , ',' , '.') . "</td>
                </tr>
            </table>
        <br>

        ";
    }
}

$pegawai1 = new pegawai("Rizki", "123456789", "Manager", "Menikah", "Islam");
$pegawai2 = new pegawai("Rizma", "987654321", "Supervisor", "Belum Menikah", "Kristen");
$pegawai3 = new pegawai("Rizky", "123456789", "Staff", "Menikah", "Islam");
$pegawai4 = new pegawai("Beni", "987654321", "Manager", "Belum Menikah", "Islam");
$pegawai5 = new pegawai("Budi", "123456789", "Supervisor", "Menikah", "Kristen");

$dataPegawai = [$pegawai1, $pegawai2, $pegawai3, $pegawai4, $pegawai5];
foreach ($dataPegawai as $pegawai) {
    $pegawai->cetak();
}
