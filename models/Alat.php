<?php
class Alat {
    private $id;
    private $nama;
    private $kategori;
    private $deskripsi;
    private $lokasi;
    private $harga;
    private $status;
    private $gambar;

    public function __construct($id, $nama, $kategori, $deskripsi, $lokasi, $harga, $status, $gambar) {
        $this->id = $id;
        $this->nama = $nama;
        $this->kategori = $kategori;
        $this->deskripsi = $deskripsi;
        $this->lokasi = $lokasi;
        $this->harga = $harga;
        $this->status = $status;
        $this->gambar = $gambar;
    }

    // Getter Methods
    public function getId() { return $this->id; }
    public function getNama() { return $this->nama; }
    public function getKategori() { return $this->kategori; }
    public function getDeskripsi() { return $this->deskripsi; }
    public function getLokasi() { return $this->lokasi; }
    public function getHarga() { return $this->harga; }
    public function getHargaFormatted() { return 'Rp' . number_format($this->harga, 0, ',', '.') . '/hari'; }
    public function getStatus() { return $this->status; }
    public function getGambar() { return $this->gambar; }

    // Simulasi pengambilan seluruh data alat
    public static function getAll() {
        return [
            new Alat(1, 'Bor Tangan', 'Bor', 'Cocok untuk pekerjaan pengeboran ringan hingga sedang.', 'Malang', 50000, 'Tersedia', 'assets/images/bor.jpg'),
            new Alat(2, 'Gerinda', 'Potong', 'Digunakan untuk memotong atau menghaluskan material.', 'Malang', 45000, 'Tersedia', 'assets/images/gerinda.jpg'),
            new Alat(3, 'Tangga', 'Tinggi', 'Membantu pekerjaan bangunan di area yang lebih tinggi.', 'Malang', 35000, 'Tersedia', 'assets/images/tangga.jpg'),
            new Alat(4, 'Palu', 'Tangan', 'Alat tangan untuk pekerjaan pemasangan dan perbaikan.', 'Malang', 20000, 'Tersedia', 'assets/images/palu.jpg'),
            new Alat(5, 'Toolbox', 'Tangan', 'Perlengkapan untuk menyimpan berbagai alat kerja.', 'Malang', 30000, 'Tersedia', 'assets/images/toolbox.jpg'),
            new Alat(6, 'Gerobak', 'Lainnya', 'Membantu memindahkan material dan perlengkapan.', 'Malang', 40000, 'Tersedia', 'assets/images/gerobak.jpg')
        ];
    }
}