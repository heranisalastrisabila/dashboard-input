<?php
require_once __DIR__ . '/../connect.php';

$id       = (int)$_POST['id_produk'];
$nama     = $_POST['nama_produk'];
$harga    = (int)$_POST['harga'];
$stok     = (int)$_POST['stok'];
$kategori = $_POST['kategori'];

if (!empty($_FILES['gambar']['name'])) {
    // pilih gambar baru -> ikut diganti
    $gambar = time() . '_' . basename($_FILES['gambar']['name']);
    move_uploaded_file($_FILES['gambar']['tmp_name'], __DIR__ . '/../uploads/' . $gambar);

    $stmt = mysqli_prepare($dbconnect,
        "UPDATE tb_produk SET nama_produk=?, harga=?, stok=?, gambar=?, kategori=? WHERE id_produk=?");
    mysqli_stmt_bind_param($stmt, "siissi", $nama, $harga, $stok, $gambar, $kategori, $id);
} else {
    // tidak pilih gambar -> gambar lama tetap
    $stmt = mysqli_prepare($dbconnect,
        "UPDATE tb_produk SET nama_produk=?, harga=?, stok=?, kategori=? WHERE id_produk=?");
    mysqli_stmt_bind_param($stmt, "siisi", $nama, $harga, $stok, $kategori, $id);
}
mysqli_stmt_execute($stmt);

header('Location: ../index.php?page=produk');
exit();
?>