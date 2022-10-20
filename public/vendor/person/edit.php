<?php

session_start();
require_once '../config/connect.php';
require_once '../header.php';

$id = $_GET['id'];
$user = mysqli_query($connect, "SELECT * FROM `users` WHERE `id` = '$id'");
$user = mysqli_fetch_assoc($user);
?>

<div class="container mt-5 col-md-4">
    <form action="update.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $user['id'] ?>">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">ФИО</label>
            <input type="text" name="full_name" value="<?= $user['full_name'] ?>" class="form-control" id="login" placeholder="Введите свое полное имя" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Логин</label>
            <input type="text" name="login" value="<?= $user['login'] ?>" class="form-control" id="login" aria-describedby="emailHelp" placeholder="Введите свой логин" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" name="email" value="<?= $user['email'] ?>" class="form-control" id="exampleInputEmail1" placeholder="Введите email" required>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Изображение профиля</label>
            <div>
                <img src="../../<?= $user['avatar'] ?>" alt="" width="200">
            </div>
            <input class="form-control" type="file" name="avatar" value="<?= $user['avatar'] ?>" id="formFile">
        </div>
        <button type="submit" class="btn btn-primary">Обновить</button>
        <?php
        if ($_SESSION['message']) {
            echo '<p class="text-danger"> ' . $_SESSION['message'] . ' </p>';
        }
        unset($_SESSION['message']);
        ?>
    </form>
</div>