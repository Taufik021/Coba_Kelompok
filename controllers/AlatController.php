<?php
require_once __DIR__ . '/../models/Alat.php';

class AlatController {
    public function index() {
        // Mengambil data dari Model
        $daftarAlat = Alat::getAll();

        // Meneruskan data ke View
        require_once __DIR__ . '/../views/index.php';
    }
}