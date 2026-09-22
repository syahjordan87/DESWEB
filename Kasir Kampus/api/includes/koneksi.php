<?php

$host = "aws-0-ap-southeast-1.pooler.supabase.com";
$port = "5432";
$db   = "postgres";
$user = "postgres.kohpjgapqeipkfdwvomi";
$pass = "Jordan_Arema87";

try {

    $pdo = new PDO(
        "pgsql:host=$host;port=$port;dbname=$db",
        $user,
        $pass
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

    die("Koneksi database gagal: " . $e->getMessage());

}