<<?php
require_once __DIR__ . '/../connect.php';
if (!is_dir(__DIR__ . '/../uploads')) { mkdir(__DIR__ . '/../uploads', 0777, true); }

$nama     = $_POST['nama_produk'];
$harga    = (int)$_POST['harga'];
$stok     = (int)$_POST['stok'];
$kategori = $_POST['kategori'];
$gambar   = '';

if (!empty($_FILES['gambar']['name'])) {
    $gambar = time() . '_' . basename($_FILES['gambar']['name']);
    move_uploaded_file($_FILES['gambar']['tmp_name'], __DIR__ . '/../uploads/' . $gambar);
}

$stmt = mysqli_prepare($dbconnect,
    "INSERT INTO tb_produk (nama_produk, harga, stok, gambar, kategori) VALUES (?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, "siiss", $nama, $harga, $stok, $gambar, $kategori);
mysqli_stmt_execute($stmt);

header('Location: ../index.php?page=produk');
exit();
?>