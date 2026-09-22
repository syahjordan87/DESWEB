<?php
$page_title = "Daftar Pelanggan";
include __DIR__ . '/../../includes/header.php';
$pelanggan = $_SESSION['pelanggan'] ?? [];
?>
<section>
    <h2>Daftar Pelanggan</h2>
    <div class="search-box">
        <input type="text" id="search-input" placeholder="Cari pelanggan...">
    </div>
    <?php if (!$pelanggan): ?>
        <p class="empty">Belum ada pelanggan.</p>
    <?php else: ?>
    <div class="table-responsive">
        <table>
            <thead><tr><th>ID</th><th>Nama</th><th>Kelas</th><th>Aksi</th></tr></thead>
            <tbody>
            <?php foreach ($pelanggan as $index => $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item['id']) ?></td>
                    <td><?= htmlspecialchars($item['nama']) ?></td>
                    <td><?= htmlspecialchars($item['kelas']) ?></td>
                    <td>
                        <a class="btn-edit" href="edit.php?index=<?= $index ?>">Edit</a>
                        <a class="btn-hapus" href="hapus.php?index=<?= $index ?>" onclick="return confirm('Yakin ingin menghapus pelanggan ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php endif; ?>
</section>
<?php include __DIR__ . '/../../includes/footer.php'; ?>
