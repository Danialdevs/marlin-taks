<?php
require_once 'db.php';
SESSION_START();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $amount = $_POST['amount'];

    if(empty($name) || empty($amount)){
        $_SESSION["error"] = "Ошибка.";
        header("Location: index.php");
        exit();
    }

    $_SESSION["success"] = "Действие выполнено успешно.";
    $sql = "INSERT INTO expenses (name, amount) VALUES ('$name', $amount)";
    $pdo->query($sql);

    header("Location: index.php");
}