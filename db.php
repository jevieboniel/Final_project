<?php
$host = 'localhost';
$db = 'todo_list';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$db`");
    $pdo->exec("USE `$db`");

    $sql = "CREATE TABLE IF NOT EXISTS tasks (id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, task VARCHAR(50) NOT NULL)";
    $pdo->exec($sql);
    //echo "Database & Table created"

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>