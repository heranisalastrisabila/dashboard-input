<h1 class="h2">Data Produk</h1>
<hr>

<button type="button" class="btn btn-sm btn-primary mb-3"
        data-bs-toggle="modal" data-bs-target="#modalTambah">Add produk</button>

<div class="table-responsive">
    <table class="table table-striped table-sm align-middle">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Gambar</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $data = mysqli_query($dbconnect, "SELECT * FROM tb_produk ORDER BY id_produk DESC");
            if (!$data) {
                echo "<tr><td colspan='7'>Query gagal: " . e(mysqli_error($dbconnect)) . "</td></tr>";
            } else {
                $no = 1;
                while ($tampil = mysqli_fetch_assoc($data)) {
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= e($tampil['nama_produk']); ?></td>
                <td>Rp <?= number_format($tampil['harga'], 0, ',', '.'); ?></td>
                <td><?= (int)$tampil['stok']; ?></td>
                <td>
                    <?php if (!empty($tampil['gambar'])) { ?>
                        <img src="uploads/<?= e($tampil['gambar']); ?>" alt="" style="width:50px;height:50px;object-fit:cover;">
                    <?php } ?>
                </td>
                <td><?= e($tampil['kategori']); ?></td>
                <td>
                    <button type="button" class="btn btn-sm btn-warning"
                            data-bs-toggle="modal" data-bs-target="#modalEdit"
                            data-id="<?= (int)$tampil['id_produk']; ?>"
                            data-nama="<?= e($tampil['nama_produk']); ?>"
                            data-harga="<?= (int)$tampil['harga']; ?>"
                            data-stok="<?= (int)$tampil['stok']; ?>"
                            data-kategori="<?= e($tampil['kategori']); ?>">Edit</button>
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

<!-- MODAL TAMBAH -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="pages/prosesinput.php" method="POST" enctype="multipart/form-data" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" name="nama_produk" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" name="harga" class="form-control" min="0" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" name="stok" class="form-control" min="0" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Gambar</label>
                    <input type="file" name="gambar" class="form-control" accept="image/*">
                </div>
                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <input type="text" name="kategori" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- MODAL EDIT -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="pages/prosesedit.php" method="POST" enctype="multipart/form-data" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id_produk">
                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" name="nama_produk" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" name="harga" class="form-control" min="0" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" name="stok" class="form-control" min="0" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Gambar</label>
                    <input type="file" name="gambar" class="form-control" accept="image/*">
                    <div class="form-text">Kosongkan jika tidak ingin mengganti gambar.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <input type="text" name="kategori" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>

<script>
// Isi form Edit dengan data dari tombol yang diklik
document.getElementById('modalEdit').addEventListener('show.bs.modal', function (event) {
    var b = event.relatedTarget;
    this.querySelector('[name=id_produk]').value   = b.dataset.id;
    this.querySelector('[name=nama_produk]').value = b.dataset.nama;
    this.querySelector('[name=harga]').value       = b.dataset.harga;
    this.querySelector('[name=stok]').value        = b.dataset.stok;
    this.querySelector('[name=kategori]').value    = b.dataset.kategori;
});
</script>