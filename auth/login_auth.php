<?php
session_start();
require_once("..//config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usename = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username='$usename'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verifikasi password
        if (password_verify($password, $row["password"])) {
            $_SESSION["username"] = $usename;
            $_SESSION["name"] = $row["name"];
            $_SESSION["role"] = $row["role"];
            $_SESSION["user_id"] = $row["user_id"];
            // Set notifikasi selamat datang
            $_SESSION['notification'] = [
                'type' => 'primary',
                'massage' => 'Selamat Datang Kembali!'
            ];
            // Redirect ke dasboard
            header('Location: ../dashboard.php');
            exit();
        } else {
            // Password salah
            $_SESSION['notification'] = [
                'type' => 'danger',
                'massage' => 'Username atau Password salah'
            ];
        }