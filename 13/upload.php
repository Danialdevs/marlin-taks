<?php
include "db.php";
session_start();

function generatName($filename) {
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    return date("Ymd_His"). rand(0, 50000) . '.' . $extension;
}


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}
if(!isset($_FILES['images'])) {
    $_SESSION["error"] = "Изображение не загружено";

    header('Location: index.php');
    exit;
}

foreach ($_FILES["images"]["name"] as $key => $name) {

    $filename = $_FILES["images"]['name'][$key];
    $filetype = $_FILES["images"]['type'][$key];
    $tmp_name = $_FILES["images"]['tmp_name'][$key];


    $allowed_types = ['image/jpeg', 'image/png'];
    if (!in_array($filetype, $allowed_types)) {
        $_SESSION["error"] = "Можно загрузать файлы только в формате: jpg, png";
        header('Location: index.php');
        exit;
    }

    $uniqueName = generatName($filename);
    if(move_uploaded_file($tmp_name, 'images/' . $uniqueName)){
        $filepath = "images/$uniqueName";
        $pdo->query("INSERT INTO images (path) VALUES ('$filepath')");
    }
    $_SESSION["success"] = "Изображение загружено";
}




header('Location: index.php');
exit;