<?php

session_start();

require __DIR__ . '/../includes/koneksi.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    $_SESSION['flash'] = 'ID produk tidak valid.';
    header('Location: list.php');
    exit;
}

try {

    $stmt = $pdo->prepare("
        DELETE FROM public.produk
        WHERE id = :id
    ");

    $stmt->execute([
        ':id' => $id
    ]);

    if ($stmt->rowCount() > 0) {
        $_SESSION['flash'] = 'Produk berhasil dihapus.';
    } else {
        $_SESSION['flash'] = 'Produk tidak ditemukan.';
    }

} catch (PDOException $e) {

    $_SESSION['flash'] = 'Gagal menghapus produk: ' . $e->getMessage();

}

header('Location: list.php');
exit;