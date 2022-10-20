<?php

session_start();
require_once '../config/connect.php';

if(isset($_SESSION['user']['id'])) {
    $id = $_SESSION['user']['id'];
    $full_name = $_POST['full_name'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $avatar = $_POST['avatar'];
}

if ($avatar) {
    $path = $avatar;
    } else
    {
        $path = 'uploads/' . time() . $_FILES['avatar']['name'];
        if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../../' . $path)) {
            $_SESSION['message'] = 'Ошибка при загрузке сообщения';
            header('Location: ../register.php');
        }
    }

    mysqli_query($connect, "UPDATE `users` SET `full_name` = '$full_name', `login` = '$login', `email` = '$email', `avatar` = '$path' WHERE `users`.`id` = '$id'");


    $_SESSION['message'] = 'Профиль обновлен!';
    header('Location: show.php');
?>
