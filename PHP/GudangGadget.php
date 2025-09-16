<?php
class GudangGadget {
    private $id;
    private $nama;
    private $harga;
    private $stok;
    private $kategori;
    private $garansi;
    private $kondisi;
    private $gambar;

    // Constructor
    public function __construct($id, $nama, $harga, $stok, $kategori, $garansi, $kondisi, $gambar) {
        $this->id = $id;
        $this->nama = $nama;
        $this->harga = $harga;
        $this->stok = $stok;
        $this->kategori = $kategori;
        $this->garansi = $garansi;
        $this->kondisi = $kondisi;
        $this->gambar = $gambar;
    }

    // Getter
    public function getId() { return $this->id; }
    public function getNama() { return $this->nama; }
    public function getHarga() { return $this->harga; }
    public function getStok() { return $this->stok; }
    public function getKategori() { return $this->kategori; }
    public function getGaransi() { return $this->garansi; }
    public function getKondisi() { return $this->kondisi; }
    public function getGambar() { return $this->gambar; }

    // Setter
    public function setNama($nama) { $this->nama = $nama; }
    public function setHarga($harga) { $this->harga = $harga; }
    public function setStok($stok) { $this->stok = $stok; }
    public function setKategori($kategori) { $this->kategori = $kategori; }
    public function setGaransi($garansi) { $this->garansi = $garansi; }
    public function setKondisi($kondisi) { $this->kondisi = $kondisi; }
    public function setGambar($gambar) { $this->gambar = $gambar; }
}
?>
