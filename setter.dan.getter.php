<?php

// 1. Parent Class (Kelas Induk)
class Produk {
    private $judul,
            $penulis,
            $penerbit,
            $harga;
           
    protected $diskon = 0;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    // Setter & Getter untuk Judul
    public function setJudul($judul) {
        if (!is_string($judul)) {
            throw new Exception("Judul harus berupa string!");
        }
        $this->judul = $judul;
    }

    public function getJudul() {
        return $this->judul;
    }

    // Setter & Getter untuk Penulis
    public function setPenulis($penulis) {
        $this->penulis = $penulis;
    }

    public function getPenulis() {
        return $this->penulis;
    }

    // Setter & Getter untuk Penerbit
    public function setPenerbit($penerbit) {
        $this->penerbit = $penerbit;
    }

    public function getPenerbit() {
        return $this->penerbit;
    }

    // Setter & Getter untuk Diskon
    public function setDiskon($diskon) {
        $this->diskon = $diskon;
    }

    public function getDiskon() {
        return $this->diskon;
    }
    
    // Setter & Getter untuk Harga
    public function setHarga($harga) {
        $this->harga = $harga;
    }
    
    public function getHarga() {
        return $this->harga - ($this->harga * $this->diskon / 100);
    }

    // Method dasar untuk mengambil label penulis & penerbit
    public function getLabel() {
        return "{$this->penulis}, {$this->penerbit}";
    }

    // Method dasar info produk (di-override oleh child class)
    public function getInfoProduk() {
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
        return $str;
    }
}


// 2. Child Class: Komik
class Komik extends Produk {
    public $jmlHalaman;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0) {
        // Overriding Constructor
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->jmlHalaman = $jmlHalaman;
    }

    // Overriding Method getInfoProduk()
    public function getInfoProduk() {
        $str = "Komik : " . parent::getInfoProduk() . " - {$this->jmlHalaman} Halaman.";
        return $str;
    }
}


// 3. Child Class: Game
class Game extends Produk {
    public $waktuMain;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $waktuMain = 0) {
        // Overriding Constructor
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->waktuMain = $waktuMain;
    }

    // Overriding Method getInfoProduk()
    public function getInfoProduk() {
        $str = "Game : " . parent::getInfoProduk() . " ~ {$this->waktuMain} Jam.";
        return $str;
    }
}


// 4. Class CetakInfoProduk (Object Type)
class CetakInfoProduk {
    public function cetak(Produk $produk) {
        $str = "{$produk->getJudul()} | {$produk->getLabel()} (Rp. {$produk->getHarga()})";
        return $str;
    }
}


// 5. Instansiasi Objek
$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer", 250000, 50);


// Output Hasil
echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
echo "<hr>";

// Uji coba Setter & Getter Diskon
$produk2->setDiskon(50);
echo "Harga Uncharted setelah diskon 50%: Rp. " . $produk2->getHarga();
echo "<hr>";

// Uji coba Setter & Getter Judul
$produk1->setJudul("Boruto");
echo "Judul produk1 diubah menjadi: " . $produk1->getJudul();

?>