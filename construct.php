<?php
class produk {
    public $judul,
           $penulis,
           $tahunterbi,
           $harga;
           
           public function __construct( $judul="judul",$penulis="penulis",$tahunterbit="tahunterbit",$harga="0"){
           
            $this->judul = $judul;
            $this->penulis = $penulis;
            $this->tahunterbit = $tahunterbit;
            $this->harga = $harga;
            }
           




           public function getlabel() {
            return "$this->penulis,$this->tahunterbit";
           }

}

$produk1 = new produk("slank","yambe","1998","839383");

$produk2 = new produk("iwanfls","romatika","1967","9399393");


echo "komik: ". $produk1->getlabel();
echo "<br>";
echo "book: ". $produk2->getlabel();
