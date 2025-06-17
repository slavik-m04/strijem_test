<?php
session_start();
include 'vendor/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>СТРИЖЁМ</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'header.php' ?>
<!--Intro -->
    <div class="intro">
        <div class="container">
            <div class="intro__inner">
                <div class="intro__content">
                    <h1 class="intro__title">СТРИЖЁМ</h1>
                    <a class="btn" href="app.php">ЗАПИСАТЬСЯ</a>
                </div>
                <div class="intro__photo">
                    <img class="intro__img" src="img/intro.jpg" alt="">
                </div>

            </div>
        </div>
    </div>



<!-- services -->
<div class="container"  id="services">
    <h1 class="services__title">Услуги</h1>
    <ul class="services">
        <div class="services__inner">

            <div class="services__block">
            <h2 class="services__subtitle">Основные:</h1>
            <?php 
            $services = mysqli_query($connect, "SELECT * FROM `services` WHERE `role` = 'osnov'");
            while($row = mysqli_fetch_assoc($services)) {
                echo '<li class="services__item">'.$row['name'].' ............ <span>'.$row['price'].' руб.</span></li>';
            }
            
            ?>
                
                
            </div>
            <div class="services__block">
                <h2 class="services__subtitle">Дополнительные:</h2>
                <?php 
                $services = mysqli_query($connect, "SELECT * FROM `services` WHERE `role` = 'dop'");
                while($row = mysqli_fetch_assoc($services)) {
                echo '<li class="services__item">'.$row['name'].' ............ <span>'.$row['price'].' руб.</span></li>';
            }
            ?>
            </div>
            <div class="services__block">
                <h2 class="services__subtitle">Комплексные:</h2>
                <?php 
            $services = mysqli_query($connect, "SELECT * FROM `services` WHERE `role` = 'comp'");
            while($row = mysqli_fetch_assoc($services)) {
                echo '<li class="services__item">'.$row['name'].' ............ <span>'.$row['price'].' руб.</span></li>';
            }
            ?>
                
            </div>
            
    </ul>
    </div>
</div>
<!-- Gallery -->
<div class="team" id="gallery">
    <div class="container">
        <h1 class="team__title">Галерея</h1>
        <div class="team__inner">
            
            <div class="team__item">
                <img class="gallery__item" src="img/галерея/1680234547_3-42.jpg" alt="">          
            </div>
            <div class="team__item">
                <img class="gallery__item" src="img/галерея/1699408896_o-tendencii-com-p-barbershop-muzhskie-strizhki-2023-foto-17.jpg" alt="">           
            </div>
            <div class="team__item">
                <img class="gallery__item" src="img/галерея/muzhskie-pricheski-barbershop_66.jpeg" alt="">          
            </div>
            <div class="team__item">
                <img class="gallery__item" src="img/галерея/DSC_0854.jpg" alt="">          
            </div>
            <div class="team__item">
                <img class="gallery__item" src="img/галерея/muzhskie-pricheski-barbershop_17.jpeg" alt="">          
            </div>
            
            <div class="team__item">
                <img class="gallery__item" src="img/галерея/b82ed99d9a9da9088bc8f89776477078.jpg" alt="">        
            </div>
        </div>
    </div>
</div>

<!-- Team -->
<div class="team" id="team">
    <div class="container">
        <h1 class="team__title">Наши специалисты</h1>
        <div class="team__inner">
            
            <div class="team__item">
                <img class="team__photo" src="img/барбер1.png" alt="">
                <div class="team__name">Петр</div>
         
            </div>

            <div class="team__item">
                <img class="team__photo" src="img/барбер2.png" alt="">
                <div class="team__name">Павел</div>
            
            </div>

            
            <div class="team__item">
                <img class="team__photo" src="img/сотрудники/мужик4.png" alt="">
                <div class="team__name">Ремир</div>
          
            </div>
            <div class="team__item">
                <img class="team__photo" src="img/барбер3.png" alt="">
                <div class="team__name">Семен</div>
         
            </div>
            <div class="team__item">
                <img class="team__photo" src="img/барбер4.png" alt="">
                <div class="team__name">Дмитрий </div>
         
            </div>
            <div class="team__item">
                <img class="team__photo" src="img/сотрудники/мужик5.png" alt="">
                <div class="team__name">Александр</div>
         
            </div>

        </div>
    </div>
</div>

<!--contacts -->
<div class="contacts" id="contacts">
        <div class="container">
        <h1 class="contacts__title">Контакты:</h1>
            <div class="contacts__inner">

                <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ad97c3781cdbf4a68ab5a18e341ba49b18dcecc33b8564ef1d365247466fa896d&amp;width=424&amp;height=240&amp;lang=ru_RU&amp;scroll=true"></script>

                <ul class="contacts__content">
                    <div class="contacts__block">
                        <li class="contacts__item">+7 961 321-98-53</li>
                        <li class="contacts__item">Волгоград, Кировский р-н, ул. Курчатова, 9, Торговый центр "Космос", 2-й этаж</li>
                        <li class="contacts__item">Ежедневно <span>с 10.00 до 21.00</span></li>
                    
                    <a class="btn" href="app.php">ЗАПИСАТЬСЯ</a>
                </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>