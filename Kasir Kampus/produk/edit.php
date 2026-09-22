<?php
session_start();
$index = filter_input(INPUT_GET, 'index', FILTER_VALIDATE_INT);
if ($index === false || $index === null || !isset($_SESSION['produk'][$index])) {
    header('Location: list.php');
    exit;
}
$item = $_SESSION['produk'][$index];
$page_title = "Edit Produk";
include __DIR__ . '/../includes/header.php';
?>
<section>
    <h2>Edit Produk</h2>
    <form method="post" action="proses_edit.php">
        <input type="hidden" name="index" value="<?= $index ?>">
        <p><label for="nama">Nama Produk</label><input type="text" id="nama" name="nama" value="<?= htmlspecialchars($item['nama']) ?>" required></p>
        <p><label for="kategori">Kategori</label>
            <select id="kategori" name="kategori">
                <?php foreach (['Makanan','Minuman','Snack'] as $kat): ?>
                    <option value="<?= $kat ?>" <?= $item['kategori'] === $kat ? 'selected' : '' ?>><?= $kat ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <p><label for="harga">Harga</label><input type="number" id="harga" name="harga" min="0" value="<?= (int)$item['harga'] ?>" required></p>
        <p><label for="stok">Stok</label><input type="number" id="stok" name="stok" min="0" value="<?= (int)$item['stok'] ?>" required></p>
        <p><button type="submit">Simpan Perubahan</button></p>
    </form>
</section>
<?php include __DIR__ . '/../includes/footer.php'; ?>
