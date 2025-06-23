<?php
// Konfigurasi Database
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'toko_lebaran');

// Konfigurasi Website
define('SITE_NAME', 'Toko Lebaran');
define('SITE_URL', 'http://localhost/toko-lebaran');
define('CONTACT_PHONE', '081234567890');
define('CONTACT_EMAIL', 'info@tokolebaran.com');

// Memulai session
session_start();

// Koneksi ke database
try {
    $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}
?>