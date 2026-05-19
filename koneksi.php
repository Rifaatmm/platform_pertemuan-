<?php
// ================================================
//  KONFIGURASI KONEKSI DATABASE
//  Sesuaikan dengan konfigurasi lokal kamu
// ================================================

define('DB_HOST', 'localhost');
define('DB_USER', 'root');       // Ganti jika berbeda
define('DB_PASS', '');           // Ganti jika menggunakan password
define('DB_NAME', 'platform31_crud');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$conn) {
    http_response_code(500);
    echo json_encode([
        "status"  => "error",
        "message" => "Koneksi database gagal: " . mysqli_connect_error()
    ]);
    exit();
}

mysqli_set_charset($conn, "utf8mb4");
?>
