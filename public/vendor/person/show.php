<?php
session_start();
if (!$_SESSION['user'] && empty($_SESSION['user'])) {
    header('Location: /');
}

require_once '../header.php';
?>
<div class="container">
    <form>
        <img src="../../<?= $_SESSION['user']['avatar'] ?>" class="rounded mx-auto d-block mt-4" width="400" alt="">
        <div class="card-body">
            <h5 class="card-title"><?= $_SESSION['user']['full_name'] ?></h5>
            <p class="card-text"><?= $_SESSION['user']['email'] ?></p>
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Профиль
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="edit.php?id=<?= $_SESSION['user']['id']?>">Редактировать профиль</a></li>
                    <li><a class="dropdown-item text-danger" href="delete.php?id=<?= $_SESSION['user']['id']?>">Удалить профиль</a></li>
                    <li><a class="dropdown-item" href="edit_password.php?id=<?= $_SESSION['user']['id']?>">Сменить пароль</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger" href="../logout.php">Выход</a></li>
                </ul>
            </div>
            <a class="btn btn-primary" href="../../lists_people.php" role="button">Список пользователей</a>
            <?php
            if ($_SESSION['message']) {
                echo '<p class="text-success text-center"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
            ?>
        </div>
    </form>
</div>