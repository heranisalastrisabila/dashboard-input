 <?php
$host = "localhost";
$user = "root";
$password = "";
$db = "tb_produk";

$dbconnect = new mysqli($host, $user, $password, $db);

mysqli_set_charset($dbconnect, "utf8mb4");

// Fungsi bantu supaya teks aman ditampilkan di HTML
function e($teks)
{
    return htmlspecialchars((string)$teks, ENT_QUOTES, 'UTF-8');
}

?>