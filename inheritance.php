<?php

// 1. Parent Class (Kelas Induk)
class Produk {
    public $judul,
           $penulis,
           $tahunterbit,
           $harga;

    // Parameter hanya untuk properti umum
    public function __construct($judul = "judul", $penulis = "penulis", $tahunterbit = "tahunterbit", $harga = 0) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->tahunterbit = $tahunterbit;
        $this->harga = $harga;
    }

    public function getLabel() {
        return "{$this->penulis}, {$this->tahunterbit}";
    }

    // Method umum yang nanti di-override oleh child class
    public function getInfoProduk() {
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
        return $str;
    }
}


// 2. Child Class: Komik (Mewarisi sifat Produk)
class Komik extends Produk {
    public $jmlhalaman;

    public function __construct($judul = "judul", $penulis = "penulis", $tahunterbit = "tahunterbit", $harga = 0, $jmlhalaman = 0) {
        // Memanggil constructor milik class Produk (Parent)
        parent::__construct($judul, $penulis, $tahunterbit, $harga);
        $this->jmlhalaman = $jmlhalaman;
    }

    // Overriding method getInfoProduk khusus Komik
    public function getInfoProduk() {
        $str = "Komik : " . parent::getInfoProduk() . " - {$this->jmlhalaman} halaman.";
        return $str;
    }
}


// 3. Child Class: Game (Mewarisi sifat Produk)
class Game extends Produk {
    public $waktumain;

    public function __construct($judul = "judul", $penulis = "penulis", $tahunterbit = "tahunterbit", $harga = 0, $waktumain = 0) {
        // Memanggil constructor milik class Produk (Parent)
        parent::__construct($judul, $penulis, $tahunterbit, $harga);
        $this->waktumain = $waktumain;
    }

    // Overriding method getInfoProduk khusus Game
    public function getInfoProduk() {
        $str = "Game : " . parent::getInfoProduk() . " ~ {$this->waktumain} jam.";
        return $str;
    }
}


// 4. Class Terpisah untuk Cetak Info (Object Type Constraint)
class CetakInfoProduk {
    public function cetak(Produk $produk) {
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
        return $str;
    }
}


// 5. Instansiasi Objek (Menggunakan Child Class langsung)
$produk1 = new Komik("rumahhantu", "Yambe", "1998", 30000, 100);
$produk2 = new Game("freefire", "sakai", "2014", 1000000, 50);

// Mencetak Info Produk Spesifik (Menggunakan Method di Child Class)
echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
echo "<br><br>";

// Output Label Sederhana
echo "komik: " . $produk1->getLabel();
echo "<br>";
echo "game: " . $produk2->getLabel();
echo "<br><br>";

// Penggunaan CetakInfoProduk
$infoProduk1 = new CetakInfoProduk();

echo "Info Produk 1: " . $infoProduk1->cetak($produk1);
echo "<br>";
echo "Info Produk 2: " . $infoProduk1->cetak($produk2);

?>