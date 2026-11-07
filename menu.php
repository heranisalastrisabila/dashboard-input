<?php
$menuAktif = $_GET['page'] ?? 'dashboard';
if (in_array($menuAktif, ['tambahproduk', 'editproduk'])) {
    $menuAktif = 'produk';
}
function aktif($nama, $menuAktif)
{
    return $nama === $menuAktif ? 'active' : '';
}
?>
<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link <?= aktif('dashboard', $menuAktif); ?>" href="index.php?page=dashboard">Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?= aktif('orders', $menuAktif); ?>" href="index.php?page=orders">Orders</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?= aktif('produk', $menuAktif); ?>" href="index.php?page=produk">Products</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?= aktif('customers', $menuAktif); ?>" href="index.php?page=customers">Customers</a>
    </li>
</ul>