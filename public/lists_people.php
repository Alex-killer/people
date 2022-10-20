<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}
require_once 'vendor/config/connect.php';
require_once 'vendor/header.php';
?>

<div class="container mt-5">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">ФИО</th>
            <th scope="col">Логин</th>
            <th scope="col">Email</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if($users = mysqli_query($connect, "SELECT * FROM `users`")){
            if(mysqli_num_rows($users) > 0){
                $users = mysqli_fetch_all($users);
                foreach ($users as $user) {
                    ?>
                        <tr>
                            <th scope="row"><?= $user[0] ?></th>
                            <td><?= $user[1] ?></td>
                            <td><?= $user[2] ?></td>
                            <td><?= $user[3] ?></td>
                        </tr>
                   <?php
                }
            } else{
                echo "<p class='lead'><em>Нет записей</em></p>";
            }
        } else{
            echo "Ошибка. " . mysqli_error($connect);
        }
        ?>
        </tbody>
    </table>
    <button class="btn btn-primary" onclick="history.go(-1);">Назад</button>
</div>
