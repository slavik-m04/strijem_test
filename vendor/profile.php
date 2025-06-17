<?php
include 'vendor/connect.php';
session_start();
$id = $_SESSION['user']['id'];
if(!isset($_SESSION['user'])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль</title>
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
    <?php include 'header.php';?>
    <div class="container">
    <div class="main">
   <?php 
   if($_SESSION['user']['role'] == "user") {
    ?>
    <h1>Мои записи</h1>
    <div class="apps1">
    <?php 
    $query = mysqli_query($connect, "SELECT * FROM `app` where `id_user` = '$id' ORDER BY `date` ASC");
    while($row = mysqli_fetch_assoc($query)) {
 
        echo '<div class="app"><p>Услуга:';
        $id_serv = $row['id_services'];
        $services = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `services` where `id` = '$id_serv'"));
        echo $services['name'];
        echo '</p>';

        echo '<p>Специалист:';
        $id_spec = $row['id_spec'];
        $spec = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `users` where `id` = '$id_spec'"));
        echo $spec['name'];
        echo '</p>';

        echo '<p>Дата:'.$row['date'].'</p>';
        echo '<p>Время:'.$row['time'].'</p>
        <form action="delapp.php" method="POST">
        <input type="hidden" name="id" value="'.$row['id'].'">
        <input type="submit" class="submit" value="Отменить">
        </form>
        </div>';
    }
    }
    elseif ($_SESSION['user']['role'] == "barber") {?>
       <h1>Забронировали</h1>
    <?php
    $query = mysqli_query($connect, "SELECT * FROM `app` WHERE `id_spec` = '$id' ORDER BY `date`ASC");
    
    while($row = mysqli_fetch_assoc($query)) {
        echo '<div class="app"><p>Клиент:';
        $id_user = $row['id_user'];
        $user = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `users` where `id` = '$id_user'"));
        echo $user['name'];
        echo '</p>';
        echo '<p>Услуга:';
        $id_serv = $row['id_services'];
        $services = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `services` where `id` = '$id_serv'"));
        echo $services['name'];
        echo '</p>';

        echo '<p>Дата:'.$row['date'].'</p>';
        echo '<p>Время:'.$row['time'].'</p></div>';
    }
    }
    
    elseif ($_SESSION['user']['role'] == "admin") {?>
    <h1>Все записи</h1>
       <?php
       $query = mysqli_query($connect, "SELECT * FROM `app` ORDER BY `date`ASC");
       while($row = mysqli_fetch_assoc($query)) {
        echo '<div class="app"><p>Клиент:';
        $id_user = $row['id_user'];
        $user = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `users` where `id` = '$id_user'"));
        echo $user['name'];
        echo '</p>';

        echo '<p>Номер клиента:';
        $id_user = $row['id_user'];
        $user = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `users` where `id` = '$id_user'"));
        echo $user['tel'];
        echo '</p>';

        echo '<p>Специалист:';
        $id_spec = $row['id_spec'];
        $spec = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `users` where `id` = '$id_spec'"));
        echo $spec['name'];
        echo '</p>';

        echo '<p>Услуга:';
        $id_serv = $row['id_services'];
        $services = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `services` where `id` = '$id_serv'"));
        echo $services['name'];
        echo '</p>';
        
        echo '<p>Дата:'.$row['date'].'</p>';
        echo '<p>Время:'.$row['time'].'</p>
        <form action="delapp.php" method="POST">
        <input type="hidden" name="id" value="'.$row['id'].'">
        <input type="submit" class="submit" value="Отменить">
        </form>
        </div>';
        
    }
    }
    ?>
    </div>
    </div>
    </div>
</body>
</html>