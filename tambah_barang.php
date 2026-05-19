<?php
// ================================================
//  POST - Tambah data barang baru
//  Method : POST
//  URL    : /tambah_barang.php
//  Body   : JSON { nama_barang, kategori, harga, stok }
// ================================================

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(["status" => "error", "message" => "Metode tidak diizinkan"]);
    exit();
}

include 'koneksi.php';

$input = json_decode(file_get_contents("php://input"), true);

// Validasi
if (
    empty($input['nama_barang']) ||
    empty($input['kategori'])   ||
    !isset($input['harga'])     ||
    !isset($input['stok'])
) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Semua field wajib diisi"]);
    exit();
}

$nama_barang = mysqli_real_escape_string($conn, trim($input['nama_barang']));
$kategori    = mysqli_real_escape_string($conn, trim($input['kategori']));
$harga       = floatval($input['harga']);
$stok        = intval($input['stok']);

$sql = "INSERT INTO barang (nama_barang, kategori, harga, stok)
        VALUES ('$nama_barang', '$kategori', '$harga', '$stok')";

if (mysqli_query($conn, $sql)) {
    http_response_code(201);
    echo json_encode([
        "status"  => "success",
        "message" => "Barang berhasil ditambahkan",
        "id"      => mysqli_insert_id($conn)
    ]);
} else {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Gagal menambahkan: " . mysqli_error($conn)]);
}

mysqli_close($conn);
?>
