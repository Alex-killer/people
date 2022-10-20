<?php
session_start();

if ($_SESSION['user']) {
    header('Location: vendor/person/show.php');
}
require_once 'vendor/config/connect.php';
require_once 'vendor/header.php';
?>

<div class="container mt-5 col-md-5">
    <form action="vendor/signin.php" method="post">
        <div class="mb-3">
            <label class="form-label">Логин</label>
            <input type="login" name="login" class="form-control">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <p>
            У вас нет аккаунта? - <a href="vendor/person/create.php">зарегистрируйтесь</a>!
        </p>
        <?php
        if ($_SESSION['message']) {
            echo '<p class="text-danger"> ' . $_SESSION['message'] . ' </p>';
        }
        unset($_SESSION['message']);
        ?>
        <button type="submit" class="btn btn-primary">Войти</button>
    </form>
</div>

