<?php
// ================================================
//  GET - Ambil semua data barang
//  Method : GET
//  URL    : /get_barang.php
// ================================================

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(["status" => "error", "message" => "Metode tidak diizinkan"]);
    exit();
}

include 'koneksi.php';

$sql    = "SELECT * FROM barang ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

if (!$result) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Query gagal: " . mysqli_error($conn)]);
    exit();
}

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

http_response_code(200);
echo json_encode($data);

mysqli_close($conn);
?>
