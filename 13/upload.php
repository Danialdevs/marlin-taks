<?php
include "db.php";
session_start();

function generateName($filename) {
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    return date("Ymd_His") . rand(0, 50000) . '.' . $extension;
}

function uploadFile($tmpName, $destination) {
    return move_uploaded_file($tmpName, $destination);
}

function saveDB($pdo, $filePath) {
    $stmt = $pdo->prepare("INSERT INTO images (path) VALUES (:path)");
    return $stmt->execute(['path' => $filePath]);
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

if (!isset($_FILES['images'])) {
    $_SESSION["error"] = "Изображение не загружено";
    header('Location: index.php');
    exit;
}

$allowed_types = ['image/jpeg', 'image/png'];

foreach ($_FILES["images"]["name"] as $key => $name) {
    $filetype = $_FILES["images"]['type'][$key];
    $tmp_name = $_FILES["images"]['tmp_name'][$key];

    if (!in_array($filetype, $allowed_types)) {
        $_SESSION["error"] = "Можно загружать файлы только в формате: jpg, png";
        header('Location: index.php');
        exit;
    }

    $uniqueName = generateName($name);
    $direction = 'images/' . $uniqueName;

    if (!uploadFile($tmp_name, $direction)) {
        $_SESSION["error"] = "Ошибка загрузки файла: $name";
        header('Location: index.php');
        exit;
    }

    $filePath = "images/$uniqueName";
    if (!saveDB($pdo, $filePath)) {
        $_SESSION["error"] = "Ошибка сохранения пути в базу данных";
        header('Location: index.php');
        exit;
    }

    $_SESSION["success"] = "Изображение загружено";
}

header('Location: index.php');
exit;
