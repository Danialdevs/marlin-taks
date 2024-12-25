<?php
require_once 'db.php';
SESSION_START();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    if(empty($id)){
        $_SESSION["error"] = "Ошибка.";
        header("Location: index.php");
        exit();
    }

    $_SESSION["success"] = "Действие выполнено успешно.";
    $sql = "DELETE FROM expenses WHERE id=$id";
    $pdo->query($sql);

    header("Location: index.php");
}