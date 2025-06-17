<?php

session_start();
include 'connect.php';

$tel = $_POST['tel'];
$password = $_POST['password'];

$query = mysqli_query($connect, "SELECT * FROM `users` WHERE `tel` = '$tel' AND `password` = '$password'");

if(mysqli_num_rows($query) > 0) {
    $user = mysqli_fetch_assoc($query);
    $_SESSION['user'] = [
        "id" => $user['id'],
        "name" => $user['name'],
        "tel" => $user['tel'],
        "password" => $user['password'],
        "role" => $user['role']
    ];
    header("Location: ../index.php");
}
else {
    $_SESSION['message'] = "Неверный телефон или пароль";
    header("Location: ../login.php");
}

?>