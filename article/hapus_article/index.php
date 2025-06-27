<?php
session_start();
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../utils/isLogin.php';

if (!isLogin()) {
    header('location: http://localhost/belajar_php/');
    $_SESSION["pesan"] = 'Anda Belum Login';
    exit;
}
try {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM articles WHERE id=:id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $_SESSION["pesan"] = 'data berhasil dihapus';
    header("location: http://localhost/belajar_php/");
} catch (PDOException $e) {
    // Tangkap error PDO
    echo "Error: " . $e->getMessage();
}
?>