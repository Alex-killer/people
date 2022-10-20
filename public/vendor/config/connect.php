<?php
$servername = "mysql";
$dbname = "test";
$username = "root";
$password = "root";

$connect = mysqli_connect($servername, $username, $password, $dbname);
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}