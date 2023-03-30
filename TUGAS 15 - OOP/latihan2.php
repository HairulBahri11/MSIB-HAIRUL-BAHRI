<?php
class Gempa{
    
    private $magnitude;
    private $wilayah;


    public function __construct($magnitude , $wilayah){
        $this->magnitude = $magnitude;
        $this->wilayah = $wilayah;
    }

    public function dampak($magnitude){
        $this->magnitude = $magnitude;
        if($magnitude >= 5.0){
            $dampaknya = "Gempa berpotensi tsunami";
        }else{
            $dampaknya = "Gempa tidak berpotensi tsunami";
        }
        return $dampaknya;
    }

    public function cetak(){
        echo "Magnitude : " . $this->magnitude . "<br>";
        echo "Wilayah : " . $this->wilayah . "<br>";
        echo "Dampak : " .$this->dampak($this->magnitude);
        
        echo "<hr>";

    }

}
$gempa1 = new Gempa(5.5 , "Jawa Timur");
$gempa2 = new Gempa(4.5 , "Jawa Barat");
$gempa3 = new Gempa(3.5 , "Jawa Tengah");
$gempa4 = new Gempa(2.5 , "Bali");

$dataGempa = [$gempa1 , $gempa2 , $gempa3 , $gempa4];
foreach($dataGempa as $gempa){
    $gempa->cetak();
}

?>