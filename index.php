<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link href="styles/site.css" rel="stylesheet">
    <title>Интернет-магазин</title>
</head>
<body>
<header>
    <div id="headerInside">
        <div id="Name"><a href="index.php">
                Shopping
            </a></div>
        <div id="navWrap">
            <a href="index.php">
                Главная
            </a>
            <a href="review_form.php">
                Отзывы
            </a>
            <a href="user/auth.php">
                Войти
            </a>
            <a href="user/reg.php">
                Зарегистрироваться
            </a>
            <a href="cart/cart.php">
                Корзина
            </a>
        </div>
    </div>
</header>

<div id="content">
    <p><h1><b>КАТАЛОГ ТОВАРОВ</b></h1></p>
<?php
    if(isset($message)){
        echo "<h2>$message</h2>";
    }
?>
    <?php
        require "config.php";
            $sql = "SELECT * FROM goods ORDER BY views DESC";
            $res = mysqli_query($connect, $sql);
                while ($data = mysqli_fetch_assoc($res)){
    ?>
    <p><b><?= $data['title']?></b></p> <a href="cart/cart.php?page=goods&action=add&id<?= $data['id']?>">Добавить товар в корзину</a> <br>
    .<a href='goods.php?id=<?= $data['id'] ?>'>
        <img src="images/small/<?= $data['img']?>" alt="">
    </a> <br>
    <?php
    };
    ?>
</div>

<footer>
    <div id="footerInside">
        <div id="copyrights">&copy; Shopping</div>
    </div>
</footer>

</body>
</html>

