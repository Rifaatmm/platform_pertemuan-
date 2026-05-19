<?php
// ================================================
//  DELETE - Hapus data barang
//  Method : DELETE
//  URL    : /hapus_barang.php
//  Body   : JSON { id }
// ================================================

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'DELETE') {
    http_response_code(405);
    echo json_encode(["status" => "error", "message" => "Metode tidak diizinkan"]);
    exit();
}

include 'koneksi.php';

$input = json_decode(file_get_contents("php://input"), true);

if (empty($input['id'])) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "ID barang wajib disertakan"]);
    exit();
}

$id  = intval($input['id']);
$sql = "DELETE FROM barang WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
    if (mysqli_affected_rows($conn) > 0) {
        http_response_code(200);
        echo json_encode([
            "status"  => "success",
            "message" => "Barang berhasil dihapus"
        ]);
    } else {
        http_response_code(404);
        echo json_encode([
            "status"  => "error",
            "message" => "Data tidak ditemukan"
        ]);
    }
} else {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Gagal menghapus: " . mysqli_error($conn)]);
}

mysqli_close($conn);
?>
