<?php

require_once 'App/init.php';

// Import class dari namespace App\produk
use App\produk\Komik;
use App\produk\Game;
use App\produk\CetakInfoProduk;
use App\produk\User as ProdukUser;
use App\service\User as ServiceUser;

// Instansiasi objek Produk
$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer", 250000, 50);

// Instansiasi Class Cetak
$cetakProduk = new CetakInfoProduk();

// Memanggil method tambahProduk
$cetakProduk->tambahProduk($produk1);
$cetakProduk->tambahProduk($produk2);

// Cetak daftar produk
echo $cetakProduk->cetak();

echo "<hr>";

// Tes pemanggilan Namespace User (Poin Utama Video #17)
new ServiceUser();
echo "<br>";
new ProdukUser();