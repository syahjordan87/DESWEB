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

    <link rel="stylesheet" type="text/css" href="/assets/css/style.css?v=1">

</head>

<body>

<header class="main-header">

    <h1>KASIR KAMPUS</h1>

    <nav class="main-nav">

        <ul>

            <li>
                <a href="/index.php">Beranda</a>
            </li>

            <li>
                <a href="/produk/list.php">Daftar Produk</a>
            </li>

            <li>
                <a href="/produk/tambah.php">Tambah Produk</a>
            </li>

            <li>
                <a href="/pelanggan/list.php">Daftar Pelanggan</a>
            </li>

            <li>
                <a href="/pelanggan/tambah.php">Tambah Pelanggan</a>
            </li>

        </ul>

    </nav>

</header>

<main>