<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] == 'add') {
        $no_pinjaman = $_POST['no_pinjaman'];
        $id_user = $_POST['id_user'];
        $tgl_pinjam = $_POST['tgl_pinjam'];
        $nominal = $_POST['nominal'];
        $tenor = $_POST['tenor'];

        $sql = "INSERT INTO pinjaman (no_pinjaman, id_user, tgl_pinjam, nominal, tenor) VALUES ('$no_pinjaman', '$id_user', '$tgl_pinjam', '$nominal', '$tenor')";

        if ($conn->query($sql) === TRUE) {
            header('Location: ../pinjaman.php?message=Pinjaman berhasil ditambahkan');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif ($_POST['action'] == 'update') {
        $no_pinjaman = $_POST['no_pinjaman'];
        $id_user = $_POST['id_user'];
        $tgl_pinjam = $_POST['tgl_pinjam'];
        $nominal = $_POST['nominal'];
        $tenor = $_POST['tenor'];

        $sql = "UPDATE pinjaman SET id_user='$id_user', tgl_pinjam='$tgl_pinjam', nominal='$nominal', tenor='$tenor' WHERE no_pinjaman='$no_pinjaman'";

        if ($conn->query($sql) === TRUE) {
            header('Location: ../pinjaman.php?message=Pinjaman berhasil diupdate');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif ($_POST['action'] == 'delete') {
        $no_pinjaman = $_POST['no_pinjaman'];

        $sql = "DELETE FROM pinjaman WHERE no_pinjaman='$no_pinjaman'";

        if ($conn->query($sql) === TRUE) {
            header('Location: ../pinjaman.php?message=Pinjaman berhasil dihapus');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
