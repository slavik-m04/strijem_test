<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="css/sign.css">
</head>
<body>
<?php include 'header.php'?>
    <div class="auth">
    <form action="vendor/signup.php" method="POST">
        <input type="text" placeholder="Введите ФИО" name="name" data-validate-field="name" pattern="[А-Яа-яЁё\s]+" required>
        <input type="tel" placeholder="Введите телефон" name="tel" data-validate-field="tel" minlenght="11" required>
        <input type="password" placeholder="Введите пароль" name="password" data-validate-field="password" minlength="5" required>
        <input type="password" placeholder="Подтвердите пароль" name="passwordConfirm" data-validate-field="passwordConfirm" minlength="5" required>
        <input type="submit" value="Регистрация">
        <a href="login.php">Авторизация</a>
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