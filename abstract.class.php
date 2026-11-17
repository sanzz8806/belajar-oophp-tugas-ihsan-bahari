<?php

// 1. Parent Class (Abstract Class)
abstract class Produk {
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
        // Menghitung harga setelah potongan diskon
        return $this->harga - ($this->harga * $this->diskon / 100);
    }

    // Method dasar untuk mengambil label penulis & penerbit
    public function getLabel() {
        return "{$this->penulis}, {$this->penerbit}";
    }

    // Abstract Method: Hanya berupa deklarasi tanpa body ({})
    // Wajib diimplementasikan ulang oleh seluruh kelas turunan!
    abstract public function getInfoProduk();

    // Method helper untuk mengambil informasi dasar produk
    public function getInfo() {
        $str = "{$this->judul} | {$this->getLabel()} (Rp. " . number_format($this->harga, 0, ',', '.') . ")";
        return $str;
    }
}


// 2. Child Class: Komik
class Komik extends Produk {
    public $jmlHalaman;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0) {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->jmlHalaman = $jmlHalaman;
    }

    // Implementasi abstract method getInfoProduk()
    public function getInfoProduk() {
        $str = "Komik : " . $this->getInfo() . " - {$this->jmlHalaman} Halaman.";
        return $str;
    }
}


// 3. Child Class: Game
class Game extends Produk {
    public $waktuMain;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $waktuMain = 0) {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->waktuMain = $waktuMain;
    }

    // Implementasi abstract method getInfoProduk()
    public function getInfoProduk() {
        $str = "Game : " . $this->getInfo() . " ~ {$this->waktuMain} Jam.";
        return $str;
    }
}


// 4. Class CetakInfoProduk
class CetakInfoProduk {
    public array $daftarProduk = array();

    public function tambahProduk(Produk $produk) {
        $this->daftarProduk[] = $produk;
    }

    public function cetak() {
        $str = "DAFTAR PRODUK : <br>";

        foreach ($this->daftarProduk as $p) {
            $str .= "- {$p->getInfoProduk()} <br>";
        }

        return $str;
    }
}


// 5. Instansiasi Objek & Pengujian
$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer", 250000, 50);

// Instansiasi Class Cetak
$cetakProduk = new CetakInfoProduk();

// Menambahkan produk ke daftar
$cetakProduk->tambahProduk($produk1);
$cetakProduk->tambahProduk($produk2);

// Cetak daftar produk
echo $cetakProduk->cetak();

?>