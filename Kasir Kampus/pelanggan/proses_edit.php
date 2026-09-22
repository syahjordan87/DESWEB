<?php
session_start();
$index = filter_input(INPUT_POST, 'index', FILTER_VALIDATE_INT);
$id = trim($_POST['id'] ?? '');
$nama = trim($_POST['nama'] ?? '');
$kelas = trim($_POST['kelas'] ?? '');

if ($index === false || $index === null || !isset($_SESSION['pelanggan'][$index]) ||
    $id === '' || $nama === '' || $kelas === '') {
    header('Location: list.php');
    exit;
}

$_SESSION['pelanggan'][$index] = [
    'id' => $id,
    'nama' => $nama,
    'kelas' => $kelas
];

header('Location: list.php');
exit;
