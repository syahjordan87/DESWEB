<?php

require __DIR__ . '/../includes/koneksi.php';

$page_title = "Beranda";
$base_url = "";

// Ambil jumlah produk
$totalProduk = $pdo->query("
    SELECT COUNT(*)
    FROM public.produk
")->fetchColumn();

// Ambil jumlah pelanggan
$totalPelanggan = $pdo->query("
    SELECT COUNT(*)
    FROM public.pelanggan
")->fetchColumn();

require __DIR__ . '/../includes/header.php';

?>

<section>

    <h2>Selamat Datang di Kasir Kampus</h2>

    <p>
        Sistem sederhana untuk mengelola produk kantin dan data pelanggan.
    </p>

</section>


<section>

    <h2>Ringkasan</h2>

    <div style="
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 20px;
        width: 100%;
    ">

        <!-- TOTAL PRODUK -->
        <article style="
            background: linear-gradient(135deg, #117c78, #17647b);
            color: white;
            border-radius: 14px;
            padding: 28px;
            min-height: 160px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
        ">

            <h3 style="
                margin: 0 0 20px 0;
                font-size: 20px;
                color: white;
            ">
                Total Produk
            </h3>

            <p style="
                margin: 0;
                font-size: 36px;
                font-weight: bold;
                color: white;
            ">
                <?= (int) $totalProduk ?>
            </p>

        </article>


        <!-- TOTAL PELANGGAN -->
        <article style="
            background: linear-gradient(135deg, #117c78, #17647b);
            color: white;
            border-radius: 14px;
            padding: 28px;
            min-height: 160px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
        ">

            <h3 style="
                margin: 0 0 20px 0;
                font-size: 20px;
                color: white;
            ">
                Total Pelanggan
            </h3>

            <p style="
                margin: 0;
                font-size: 36px;
                font-weight: bold;
                color: white;
            ">
                <?= (int) $totalPelanggan ?>
            </p>

        </article>


        <!-- STATUS KASIR -->
        <article style="
            background: linear-gradient(135deg, #117c78, #17647b);
            color: white;
            border-radius: 14px;
            padding: 28px;
            min-height: 160px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
        ">

            <h3 style="
                margin: 0 0 20px 0;
                font-size: 20px;
                color: white;
            ">
                Status Kasir
            </h3>

            <p style="
                margin: 0;
                font-size: 36px;
                font-weight: bold;
                color: white;
            ">
                Aktif
            </p>

        </article>

    </div>

</section>


<?php require __DIR__ . '/includes/footer.php'; ?>