<?php
session_start();

require_once '../config/connect.php';
require_once '../header.php';
$id = $_GET['id'];
$user = mysqli_query($connect, "SELECT * FROM `users` WHERE `id` = '$id'");
$user = mysqli_fetch_assoc($user);
?>

<div class="container mt-5 col-md-5">
    <form action="update_password.php" method="post">
        <input type="hidden" name="id" value="<?= $user['id'] ?>">
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Введите пароль">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Подтверждение пароля</label>
            <input type="password" name="password_confirm" class="form-control" id="exampleInputPassword1" placeholder="Подтвердите пароль">
        </div>
        <?php
        if ($_SESSION['message']) {
            echo '<p class="text-danger"> ' . $_SESSION['message'] . ' </p>';
        }
        unset($_SESSION['message']);
        ?>
        <button type="submit" class="btn btn-primary">Обновить пароль</button>
    </form>
</div>
