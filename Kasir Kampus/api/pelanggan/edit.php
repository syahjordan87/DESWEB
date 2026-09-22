<?php
// Path di repo: Kasir Kampus/api/pelanggan/edit.php
// Menggantikan edit.php + proses_edit.php lama (proses_edit.php dihapus)
// Catatan: tetap session-based (index array), sama seperti list.php/hapus.php
// yang sudah memakai parameter "index".

session_start();

$index = filter_input(INPUT_GET, 'index', FILTER_VALIDATE_INT)
    ?? filter_input(INPUT_POST, 'index', FILTER_VALIDATE_INT);

if ($index === false || $index === null || !isset($_SESSION['pelanggan'][$index])) {
    header('Location: list.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id    = trim($_POST['id'] ?? '');
    $nama  = trim($_POST['nama'] ?? '');
    $kelas = trim($_POST['kelas'] ?? '');

    if ($id === '' || $nama === '' || $kelas === '') {
        header('Location: list.php');
        exit;
    }

    $_SESSION['pelanggan'][$index] = [
        'id'    => $id,
        'nama'  => $nama,
        'kelas' => $kelas
    ];

    header('Location: list.php');
    exit;
}

// ==== GET: tampilkan form dengan data lama ====
$item = $_SESSION['pelanggan'][$index];
$page_title = "Edit Pelanggan";
$base_url = "../";
require __DIR__ . '/../includes/header.php';
?>

<section>

    <h2>Edit Pelanggan</h2>

    <form method="POST" action="edit.php?index=<?= $index ?>">
        <input type="hidden" name="index" value="<?= $index ?>">
        <p>
            <label for="id">ID Pelanggan</label>
            <input type="text" id="id" name="id" value="<?= htmlspecialchars($item['id']) ?>" required>
        </p>
        <p>
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($item['nama']) ?>" required>
        </p>
        <p>
            <label for="kelas">Kelas</label>
            <input type="text" id="kelas" name="kelas" value="<?= htmlspecialchars($item['kelas']) ?>" required>
        </p>
        <p>
            <button type="submit">Simpan Perubahan</button>
        </p>
    </form>

</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>