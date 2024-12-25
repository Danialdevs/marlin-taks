<?php
SESSION_START();
$comment = $_POST['comment'];
$pdo = new PDO('mysql:host=localhost;dbname=learn', 'root', '');

if(empty($comment)){
    $_SESSION['error'] = 'Заполните поле комментария!';
    header("Location: index.php");
    exit();
}

$pdo->query("INSERT INTO comments (comment) VALUES ('$comment')");
$_SESSION['success'] = 'Заполните поле ok!';

header("Location: index.php");

