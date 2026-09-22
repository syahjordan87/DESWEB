<?php
// Path di repo: Kasir Kampus/api/pelanggan/tambah.php
// Menggantikan tambah.php + proses_tambah.php lama (proses_tambah.php dihapus)
// Catatan: modul pelanggan masih pakai $_SESSION (mengikuti arsitektur aslinya),
// bukan database, meski tabel public.pelanggan sudah ada. Kalau mau disamakan
// dengan modul produk (simpan ke database), tinggal bilang.

session_start();

$page_title = "Tambah Pelanggan";
$base_url = "../";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id    = trim($_POST['id'] ?? '');
    $nama  = trim($_POST['nama'] ?? '');
    $kelas = trim($_POST['kelas'] ?? '');

    if ($id === '' || $nama === '' || $kelas === '') {
        $_SESSION['flash'] = 'Semua data wajib diisi.';
        header('Location: tambah.php');
        exit;
    }

    $_SESSION['pelanggan'][] = [
        'id'    => $id,
        'nama'  => $nama,
        'kelas' => $kelas
    ];

    header('Location: list.php');
    exit;
}

// ==== GET: tampilkan form ====
require __DIR__ . '/../../includes/header.php';
?>

<section>

    <h2>Tambah Pelanggan</h2>

    <?php if (!empty($_SESSION['flash'])): ?>
        <div class="alert"><?= htmlspecialchars($_SESSION['flash']) ?></div>
        <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>

    <form method="POST" action="tambah.php">
        <p>
            <label for="id">ID Pelanggan</label>
            <input type="text" id="id" name="id" placeholder="P001" required>
        </p>
        <p>
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" required>
        </p>
        <p>
            <label for="kelas">Kelas</label>
            <input type="text" id="kelas" name="kelas" placeholder="TI-1A" required>
        </p>
        <p>
            <button type="submit">Simpan</button>
        </p>
    </form>

</section>

<?php require __DIR__ . '/../../includes/footer.php'; ?>
