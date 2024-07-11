<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] == 'add') {
        $id_user = $_POST['id_user'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $email = $_POST['email'];
        $hak_akses = $_POST['hak_akses'];

        $sql = "INSERT INTO users (id_user, username, password, email, Hak_akses) VALUES ('$id_user', '$username', '$password', '$email', '$hak_akses')";

        if ($conn->query($sql) === TRUE) {
            header('Location: ../user.php?message=User berhasil ditambahkan');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif ($_POST['action'] == 'update') {
        $id_user = $_POST['id_user'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $hak_akses = $_POST['hak_akses'];

        $password_sql = $password ? ", password='" . password_hash($password, PASSWORD_DEFAULT) . "'" : '';
        $sql = "UPDATE users SET username='$username', email='$email', Hak_akses='$hak_akses' $password_sql WHERE id_user='$id_user'";

        if ($conn->query($sql) === TRUE) {
            header('Location: ../user.php?message=User berhasil diupdate');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif ($_POST['action'] == 'delete') {
        $id_user = $_POST['id_user'];

        $sql = "DELETE FROM users WHERE id_user='$id_user'";

        if ($conn->query($sql) === TRUE) {
            header('Location: ../user.php?message=User berhasil dihapus');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
