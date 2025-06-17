<?php
session_start();
include 'vendor/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header class="header">
            <a href="index.php" class="logo">СТРИЖЁМ</a>
            <div class="header__nav">
                <a href="index.php#services" class="nav">Услуги</a>
                <a href="index.php#gallery" class="nav">Галерея</a>
                <a href="index.php#team" class="nav">Команда</a>
                <a href="index.php#contacts" class="nav">Контакты</a>
                
            </div>
            <a href="app.php" class="rec">Записаться</a>
            <div class="user">
            <?php
            if(isset($_SESSION['user'])) {
                if($_SESSION['user']['role'] == "admin") {?>
                    <a href="profile.php" class="a">Админ</a>
                    <a href="vendor/logout.php" class="a">Выйти</a>
              <?php } 
                else {?>
                    <a href="profile.php" class="a">Мои записи</a>
                    <a href="vendor/logout.php" class="a">Выйти</a>
                <?php }
            }
            else {?>
                <a href="login.php" class="login">Вход</a>
                <a href="reg.php" class="login">Регистрация</a>
          <?php }
            ?>
        </div>
        </header>

    </div>
</body>
</html>