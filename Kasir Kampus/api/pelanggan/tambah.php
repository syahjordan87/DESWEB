<?php
$page_title = "Tambah Pelanggan";
include __DIR__ . '/../includes/header.php';
?>
<section>
    <h2>Tambah Pelanggan</h2>
    <?php if (!empty($_SESSION['flash'])): ?>
        <div class="alert"><?= htmlspecialchars($_SESSION['flash']) ?></div>
        <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>
    <form method="post" action="proses_tambah.php">
        <p><label for="id">ID Pelanggan</label><input type="text" id="id" name="id" placeholder="P001" required></p>
        <p><label for="nama">Nama</label><input type="text" id="nama" name="nama" required></p>
        <p><label for="kelas">Kelas</label><input type="text" id="kelas" name="kelas" placeholder="TI-1A" required></p>
        <p><button type="submit">Simpan</button></p>
    </form>
</section>
<?php include __DIR__ . '/../includes/footer.php'; ?>
