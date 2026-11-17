<?php 

namespace App\produk;

class Game extends Produk implements InfoProduk {
    public $waktumain;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $waktumain = 0) {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->waktumain = $waktumain;
    }

    // Implementasi method getInfoProduk dari Interface InfoProduk
    public function getInfoProduk() {
        return "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
    }

    // Implementasi abstract method getInfo dari Class Produk
    public function getInfo() {
        $str = "Game : " . $this->getInfoProduk() . " ~ {$this->waktumain} jam.";
        return $str;
    }
}