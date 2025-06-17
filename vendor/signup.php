<?php
session_start();
include 'connect.php';

$name = $_POST['name'];
$tel = $_POST['tel'];
$password = $_POST['password'];
$passwordConfirm = $_POST['passwordConfirm'];
$check = mysqli_query($connect, "SELECT * FROM `users` WHERE `tel` = '$tel'");
$num = mysqli_num_rows($check);

if($num == 0) {
    if($password == $passwordConfirm) {
        mysqli_query($connect, "INSERT INTO `users` (`name`,`tel`,`password`) VALUES ('$name','$tel','$password')");
        header("Location: ../login.php");
        $_SESSION['message'] = "Регистрация прошла успешно!";
    }
    else {
        $_SESSION['message'] = "Пароли не совпадают!";
        header("Location: ../reg.php");
    }
}
else {
    $_SESSION['message'] = "Пользователь с таким телефоном уже существует!";
    header("Location: ../reg.php");
}

?>