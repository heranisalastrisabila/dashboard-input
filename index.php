 <?php require_once 'connect.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="index.php">XSATA STORE</a>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">

        <!-- sidebar (kiri) -->
        <div class="col-3 col-md-2 bg-light py-3 min-vh-100">
            <?php require 'menu.php'; ?>
        </div>

        <!-- konten (kanan, di samping sidebar) -->
        <main class="col-9 col-md-10 p-4">
            <?php require 'content.php'; ?>
        </main>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>