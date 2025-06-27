<?php
session_start();
require_once __DIR__ . '/../../config/config.php';

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM articles WHERE id=:id");
$stmt->bindParam(":id", $id);
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$data = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Detail Artikel</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="title"><?= $data['title'] ?></div>
        <div class="content">
            <p>
                <?= $data['content'] ?>
            </p>
        </div>
        <a href="../../index.php" class="back-link">← Kembali ke Beranda</a>
    </div>
</body>

</html>