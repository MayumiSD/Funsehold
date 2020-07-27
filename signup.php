<?php
session_start();

require './vendor/autoload.php';
$smarty = new Smarty();
$smarty->display('head.tpl');

?>

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

