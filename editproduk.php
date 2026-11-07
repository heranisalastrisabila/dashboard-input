<<?php
$id = (int)($_GET['id'] ?? 0);

$stmt = mysqli_prepare($dbconnect, "SELECT * FROM tb_produk WHERE id_produk = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$tampil = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

if (!$tampil) {
    echo "<h2>Produk tidak ditemukan</h2>";
    return;
}
?>
<h1 class="h2">Edit Produk</h1>
<hr>

<form action="pages/prosesedit.php" method="POST" style="max-width: 600px;">
    <input type="hidden" name="id_produk" value="<?= (int)$tampil['id_produk']; ?>">

    <div class="mb-3">
        <label class="form-label">Nama Produk</label>
        <input type="text" name="nama_produk" class="form-control" required value="<?= e($tampil['nama_produk']); ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Harga</label>
        <input type="number" name="harga" class="form-control" min="0" required value="<?= (int)$tampil['harga']; ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Stok</label>
        <input type="number" name="stok" class="form-control" min="0" required value="<?= (int)$tampil['stok']; ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Gambar (link / nama file)</label>
        <input type="text" name="gambar" class="form-control" value="<?= e($tampil['gambar']); ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Kategori</label>
        <input type="text" name="kategori" class="form-control" value="<?= e($tampil['kategori']); ?>">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="index.php?page=produk" class="btn btn-secondary">Batal</a>
</form>