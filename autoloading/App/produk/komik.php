<?php 

namespace App\produk;

class Komik extends Produk implements InfoProduk {
    public $halaman;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $halaman = 0) {
        // Memanggil constructor milik parent (Produk)
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->halaman = $halaman;
    }

    // Implementasi method getInfoProduk dari Interface InfoProduk
    public function getInfoProduk() {
        return "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
    }

    // Implementasi abstract method getInfo dari Class Produk
    public function getInfo() {
        $str = "Komik : " . $this->getInfoProduk() . " - {$this->halaman} Halaman.";
        return $str;
    }
}

