<?php

// 1. Interface InfoProduk
// Interface hanya berisi deklarasi method tanpa implementasi (semua method public)
interface InfoProduk {
    public function getInfoProduk();
}


// 2. Abstract Class Produk
abstract class Produk {
    protected $judul,
              $penulis,
              $penerbit,
              $harga,
              $diskon = 0;

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

    // Abstract method atau helper untuk info dasar produk
    abstract public function getInfo();
}


// 3. Child Class: Komik
// Meng-extends Produk dan meng-implements interface InfoProduk
class Komik extends Produk implements InfoProduk {
    public $jmlHalaman;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0) {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->jmlHalaman = $jmlHalaman;
    }

    public function getInfo() {
        $str = "{$this->judul} | {$this->getLabel()} (Rp. " . number_format($this->harga, 0, ',', '.') . ")";
        return $str;
    }

    // Wajib mengimplementasikan method dari interface InfoProduk
    public function getInfoProduk() {
        $str = "Komik : " . $this->getInfo() . " - {$this->jmlHalaman} Halaman.";
        return $str;
    }
}


// 4. Child Class: Game
// Meng-extends Produk dan meng-implements interface InfoProduk
class Game extends Produk implements InfoProduk {
    public $waktuMain;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $waktuMain = 0) {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->waktuMain = $waktuMain;
    }

    public function getInfo() {
        $str = "{$this->judul} | {$this->getLabel()} (Rp. " . number_format($this->harga, 0, ',', '.') . ")";
        return $str;
    }

    // Wajib mengimplementasikan method dari interface InfoProduk
    public function getInfoProduk() {
        $str = "Game : " . $this->getInfo() . " ~ {$this->waktuMain} Jam.";
        return $str;
    }
}


// 5. Class CetakInfoProduk
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


// 6. Instansiasi Objek & Pengujian
$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer", 250000, 50);

// Instansiasi Class Cetak
$cetakProduk = new CetakInfoProduk();

// Memanggil method tambahProduk
$cetakProduk->tambahProduk($produk1);
$cetakProduk->tambahProduk($produk2);

// Cetak daftar produk
echo $cetakProduk->cetak();

?>