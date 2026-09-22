<?php
session_start();
$index = filter_input(INPUT_GET, 'index', FILTER_VALIDATE_INT);
if ($index === false || $index === null || !isset($_SESSION['pelanggan'][$index])) {
    header('Location: list.php');
    exit;
}
$item = $_SESSION['pelanggan'][$index];
$page_title = "Edit Pelanggan";
include __DIR__ . '/../includes/header.php';
?>
<section>
    <h2>Edit Pelanggan</h2>
    <form method="post" action="proses_edit.php">
        <input type="hidden" name="index" value="<?= $index ?>">
        <p><label for="id">ID Pelanggan</label><input type="text" id="id" name="id" value="<?= htmlspecialchars($item['id']) ?>" required></p>
        <p><label for="nama">Nama</label><input type="text" id="nama" name="nama" value="<?= htmlspecialchars($item['nama']) ?>" required></p>
        <p><label for="kelas">Kelas</label><input type="text" id="kelas" name="kelas" value="<?= htmlspecialchars($item['kelas']) ?>" required></p>
        <p><button type="submit">Simpan Perubahan</button></p>
    </form>
</section>
<?php include __DIR__ . '/../includes/footer.php'; ?>
