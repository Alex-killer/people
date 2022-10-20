<?php
session_start();

if ($_SESSION['user']) {
    header('Location: vendor/person/show.php');
}
require_once '../config/connect.php';
require_once '../header.php';
?>

<div class="container mt-5 col-md-5">
    <form action="store.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">ФИО</label>
            <input type="text" name="full_name" class="form-control" placeholder="Введите свое полное имя" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Логин</label>
            <input type="text" name="login" class="form-control" placeholder="Введите свой логин" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Введите адрес своей почты" id="exampleInputEmail1" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Изображение профиля</label>
            <input type="file" name="avatar" class="form-control">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Введите пароль" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Подтверждение пароля</label>
            <input type="password" name="password_confirm" class="form-control" id="exampleInputPassword1" placeholder="Подтвердите пароль" required>
        </div>
        <p>
            У вас уже есть аккаунт? - <a href="/">авторизируйтесь</a>!
        </p>
        <?php
        if ($_SESSION['message']) {
            echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
        }
        unset($_SESSION['message']);
        ?>
        <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
    </form>
</div>
