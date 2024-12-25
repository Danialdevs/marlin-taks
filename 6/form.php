<?php
$comment = $_POST['comment'];
$pdo = new PDO('mysql:host=localhost;dbname=learn', 'root', '');
$pdo->query("INSERT INTO comments (comment) VALUES ('$comment')");
header("Location: index.php");

