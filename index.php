<?php
// Load Controller
require_once __DIR__ . '/controllers/AlatController.php';

// Eksekusi Router / Controller Utama
$controller = new AlatController();
$controller->index();