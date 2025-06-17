<?php
session_start();
include 'vendor/connect.php';

$spec = $_POST['specialist'];
$services = $_POST['services'];
$date = $_POST['date'];
$time = $_POST['time'];
$id = $_SESSION['user']['id'];

$query = mysqli_query($connect, "SELECT * FROM `app` WHERE `id_spec` = '$spec' and `time` = '$time' and `date` = '$date'");
if(mysqli_num_rows($query) == 0) {
    mysqli_query($connect, "INSERT INTO `app`(`id`, `id_services`, `date`, `time`, `id_spec`, `id_user`) VALUES (null,'$services','$date','$time','$spec', '$id')");
    header("Location: profile.php");
}
else {
    $_SESSION['message'] = "Данное время недоступно для записи!";
    header("Location: app.php");
}



?>