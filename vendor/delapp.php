<?php

session_start();
include 'vendor/connect.php';

$id = $_POST['id'];

mysqli_query($connect, "DELETE FROM `app` WHERE `id` = '$id'");
header("Location: profile.php");

?>