<div class="d-flex" style="min-height: 100vh;">
    <!-- Panggil Sidebar -->
    <?php include "menu.php"; ?>

    <!-- Konten Form -->
    <div class="flex-grow-1 px-4 py-3">
      <h3 class="mb-4">Edit Isi Barang Anda</h3>

      <?php
      include '../koneksi.php';
      $id = $_GET['id'];

      $query = mysqli_query($dbconnect, "SELECT * FROM `tb_barang` WHERE id_produk = $id ");
      $tampil = mysqli_fetch_assoc($query);

      ?>

  <h1 class="h2">Tambah Produk</h1>
<hr>


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
        <label class="form-label">Gambar (link / nama file)</label>
        <input type="text" name="gambar" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Kategori</label>
        <input type="text" name="kategori" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="index.php?page=produk" class="btn btn-secondary">Batal</a>
</form>
    </div>
  </div>

</body>
</html>