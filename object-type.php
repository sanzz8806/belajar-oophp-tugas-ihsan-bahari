<?php
// 1. Kelas Utama
class Produk {
    public $judul,
           $penulis,
           $tahunterbit,
           $harga;

    public function __construct($judul = "judul", $penulis = "penulis", $tahunterbit = "tahunterbit", $harga = 0) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->tahunterbit = $tahunterbit;
        $this->harga = $harga;
    }

    public function getLabel() {
        return "$this->penulis, $this->tahunterbit";
    }
}

// 2. Kelas Terpisah untuk Cetak Info (Object Type Constraint)
class CetakInfoProduk {
    public function cetak(Produk $produk) {
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
        return $str;
    }
}

// 3. Instansiasi Objek Produk
$produk1 = new Produk("Slank", "Yambe", "1998", 839383);
$produk2 = new Produk("freefire", "Romatika", "1967", 9399393);

// Output Label Sederhana
echo "komik: " . $produk1->getLabel();
echo "<br>";
echo "game: " . $produk2->getLabel();
echo "<br><br>";

// 4. Instansiasi dan Penggunaan CetakInfoProduk
$infoProduk1 = new CetakInfoProduk();

// Mencetak informasi lengkap produk
echo "Info Produk 1: " . $infoProduk1->cetak($produk1);
echo "<br>";
echo "Info Produk 2: " . $infoProduk1->cetak($produk2);
?>