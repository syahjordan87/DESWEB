// ===== Mengambil Data Buku =====

async function muatDaftarBuku() {

    const tbody =
        document.querySelector(
            ".table-responsive table tbody"
        );

    const loading =
        document.getElementById(
            "loading-indicator"
        );

    if (!tbody) {
        return;
    }

    if (loading) {
        loading.style.display = "block";
    }

    tbody.innerHTML = "";

    try {

        const response =
            await fetch(
                "../data/buku.json"
            );

        if (!response.ok) {

            throw new Error(
                "Gagal mengambil data."
            );

        }

        const daftarBuku =
            await response.json();


        daftarBuku.forEach(function (buku) {

            const tr =
                document.createElement("tr");

            tr.innerHTML = `
                <td>${buku.judul}</td>
                <td>${buku.pengarang}</td>
                <td>${buku.tahun}</td>
                <td>${buku.stok}</td>
                <td>
                    <button type="button">
                        Edit
                    </button>

                    <button
                        type="button"
                        class="btn-hapus">
                        Hapus
                    </button>
                </td>
            `;

            tbody.appendChild(tr);

        });

    } catch (error) {

        tbody.innerHTML = `
            <tr>
                <td colspan="5">
                    Gagal memuat data:
                    ${error.message}
                </td>
            </tr>
        `;

    } finally {

        if (loading) {
            loading.style.display = "none";
        }

    }
}


document.addEventListener(
    "DOMContentLoaded",
    muatDaftarBuku
);