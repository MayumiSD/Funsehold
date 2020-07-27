<?php
session_start();

?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>新規登録|Funsehold</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="面倒くさがりな私のための家事ノート。レシピも日記も家計簿も一つのアプリにまとめちゃう" />
        <meta name="keywords" content="家事, レシピ, 献立, 家計簿, 日記, 家事ノート, 買い物リスト" />
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="shortcut icon" href="favicon.ico">

        <!-- Animate.css -->
        <link rel="stylesheet" href="css/animate.css">
        <!-- Icomoon Icon Fonts-->
        <link rel="stylesheet" href="css/icomoon.css">
        <!-- Bootstrap  -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <!-- Owl Carousel -->
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/owl.theme.default.min.css">

        <link rel="stylesheet" href="css/style.css">


        <!-- Modernizr JS -->
        <script src="js/modernizr-2.6.2.min.js"></script>
        <!-- FOR IE9 below -->
        <!--[if lt IE 9]>
        <script src="js/respond.min.js"></script>
        <![endif]-->

            <!-- jQuery -->
        <script src="js/jquery.min.js"></script>
            <!-- jQuery Easing -->
        <script src="js/jquery.easing.1.3.js"></script>
            <!-- Bootstrap -->
        <script src="js/bootstrap.min.js"></script>
            <!-- Waypoints -->
        <script src="js/jquery.waypoints.min.js"></script>
            <!-- Owl carousel -->
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
            <!-- Main JS (Do not remove) -->
        <script src="js/main.js"></script>


        
            <style>
            label {
                display:block;
                float:left;
                width:100px;
            }</style>
    </head>
    <body>
    <div class="container text-center">
        <h1>新規会員登録</h1>
        <form action="register.php" method="post">//処理を行う宛先を指定
        <div>
            <label>ユーザー名：<label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label><a>メールアドレス：</a><label>
            <input type="text" name="mail" required>
        </div>
        <div>
            <label><a>パスワード：</a><label>
            <input type="password" name="pass" required>
        </div>
        <div class="loginbtn"><input type="submit" class="btn" value="新規登録"></div>

        </form>
    </div>
    <div class="container text-center">
        <p>すでに登録済みの方は<a href="login.php">こちら</a></p>
    </div>
</html>

