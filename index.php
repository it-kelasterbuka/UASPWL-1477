<?php
// Memuat file fungsi lisensi
require 'license.php';

// Memuat file konfigurasi
$config = require 'config.php';

// Kunci lisensi yang diberikan pengguna
$license_key = $config['license_key'];

// Memeriksa apakah kunci lisensi valid
if (!check_license($license_key)) {
    die('Kunci lisensi tidak valid. Hubungi pemilik untuk mendapatkan kunci yang valid.');
}

require_once __DIR__ . '/vendor/autoload.php';

use Mpdf\Mpdf;

// Buat koneksi ke database
include './koneksi.php';

// Cek apakah form generate PDF sudah dikirim
if (isset($_POST['generate_pdf']) && !empty($_POST['tahun'])) {
    $tahun = intval($_POST['tahun']);  // Ambil tahun dari form dan pastikan itu adalah integer

    // Ambil data pinjaman berdasarkan tahun
    $sql = "SELECT u.id_user, u.username, COUNT(p.no_pinjaman) AS jumlah_pinjaman, SUM(p.nominal) AS total_pinjaman, MAX(p.tgl_pinjam) AS pinjaman_terakhir
            FROM users u
            LEFT JOIN pinjaman p ON u.id_user = p.id_user AND YEAR(p.tgl_pinjam) = ?
            GROUP BY u.id_user, u.username";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $tahun);
    $stmt->execute();
    $result = $stmt->get_result();

    // Inisialisasi mPDF
    $pdf = new Mpdf();

    // Set judul PDF
    $pdf->SetTitle("Rekapan Pinjaman Anggota Tahun $tahun");

    // Tambahkan konten ke PDF
    $pdf->WriteHTML('<h1>REKAPAN PINJAMAN ANGGOTA</h1>');
    $pdf->WriteHTML('<h3>Periode tahun ' . $tahun . '</h3>');

    // Membuat tabel
    $pdf->WriteHTML('<table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th>ID USER</th>
                <th>Username</th>
                <th>Jumlah Pinjaman</th>
                <th>Total Pinjaman</th>
                <th>Pinjaman Terakhir</th>
            </tr>
        </thead>
        <tbody>');

    // Menambahkan data ke dalam tabel
    while ($row = $result->fetch_assoc()) {
        $jumlah_pinjaman = $row['jumlah_pinjaman'] . ' kali';
        $total_pinjaman = number_format($row['total_pinjaman'], 2, ',', '.');
        $pinjaman_terakhir = $row['pinjaman_terakhir'] ? $row['pinjaman_terakhir'] : '-';

        $pdf->WriteHTML('<tr>
            <td>' . $row['id_user'] . '</td>
            <td>' . $row['username'] . '</td>
            <td>' . $jumlah_pinjaman . '</td>
            <td>' . $total_pinjaman . '</td>
            <td>' . $pinjaman_terakhir . '</td>
        </tr>');
    }

    $pdf->WriteHTML('</tbody></table>');

    // Tanggal cetak
    $tanggal_cetak = date('d M Y');
    $pdf->WriteHTML('<p>Tanggal cetak: ' . $tanggal_cetak . '</p>');

    // Output PDF ke browser
    $pdf->Output('Rekapan_Pinjaman_Anggota_Tahun_' . $tahun . '.pdf', 'D');
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate PDF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<style>
    html,
    body {
        height: 100%;
    }

    .container {
        flex: 1 0 auto;
    }

    .footer {
        background-color: #343a40;
        color: #ffffff;
        padding: 10px 0;
        position: relative;
        bottom: 0;
        width: 100%;
    }

    .d-flex {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }
</style>

<body class="d-flex flex-column">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
        <div class="container">
            <a class="navbar-brand" href="#">UAS PWL | 1477</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user.php">User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pinjam.php">Pinjaman</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Generate Rekapan Pinjaman Anggota</h1>
        <form action="index.php" method="POST">
            <div class="mb-3">
                <label for="tahun" class="form-label">Pilih Tahun:</label>
                <input type="number" id="tahun" name="tahun" class="form-control" min="2000" required>
            </div>
            <button type="submit" name="generate_pdf" class="btn btn-primary">Generate PDF</button>
        </form>
    </div>

    <!-- Footer -->
    <footer class="footer mt-auto">
        <div class="container text-center">
            <p class="mb-0">&copy; 2024 Ahmad Randi. Semua Hak Dilindungi.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>