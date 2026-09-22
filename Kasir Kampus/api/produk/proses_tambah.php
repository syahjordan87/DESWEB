<?php

session_start();

require __DIR__ . '/../includes/koneksi.php';

$nama = trim($_POST['nama'] ?? '');
$kategori = trim($_POST['kategori'] ?? '');
$harga = $_POST['harga'] ?? '';
$stok = $_POST['stok'] ?? '';

if (
    $nama === '' ||
    $kategori === '' ||
    !is_numeric($harga) ||
    $harga < 0 ||
    !is_numeric($stok) ||
    $stok < 0
) {
    $_SESSION['flash'] = 'Data produk tidak valid.';
    header('Location: tambah.php');
    exit;
}

try {

    $stmt = $pdo->prepare("
        INSERT INTO public.produk
        (nama, kategori, harga, stok)
        VALUES
        (:nama, :kategori, :harga, :stok)
    ");

    $stmt->execute([
        ':nama' => $nama,
        ':kategori' => $kategori,
        ':harga' => $harga,
        ':stok' => $stok
    ]);

    $_SESSION['flash'] = 'Produk berhasil ditambahkan ke database.';

    header('Location: list.php');
    exit;

} catch (PDOException $e) {

    $_SESSION['flash'] = 'Gagal menambahkan produk: ' . $e->getMessage();

    header('Location: tambah.php');
    exit;
}