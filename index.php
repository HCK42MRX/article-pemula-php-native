<?php
session_start();
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/utils/isLogin.php';

// Fungsi flash message sekali tampil
function flash($key)
{
    if (isset($_SESSION[$key])) {
        $msg = $_SESSION[$key];
        unset($_SESSION[$key]);
        return $msg;
    }
    return '';
}

// Fungsi format tanggal Indonesia (opsional)
function tglIndo($tanggal)
{
    return date("d M Y", strtotime($tanggal));
}
// Ambil semua artikel
$stmt = $conn->prepare("SELECT * FROM articles ORDER BY release_date DESC");
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CRUD Artikel - Home</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">

        <?= flash('pesan') ?>

        <div class="auth-button">
            <?php if (isLogin()): ?>
                <a href="auth/logout" class="btn-logout">Logout</a>
            <?php else: ?>
                <a href="auth/login" class="btn-login">Login</a>
            <?php endif; ?>
        </div>

        <h1>Daftar Artikel</h1>

        <?php if (isLogin()): ?>
            <a href="article/tambah_article" class="btn">+ Tambah Artikel</a>
        <?php endif; ?>

        <?php foreach ($result as $data): ?>
            <div class="article">
                <h2><?= htmlspecialchars($data['title']) ?></h2>
                <p class="text-muted">Release: <?= tglIndo($data['release_date']) ?></p>
                <p>
                    <?php
                    $isLong = strlen($data['content']) > 80;
                    $content = $isLong
                        ? substr($data['content'], 0, 200) . ' <a class="read-more" href="article/lihat_article?id=' . urlencode($data['id']) . '">...Lihat Selengkapnya</a>'
                        : $data['content'];
                    echo htmlspecialchars($content);
                    ?>
                </p>
                <div class="actions">
                    <?php if (isLogin()): ?>
                        <a href="article/lihat_article?id=<?= urlencode($data['id']) ?>">Lihat</a>
                        <a href="article/edit_article?id=<?= urlencode($data['id']) ?>">Edit</a>
                        <a href="article/hapus_article/?id=<?= urlencode($data['id']) ?>" class="delete">Hapus</a>
                    <?php else: ?>
                        <a href="article/lihat_article?id=<?= urlencode($data['id']) ?>">Lihat</a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>