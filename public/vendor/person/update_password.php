<?php

session_start();
require_once '../config/connect.php';

if(isset($_POST["id"]) && !empty($_POST["id"])) {
    $id = $_POST["id"];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
}

if ($password === $password_confirm) {

    $password = md5($password);

mysqli_query($connect, "UPDATE `users` SET `password`  = '$password' WHERE `users`.`id` = '$id'");


$_SESSION['message'] = 'Пароль обновлен!';
header('Location: show.php');


} else {
    $_SESSION['message'] = 'Пароли не совпадают';
    header('Location: edit_password.php');
}

?>
