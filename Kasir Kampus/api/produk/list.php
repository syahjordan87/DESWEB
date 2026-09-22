<?php

session_start();

$page_title = "Daftar Produk";
$base_url = "../";

require __DIR__ . '/../includes/koneksi.php';
require __DIR__ . '/../includes/header.php';

$stmt = $pdo->query("
    SELECT id, nama, kategori, harga, stok
    FROM public.produk
    ORDER BY id ASC
");

$produk = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<section>

    <h2>Daftar Produk</h2>

    <?php if (!empty($_SESSION['flash'])): ?>

        <div class="alert">
            <?= htmlspecialchars($_SESSION['flash']) ?>
        </div>

        <?php unset($_SESSION['flash']); ?>

    <?php endif; ?>

    <div class="search-box">

        <input
            type="text"
            id="search-input"
            placeholder="Cari produk..."
        >

    </div>

    <?php if (!$produk): ?>

        <p class="empty">Belum ada produk.</p>

    <?php else: ?>

        <div class="table-responsive">

            <table>

                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                <?php foreach ($produk as $item): ?>

                    <tr>

                        <td>
                            <?= htmlspecialchars($item['nama']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($item['kategori']) ?>
                        </td>

                        <td>
                            Rp <?= number_format($item['harga'], 0, ',', '.') ?>
                        </td>

                        <td>
                            <?= (int) $item['stok'] ?>
                        </td>

                        <td>

                            <a
                                class="btn-edit"
                                href="edit.php?id=<?= (int) $item['id'] ?>"
                            >
                                Edit
                            </a>

                            <a
                                class="btn-hapus"
                                href="hapus.php?id=<?= (int) $item['id'] ?>"
                                onclick="return confirm('Yakin ingin menghapus produk ini?')"
                            >
                                Hapus
                            </a>

                        </td>

                    </tr>

                <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    <?php endif; ?>

</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>