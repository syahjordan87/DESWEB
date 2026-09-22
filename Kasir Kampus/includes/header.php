<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$page_title = $page_title ?? 'KASIR KAMPUS';

$is_local = isset($_SERVER['HTTP_HOST']) &&
    (
        str_contains($_SERVER['HTTP_HOST'], 'localhost') ||
        str_contains($_SERVER['HTTP_HOST'], '127.0.0.1')
    );

$base_path = $is_local ? '/kasir_kampus' : '';

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?= htmlspecialchars($page_title) ?> | KASIR KAMPUS
    </title>

    <!-- CSS -->
    <link
        rel="stylesheet"
        href="<?= $base_path ?>/assets/css/style.css"
    >

</head>

<body>

<header class="main-header">

    <h1>KASIR KAMPUS</h1>

    <nav class="main-nav">

        <ul>

            <li>
                <a href="<?= $base_path ?>/index.php">
                    Beranda
                </a>
            </li>

            <li>
                <a href="<?= $base_path ?>/produk/list.php">
                    Daftar Produk
                </a>
            </li>

            <li>
                <a href="<?= $base_path ?>/produk/tambah.php">
                    Tambah Produk
                </a>
            </li>

            <li>
                <a href="<?= $base_path ?>/pelanggan/list.php">
                    Daftar Pelanggan
                </a>
            </li>

            <li>
                <a href="<?= $base_path ?>/pelanggan/tambah.php">
                    Tambah Pelanggan
                </a>
            </li>

        </ul>

    </nav>

</header>

<main>