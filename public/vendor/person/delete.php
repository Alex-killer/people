<?php

unset($_SESSION['user']);
require_once '../config/connect.php';

$id = $_GET['id'];
$result = mysqli_query($connect, "SELECT avatar FROM `users` WHERE id = '$id'");
$row = mysqli_fetch_array($result);
$dir='../../';

unlink($dir.$row[0]);

$user = mysqli_query($connect, "DELETE FROM `users` WHERE `users` . `id` = '$id'");

header('Location: ../../index.php');