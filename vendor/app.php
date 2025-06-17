<?php
session_start();
include 'vendor/connect.php';
$result = mysqli_query($connect, "SELECT * FROM `users` WHERE `role` = 'barber'");
$services = mysqli_query($connect, "SELECT * FROM `services`");
if(!isset($_SESSION['user'])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Запись</title>
    <link rel="stylesheet" href="css/app.css">
    <script src="js/jquery-3.4.1.js" ></script>
</head>
<body>
<?php include 'header.php'; ?>
<div class="container">
<div class="app">
<h1>Бронирование</h1>

<form action="insapp.php" method="POST">
    <details class="details">
        <summary class="summary">Посмотреть записи</summary>
        <?php
        $query = mysqli_query($connect, "SELECT * FROM `app` ORDER BY `date` ASC");
        while($row = mysqli_fetch_assoc($query)) {
            echo '<p>Специалист:';
            $id_spec = $row['id_spec'];
            $spec = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `users` where `id` = '$id_spec'"));
            echo $spec['name'];
            echo '</p>';
    
            echo '<p>Дата:'.$row['date'].'</p>';
            echo '<p>Время:'.$row['time'].'</p><br><br>';
        }
        ?>
    </details>
    <div class="object">
    <label for="specialist">Выберите специалиста:</label>
    <select name="specialist" id="specialist">
    <?php
    while($row = mysqli_fetch_assoc($result)){
    echo "<option value='".$row['id']."'>".$row['name']."</option>";
   }
   
   ?>
    </select>
    </div>
    <div class="object">
    <label for="services">Выберите услугу:</label>
    <select name="services" id="services" required>
    <?php
    while($serv = mysqli_fetch_assoc($services)){
    echo "<option value='".$serv['id']."'>".$serv['name']."</option>";
   }?>
    </select>
    </div>

    <div class="object">
   <label for="date">Выберите дату:</label>
    <input type="date" name="date" id="date" required>
    </div>

    <div class="object">
    <label for="time">Выберите время:</label>
    <select name="time" id="time" required>
        <option value="10:00">10:00</option>
        <option value="12:00">12:00</option>
        <option value="14:00">14:00</option>
        <option value="16:00">16:00</option>
        <option value="18:00">18:00</option>
        <option value="20:00">20:00</option>
    </select>
    </div>

    <input type="submit" class="button" value="Записаться">
    <?php
        if(isset($_SESSION['message'])) {
            echo '<p class="msg">'.$_SESSION['message'].'</p>';
        }
        unset($_SESSION['message']);
        ?>
</form>

    </div>
    </div>
    <script>
$(function(){
    var dtToday = new Date();
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
     day = '0' + day.toString();
    var maxDate = year + '-' + month + '-' + day;
    $('#date').attr('min', maxDate);
});
</script>

</body>
</html>