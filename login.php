<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="css/sign.css">
</head>

<body>
    <?php include 'header.php'?>
    <div class="auth">
    <form action="vendor/signin.php" method="POST">
        <input type="tel" placeholder="Введите телефон" name="tel" data-validate-field="tel" required>
        <input type="password" placeholder="Введите пароль" name="password" data-validate-field="password" minlength="5" required>
        <input type="submit" value="Войти">
        <a href="reg.php">Регистрация</a>
        <?php
        if(isset($_SESSION['message'])) {
            echo '<p class="msg">'.$_SESSION['message'].'</p>';
        }
        unset($_SESSION['message']);
        ?>
    </form>
    </div>
    <script src="js/inputmask.min.js"></script>
	<script src="js/just-validate.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>