<?php
// validasi input
session_start();
require_once('../../config/config.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $err_username = $err_email = $err_password = $err_confirm_password = '';
    if (empty($title)) {
        $err_title = 'Judul harus diisi';
    } else {
        $title = htmlspecialchars($title);
    }

    if (empty($content)) {
        $err_content = 'Content harus diisi';
    } else {
        $content = htmlspecialchars($content);
    }

    if (empty($err_title) && empty($err_content)) {
        // Masukkan ke database di sini
        $release_date = date('Y-m-d');

        try {
            // Siapkan query pakai prepared statement
            $sql = "INSERT INTO articles (title, content, release_date) VALUES (:title, :content, :release_date)";
            $stmt = $conn->prepare($sql);

            // Bind parameter
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':release_date', $release_date);

            // Eksekusi
            $stmt->execute();

            // Jika berhasil
            $_SESSION["pesan"] = "data article baru berhasil disimpan";
            header("location: http://localhost/belajar_php/");
            exit();

        } catch (PDOException $e) {
            // Tangkap error PDO
            echo "Error: " . $e->getMessage();
        }
    }
}
?>


<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="register-container">
        <h2>Daftar Akun</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required />
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required />
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required />
            </div>

            <div class="form-group">
                <label for="confirm">Konfirmasi Password</label>
                <input type="confirm_password" id="confirm" name="confirm" required />
            </div>

            <button type="submit">Daftar</button>

            <p class="helper-text">
                Sudah punya akun? <a href="../login/index.php">Masuk di sini</a>
            </p>
            <p class="helper-text">
                <a href="http://localhost/belajar_php">Kembali ke Home</a>
            </p>
        </form>
    </div>
</body>

</html>