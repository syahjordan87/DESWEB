<?php
session_start();
$id = trim($_POST['id'] ?? '');
$nama = trim($_POST['nama'] ?? '');
$kelas = trim($_POST['kelas'] ?? '');

if ($id === '' || $nama === '' || $kelas === '') {
    $_SESSION['flash'] = 'Semua data wajib diisi.';
    header('Location: tambah.php');
    exit;
}

$_SESSION['pelanggan'][] = [
    'id' => $id,
    'nama' => $nama,
    'kelas' => $kelas
];

header('Location: list.php');
exit;
