<?php
// Path di repo: Kasir Kampus/api/produk/tambah.php
// Menggantikan tambah.php + proses_tambah.php lama (proses_tambah.php dihapus)

session_start();
require __DIR__ . '/../../includes/koneksi.php';

$page_title = "Tambah Produk";
$base_url = "../";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nama     = trim($_POST['nama'] ?? '');
    $kategori = trim($_POST['kategori'] ?? '');
    $harga    = $_POST['harga'] ?? '';
    $stok     = $_POST['stok'] ?? '';

    if (
        $nama === '' ||
        $kategori === '' ||
        !is_numeric($harga) || $harga < 0 ||
        !is_numeric($stok) || $stok < 0
    ) {
        $_SESSION['flash'] = 'Data produk tidak valid.';
        header('Location: tambah.php');
        exit;
    }

    try {

        $stmt = $pdo->prepare("
            INSERT INTO public.produk
            (nama, kategori, harga, stok)
            VALUES
            (:nama, :kategori, :harga, :stok)
        ");

        $stmt->execute([
            ':nama'     => $nama,
            ':kategori' => $kategori,
            ':harga'    => $harga,
            ':stok'     => $stok
        ]);

        $_SESSION['flash'] = 'Produk berhasil ditambahkan ke database.';
        header('Location: list.php');
        exit;

    } catch (PDOException $e) {

        $_SESSION['flash'] = 'Gagal menambahkan produk: ' . $e->getMessage();
        header('Location: tambah.php');
        exit;
    }
}

// ==== GET: tampilkan form ====
require __DIR__ . '/../../includes/header.php';
?>

<section>

    <h2>Tambah Produk</h2>

    <?php if (!empty($_SESSION['flash'])): ?>

        <div class="alert">
            <?= htmlspecialchars($_SESSION['flash']) ?>
        </div>

        <?php unset($_SESSION['flash']); ?>

    <?php endif; ?>

    <form method="POST" action="tambah.php">

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

<?php require __DIR__ . '/../../includes/footer.php'; ?>
