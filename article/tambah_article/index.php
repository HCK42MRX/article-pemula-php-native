<?php
session_start();
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../utils/isLogin.php';

if (!isLogin()) {
    header('location: http://localhost/belajar_php/');
    $_SESSION["pesan"] = 'Anda Belum Login';
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    date_default_timezone_set('Asia/Jakarta');
    $title = trim($_POST["title"]);
    $content = trim($_POST['content']);
    $err_title = $err_content = '';
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>

    <div class="container">
        <h1>Tambah Artikel</h1>
        <form action="" method="POST">
            <label for="title">Judul Artikel</label>
            <input type="text" id="title" name="title" placeholder="Masukkan judul artikel"
                value="<?= $title ?? '' ?>" />
            <p class="error-message"><?= $err_title ?? '' ?></p>
            <label for="content">Isi Artikel</label>
            <textarea id="content" name="content"
                placeholder="Tulis isi artikel di sini..."><?= $content ?? '' ?></textarea>
            <p class="error-message"><?= $err_content ?? '' ?></p>

            <button type="submit" class="btn">Simpan Artikel</button>
        </form>

        <a href="../../index.php" class="back-link">← Kembali ke Beranda</a>
    </div>
</body>

</html>