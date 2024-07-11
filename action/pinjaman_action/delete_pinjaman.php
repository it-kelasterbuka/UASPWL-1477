<?php
include '../../koneksi.php';

$no_pinjaman = $_GET['no_pinjaman'];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Hapus Pinjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4">
        <h2>Hapus Pinjaman</h2>
        <form action="../../function/pinjaman_functions.php" method="post">
            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="no_pinjaman" value="<?php echo $no_pinjaman; ?>">
            <p>Apakah Anda yakin ingin menghapus pinjaman dengan No: <?php echo $no_pinjaman; ?>?</p>
            <button type="submit" class="btn btn-danger">Hapus Pinjaman</button>
            <a href="pinjam.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>