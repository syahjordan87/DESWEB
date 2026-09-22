<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$page_title = $page_title ?? 'KASIR KAMPUS';

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($page_title) ?> | KASIR KAMPUS</title>

    <link rel="stylesheet" href="/kasir_kampus/assets/css/style.css?v=2">

</head>

<body>

<header class="main-header">

    <h1>KASIR KAMPUS</h1>

    <nav class="main-nav">

        <ul>

            <li>
                <a href="/kasir_kampus/index.php">
                    Beranda
                </a>
            </li>

            <li>
                <a href="/kasir_kampus/produk/list.php">
                    Daftar Produk
                </a>
            </li>

            <li>
                <a href="/kasir_kampus/produk/tambah.php">
                    Tambah Produk
                </a>
            </li>

            <li>
                <a href="/kasir_kampus/pelanggan/list.php">
                    Daftar Pelanggan
                </a>
            </li>

            <li>
                <a href="/kasir_kampus/pelanggan/tambah.php">
                    Tambah Pelanggan
                </a>
            </li>

        </ul>

    </nav>

</header>

<main>