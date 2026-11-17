<?php
// 1. Kelas Utama
class Produk {
    public $judul,
           $penulis,
           $tahunterbit,
           $harga,
           $jmlhalaman, // Diperbaiki dari $jumlhlaman
           $waktumain,
           $type;

    // Parameter $type digeser ke depan atau diberi nilai default agar tidak error
    public function __construct($type = "produk", $judul = "judul", $penulis = "penulis", $tahunterbit = "tahunterbit", $harga = 0, $jmlhalaman = 0, $waktumain = 0) {
        $this->type = $type;
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->tahunterbit = $tahunterbit;
        $this->harga = $harga;
        $this->jmlhalaman = $jmlhalaman;
        $this->waktumain = $waktumain;
    }

    public function getLabel() {
        return "{$this->penulis}, {$this->tahunterbit}";
    }

    public function getinfolengkap () {
        // Perbaikan {this->judul} -> {$this->judul}
        $str = "{$this->type} : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
        
        if($this->type == "komik") {
            // Perbaikan operator = menjadi .= agar string tidak tertimpa
            $str .= " - {$this->jmlhalaman} halaman.";
        } else if ($this->type == "game") {
            $str .= " ~ {$this->waktumain} jam.";
        }

        return $str;
    }
}

// 2. Kelas Terpisah untuk Cetak Info (Object Type Constraint)
class CetakInfoProduk {
    public function cetak(Produk $produk) {
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
        return $str;
    }
}

// 3. Instansiasi Objek Produk (Menambahkan parameter $type di awal)
$produk1 = new Produk("komik", "rumahhantu", "Yambe", "1998", "30000", 100, 0);
$produk2 = new Produk("game", "freefire", "sakai", "2014", "1000000", 0, 50);

echo $produk1->getinfolengkap();
echo "<br>";
echo $produk2->getinfolengkap();
echo "<br>";

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