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


        
            <style>
            label {
                display:block;
                float:left;
                width:100px;
            }</style>
    </head>
    <body>
        <h1>新規会員登録</h1>
        <form action="register.php" method="post">//処理を行う宛先を指定
        <div>
            <label>ユーザー名：<label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label>メールアドレス：<label>
            <input type="text" name="mail" required>
        </div>
        <div>
            <label>パスワード：<label>
            <input type="password" name="pass" required>
        </div>
        <input type="submit" value="新規登録">
        </form>
        <p>すでに登録済みの方は<a href="login.php">こちら</a></p>
</html>

