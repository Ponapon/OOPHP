<?php 
class Produk {
    public $judul,
           $penulis,
           $penerbit;
    protected $diskon = 0; // di set protected maka class turunan bisa akses 
    private $harga; // di set private maka hanya bisa di akses oleh class Produk saja
           
    public function __construct ($a = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0)
    {
        $this->judul = $a;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    

    public function getHarga(){
        return $this->harga - ( $this->harga * $this->diskon / 100 );
    }

    public function getLabel(){        // method
        return "$this->penulis, $this->penerbit";
    }

    public function getInfoLengkap (){
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga} )";
        return $str;
    }
}

class Komik extends Produk{
    public $jmlHalaman;


    public function __construct($a = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0){
        parent::__construct($a , $penulis, $penerbit  , $harga );
        $this->jmlHalaman = $jmlHalaman;

}

    public function getInfoLengkap(){
        $str = "Komik : " . parent::getInfoLengkap() . " {$this->jmlHalaman} Halaman. "; // harus pakai titik karena ambil class parentnya yaitu Produk
        return $str;
    }
}

class Game extends Produk{
    public $wktMain;

    public function __construct($a = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $wktMain = 0){
        parent::__construct($a , $penulis, $penerbit, $harga );
        $this->wktMain = $wktMain;
        
    }

    public function setDiskon( $diskon){  // setDiskon di taruh di game karena yg boleh diskon hanya game saja 
        $this->diskon = $diskon;
    }
    
    public function getInfoLengkap(){
        $str = "Game : " . parent::getInfoLengkap() . " ~ {$this->wktMain} Jam. "; // harus pakai titik karena ambil class parentnya yaitu Produk
        return $str;
        
    }
}

class CetakInfoProduk {
    public function cetak(Produk $test  /* parameter */){
        $str = "{$test->judul} | {$test->getLabel()} (Rp. {$test->harga} )";
        return $str;
    }
}

$produk1 = new Komik ("Naruto" , "Masashi Kishimoto", "Shonen Jump", 30000, 100);  //object
$produk2 = new Game ("Uncharted" , "Neil Druckmann" , "Sony Computer", 25000, 50); //object
$produk3 = new Produk ("Arifin"); // object 

echo $produk1->getInfoLengkap();
echo "<br>";
echo $produk2->getInfoLengkap();
echo "<br>";
echo $produk3->getInfoLengkap();
echo "<hr>";

$produk2->setDiskon(25);
echo $produk2->getHarga();

?>