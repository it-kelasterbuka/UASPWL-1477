<?php
include '../../koneksi.php';

$id_user = $_GET['id_user'];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Hapus User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4">
        <h2>Hapus User</h2>
        <form action="../../function/user_functions.php" method="post">
            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
            <p>Apakah Anda yakin ingin menghapus user dengan ID: <?php echo $id_user; ?>?</p>
            <button type="submit" class="btn btn-danger">Hapus User</button>
            <a href="user.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>