<?php
require_once __DIR__ . "/../../utils/isLogin.php";
session_start();

if (isLogin()) {
    unset($_SESSION["isLogin"]);
    $_SESSION["pesan"] = "berhasil logout";
    header("location: http://localhost/belajar_php/");
} else {
    header("location: http://localhost/belajar_php/auth/login");
}

?>