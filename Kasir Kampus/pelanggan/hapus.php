<?php
session_start();
$index = filter_input(INPUT_GET, 'index', FILTER_VALIDATE_INT);
if ($index !== false && $index !== null && isset($_SESSION['pelanggan'][$index])) {
    array_splice($_SESSION['pelanggan'], $index, 1);
}
header('Location: list.php');
exit;
