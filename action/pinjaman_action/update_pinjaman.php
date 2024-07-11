<?php
include '../../koneksi.php';

$no_pinjaman = $_GET['no_pinjaman'];
$sql = "SELECT * FROM pinjaman WHERE no_pinjaman='$no_pinjaman'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Update Pinjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4">
        <h2>Update Pinjaman</h2>
        <form action="../../function/pinjaman_functions.php" method="post">
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="no_pinjaman" value="<?php echo $row['no_pinjaman']; ?>">
            <div class="mb-3">
                <label for="id_user" class="form-label">ID User</label>
                <input type="text" class="form-control" id="id_user" name="id_user" value="<?php echo $row['id_user']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
                <input type="date" class="form-control" id="tgl_pinjam" name="tgl_pinjam" value="<?php echo $row['tgl_pinjam']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="nominal" class="form-label">Nominal</label>
                <input type="number" class="form-control" id="nominal" name="nominal" value="<?php echo $row['nominal']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="tenor" class="form-label">Tenor</label>
                <input type="number" class="form-control" id="tenor" name="tenor" value="<?php echo $row['tenor']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Pinjaman</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>