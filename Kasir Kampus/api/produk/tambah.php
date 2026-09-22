<?php

session_start();

$page_title = "Tambah Produk";
$base_url = "../";

require __DIR__ . '/../includes/header.php';

?>

<section>

    <h2>Tambah Produk</h2>

    <?php if (!empty($_SESSION['flash'])): ?>

        <div class="alert">
            <?= htmlspecialchars($_SESSION['flash']) ?>
        </div>

        <?php unset($_SESSION['flash']); ?>

    <?php endif; ?>

    <form method="POST" action="proses_tambah.php">

        <p>
            <label for="nama">Nama Produk</label>
            <input
                type="text"
                id="nama"
                name="nama"
                required
            >
        </p>

        <p>
            <label for="kategori">Kategori</label>
            <select id="kategori" name="kategori" required>
                <option value="Makanan">Makanan</option>
                <option value="Minuman">Minuman</option>
                <option value="Snack">Snack</option>
            </select>
        </p>

        <p>
            <label for="harga">Harga</label>
            <input
                type="number"
                id="harga"
                name="harga"
                min="0"
                required
            >
        </p>

        <p>
            <label for="stok">Stok</label>
            <input
                type="number"
                id="stok"
                name="stok"
                min="0"
                required
            >
        </p>

        <p>
            <button type="submit">Simpan</button>
        </p>

    </form>

</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>