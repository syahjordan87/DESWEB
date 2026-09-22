<?php

$page_title = "Daftar Pelanggan";
$base_url = "../../";

require __DIR__ . '/../../includes/koneksi.php';
require __DIR__ . '/../../includes/header.php';

$stmt = $pdo->query("
    SELECT id, nama, alamat, no_hp
    FROM public.pelanggan
    ORDER BY id ASC
");

$pelanggan = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<section>

    <h2>Daftar Pelanggan</h2>

    <div class="search-box">
        <input
            type="text"
            id="search-input"
            placeholder="Cari pelanggan..."
        >
    </div>

    <?php if (!$pelanggan): ?>

        <p class="empty">Belum ada pelanggan.</p>

    <?php else: ?>

        <div class="table-responsive">

            <table>

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No. HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                <?php foreach ($pelanggan as $item): ?>

                    <tr>

                        <td>
                            <?= (int) $item['id'] ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($item['nama']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($item['alamat'] ?? '-') ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($item['no_hp'] ?? '-') ?>
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
                                onclick="return confirm('Yakin ingin menghapus pelanggan ini?')"
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

<?php require __DIR__ . '/../../includes/footer.php'; ?>
