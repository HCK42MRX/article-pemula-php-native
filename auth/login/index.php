<?php
session_start();
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../utils/isLogin.php';

if (isLogin()) {
    header("location: http://localhost/belajar_php/");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $form_username = trim($_POST['username']);
    $form_password = trim($_POST['password']);
    $err_username = $err_password = '';
    if (empty($form_username)) {
        $err_username = 'Username harus diisi';
    } else {
        $form_username = htmlspecialchars($form_username);
    }

    if (empty($form_password)) {
        $err_password = 'Password harus diisi';
    } else {
        $form_password = htmlspecialchars($form_password);
    }

    if (empty($err_username) && empty($err_password)) {
        // Masukkan ke database di sini
        try {
            // Siapkan query pakai prepared statement
            $sql = "SELECT username, password FROM users WHERE username=:username";
            $stmt = $conn->prepare($sql);

            // Bind parameter
            $stmt->bindParam(':username', $form_username);
            // Eksekusi
            $stmt->execute();
            $data = $stmt->fetch();

            // Jika berhasil
            if ($data) {
                if ($data['username'] === $form_username && $data['password'] === $form_password) {
                    $_SESSION['id'] = $data['id'];
                    $_SESSION['isLogin'] = true;
                    header("location: http://localhost/belajar_php/");
                    exit();
                } else {
                    $err_auth = 'Password salah';
                }
            } else {
                $err_auth = 'User tidak ditemukan';
            }

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
    <title>Login</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="login-container">
        <p class="error-message"><?= $err_auth ?? '' ?></p>
        <h2>Login</h2>
        <form action="" method="POST">
            <p class="error-message"><?= $err_username ?? '' ?></p>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="<?= $form_username ?? '' ?>" />
            </div>
            <p class="error-message"><?= $err_password ?? '' ?></p>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" value="<?= $form_password ?? '' ?>" />
            </div>

            <button type="submit">Masuk</button>

            <p class="helper-text">
                <a href="http://localhost/belajar_php">Kembali ke Home</a>
            </p>
        </form>
    </div>
</body>

</html>