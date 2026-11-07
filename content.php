<?php
$page = $_GET['page'] ?? 'dashboard';

// Allowlist: hanya halaman di daftar ini yang boleh dibuka
$halaman = [
    'dashboard'    => 'pages/dashboard.php',
    'produk'       => 'pages/produk.php',
    'orders'       => 'pages/orders.php',
    'customers'    => 'pages/customers.php',
    'tambahproduk' => 'pages/tambahproduk.php',
    'editproduk'   => 'pages/editproduk.php',
];

if (isset($halaman[$page]) && file_exists($halaman[$page])) {
    require $halaman[$page];
} else {
    echo "<h2>Halaman tidak ditemukan</h2>";
}