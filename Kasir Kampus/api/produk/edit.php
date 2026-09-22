<?php
// Path di repo: Kasir Kampus/api/produk/edit.php
// Menggantikan edit.php + proses_edit.php lama (proses_edit.php dihapus)
// FIX: versi lama baca $_SESSION['produk'][$index] yang tidak pernah terisi
//      (data produk sepenuhnya di database, bukan session) -> edit selalu gagal.
//      Versi ini ambil & simpan langsung ke database, pakai param "id"
//      (parameter "id" ini sudah sama dengan yang dipakai list.php: edit.php?id=...)

session_start();
require __DIR__ . '/../includes/koneksi.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT)
    ?: filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: list.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nama     = trim($_POST['nama'] ?? '');
    $kategori = trim($_POST['kategori'] ?? '');
    $harga    = $_POST['harga'] ?? '';
    $stok     = $_POST['stok'] ?? '';

    if (
        $nama === '' ||
        !is_numeric($harga) || $harga < 0 ||
        !is_numeric($stok) || $stok < 0
    ) {
        $_SESSION['flash'] = 'Data produk tidak valid.';
        header('Location: edit.php?id=' . $id);
        exit;
    }

    try {

        $stmt = $pdo->prepare("
            UPDATE public.produk
            SET nama = :nama, kategori = :kategori, harga = :harga, stok = :stok
            WHERE id = :id
        ");

        $stmt->execute([
            ':nama'     => $nama,
            ':kategori' => $kategori,
            ':harga'    => $harga,
            ':stok'     => $stok,
            ':id'       => $id
        ]);

        $_SESSION['flash'] = 'Produk berhasil diperbarui.';
        header('Location: list.php');
        exit;

    } catch (PDOException $e) {

        $_SESSION['flash'] = 'Gagal memperbarui produk: ' . $e->getMessage();
        header('Location: edit.php?id=' . $id);
        exit;
    }
}

// ==== GET: ambil data produk dari database untuk ditampilkan di form ====
$stmt = $pdo->prepare("
    SELECT id, nama, kategori, harga, stok
    FROM public.produk
    WHERE id = :id
");
$stmt->execute([':id' => $id]);
$item = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$item) {
    header('Location: list.php');
    exit;
}

$page_title = "Edit Produk";
$base_url = "../";
require __DIR__ . '/../includes/header.php';
?>

<section>

    <h2>Edit Produk</h2>

    <?php if (!empty($_SESSION['flash'])): ?>

        <div class="alert">
            <?= htmlspecialchars($_SESSION['flash']) ?>
        </div>

        <?php unset($_SESSION['flash']); ?>

    <?php endif; ?>

    <form method="POST" action="edit.php?id=<?= (int) $item['id'] ?>">

        <p>
            <label for="nama">Nama Produk</label>
            <input
                type="text"
                id="nama"
                name="nama"
                value="<?= htmlspecialchars($item['nama']) ?>"
                required
            >
        </p>

        <p>
            <label for="kategori">Kategori</label>
            <select id="kategori" name="kategori">
                <?php foreach (['Makanan', 'Minuman', 'Snack'] as $kat): ?>
                    <option value="<?= $kat ?>" <?= $item['kategori'] === $kat ? 'selected' : '' ?>>
                        <?= $kat ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </p>

        <p>
            <label for="harga">Harga</label>
            <input
                type="number"
                id="harga"
                name="harga"
                min="0"
                value="<?= (int) $item['harga'] ?>"
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
                value="<?= (int) $item['stok'] ?>"
                required
            >
        </p>

        <p>
            <button type="submit">Simpan Perubahan</button>
        </p>

    </form>

</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>