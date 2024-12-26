<?php
session_start();

if($_POST["number"] > 20 | empty($_POST["number"])){
    $_SESSION['guess_hint'] = "Число от 0 - 20";

    header('Location: index.php');
    exit();
}
if($_SESSION['attempts'] == 1){
    $_SESSION['game_result'] = "Вы проиграли! Загаданное число ". $_SESSION['number'] . ".";
    unset($_SESSION['number']);
    header('Location: index.php');
    exit();
}

if($_SESSION['number'] == $_POST['number']){
    $_SESSION['game_result'] = "Вы угадали! Загаданное число ". $_SESSION['number'] . ".";
    unset($_SESSION['number']);
    unset($_SESSION['attempts']);

}elseif($_SESSION['number'] < $_POST['number']){
    $_SESSION['guess_hint'] = "Загаданное число меньше.";
    $_SESSION["attempts"]--;
}elseif($_SESSION['number'] > $_POST['number']){
    $_SESSION['guess_hint'] = "Загаданное число больше.";
    $_SESSION["attempts"]--;
}
header('Location: index.php');
exit();