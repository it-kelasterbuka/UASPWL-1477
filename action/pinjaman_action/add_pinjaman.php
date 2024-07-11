<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Pinjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4">
        <h2>Tambah Pinjaman</h2>
        <form action="../../function/pinjaman_functions.php" method="post">
            <input type="hidden" name="action" value="add">
            <div class="mb-3">
                <label for="no_pinjaman" class="form-label">No. Pinjaman</label>
                <input type="text" class="form-control" id="no_pinjaman" name="no_pinjaman" required>
            </div>
            <div class="mb-3">
                <label for="id_user" class="form-label">ID User</label>
                <input type="text" class="form-control" id="id_user" name="id_user" required>
            </div>
            <div class="mb-3">
                <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
                <input type="date" class="form-control" id="tgl_pinjam" name="tgl_pinjam" required>
            </div>
            <div class="mb-3">
                <label for="nominal" class="form-label">Nominal</label>
                <input type="number" class="form-control" id="nominal" name="nominal" required>
            </div>
            <div class="mb-3">
                <label for="tenor" class="form-label">Tenor</label>
                <input type="number" class="form-control" id="tenor" name="tenor" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Pinjaman</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>