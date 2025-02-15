<?php

$dsn = 'mysql:host=localhost;dbname=test_task;charset=utf8mb4';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Failed to connect to database: ' . $e->getMessage());
}