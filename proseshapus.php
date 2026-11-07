<?php
require_once __DIR__ . '/../connect.php';

$id = (int)$_GET['id'];

$stmt = mysqli_prepare($dbconnect, "DELETE FROM tb_produk WHERE id_produk = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

header('Location: ../index.php?page=produk');
exit();
?>