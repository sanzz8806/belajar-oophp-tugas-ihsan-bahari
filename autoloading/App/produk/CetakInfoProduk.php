<?php

namespace App\produk;

class CetakInfoProduk {
    public array $daftarProduk = array();

    public function tambahProduk(Produk $produk) {
        $this->daftarProduk[] = $produk;
    }

    public function cetak() {
        $str = "DAFTAR PRODUK : <br>";

        foreach ($this->daftarProduk as $p) {
            $str .= "- {$p->getInfo()} <br>";
        }

        return $str;
    }
}