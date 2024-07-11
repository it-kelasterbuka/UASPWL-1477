<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kelola Pinjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
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
                        <a class="nav-link" href="pinjaman.php">Pinjaman</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h2>Kelola Pinjaman</h2>
        <a href="action/pinjaman_action/add_pinjaman.php" class="btn btn-success mb-3">Tambah Pinjaman</a>
        <?php
        include 'koneksi.php';
        $sql = "SELECT * FROM pinjaman";
        $result = $conn->query($sql);
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th>No Pinjaman</th>
                    <th>ID User</th>
                    <th>Tanggal Pinjam</th>
                    <th>Nominal</th>
                    <th>Tenor</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?php echo $row['no_pinjaman']; ?></td>
                        <td><?php echo $row['id_user']; ?></td>
                        <td><?php echo $row['tgl_pinjam']; ?></td>
                        <td><?php echo $row['nominal']; ?></td>
                        <td><?php echo $row['tenor']; ?></td>
                        <td>
                            <a href="action/pinjaman_action/update_pinjaman.php?no_pinjaman=<?php echo $row['no_pinjaman']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="action/pinjaman_action/delete_pinjaman.php?no_pinjaman=<?php echo $row['no_pinjaman']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>