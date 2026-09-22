<?php
session_start();
$index = filter_input(INPUT_POST, 'index', FILTER_VALIDATE_INT);
$nama = trim($_POST['nama'] ?? '');
$kategori = trim($_POST['kategori'] ?? '');
$harga = $_POST['harga'] ?? '';
$stok = $_POST['stok'] ?? '';

if ($index === false || $index === null || !isset($_SESSION['produk'][$index]) ||
    $nama === '' || !is_numeric($harga) || $harga < 0 || !is_numeric($stok) || $stok < 0) {
    header('Location: list.php');
    exit;
}

$_SESSION['produk'][$index] = [
    'nama' => $nama,
    'kategori' => $kategori,
    'harga' => (int)$harga,
    'stok' => (int)$stok
];

header('Location: list.php');
exit;
