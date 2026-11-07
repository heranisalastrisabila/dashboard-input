<?php
$data  = mysqli_query($dbconnect, "SELECT * FROM tb_produk ORDER BY id_produk DESC");
$total = $data ? mysqli_num_rows($data) : 0;
?>
<h1 class="h2">Dashboard</h1>
<hr>
<p>Selamat datang di halaman dashboard.</p>

<div class="card mb-4" style="max-width: 250px;">
    <div class="card-body">
        <div class="text-muted">Total Produk</div>
        <div class="fs-2 fw-bold"><?= (int)$total; ?></div>
    </div>
</div>

<h4>Data Produk</h4>
<a href="index.php?page=tambahproduk" class="btn btn-sm btn-primary mb-3">Add produk</a>

<div class="table-responsive">
    <table class="table table-striped table-sm align-middle">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            if ($data) {
                while ($tampil = mysqli_fetch_assoc($data)) {
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= e($tampil['nama_produk']); ?></td>
                <td>Rp <?= number_format($tampil['harga'], 0, ',', '.'); ?></td>
                <td><?= (int)$tampil['stok']; ?></td>
                <td><?= e($tampil['kategori']); ?></td>
                <td>
                    <a href="index.php?page=editproduk&id=<?= (int)$tampil['id_produk']; ?>"
                       class="btn btn-sm btn-warning">Edit</a>
                    <a href="pages/proseshapus.php?id=<?= (int)$tampil['id_produk']; ?>"
                       onclick="return confirm('Yakin menghapus produk ini?')"
                       class="btn btn-sm btn-danger">Hapus</a>
                </td>
            </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>