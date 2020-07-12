<?php
require_once'DSN.php';

// 接続先DBリンク
$connect = "mysql:host={$dsn['host']};dbname={$dsn['dbnm']}";

// エラーメッセージの初期化
$errorMessage = "";

$userid = $_POST["email"];
$password = $_POST["password"];
$username = $_POST["NAME"];

// 新規登録ボタンが押された場合
if (isset($_POST["signUp"])) {
    if (empty($_POST["NAME"])) {
        $errorMessage = 'ユーザー名が未入力です。';
    } else if (empty($_POST["email"])) {  
        $errorMessage = 'Emailが未入力です。';
    } else if (empty($_POST["password"])) {
        $errorMessage = 'パスワードが未入力です。';
    } else if (empty($_POST["password2"])) {
        $errorMessage = 'パスワードが未入力です。';
    }
    else {
        if (($_POST["password"]) == ($_POST["password2"])){
                try{
                        $pdo = new PDO($connect, $dsn['user'], $dsn['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
                        $stmt = $pdo->prepare("INSERT INTO userData (`email`,`password`,`nickname`) VALUES (`:email`,`:password`,`:nickname`)");
                        $stmt->execute([`email`=>$userid,`password`=>$password,`nickname`=>$nickname]);
                        echo '登録が完了しました。ログインしてください。';
                        header('Location:login.php');
                        
                    } catch (PDOException $e) {
                            $errorMessage = 'データベースエラー';
                            //$errorMessage = $sql;
                            // $e->getMessage() でエラー内容を参照可能（デバッグ時のみ表示）
                            // echo $e->getMessage();
                            }
        } else  {
            $errorMessage = 'パスワードに誤りがあります.';
        }
    }
}
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
        <form id="loginForm" name="loginForm" action="" method="POST">
            <fieldset>
                <legend>新規登録</legend>
                <div><font color="#ff0000"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></font></div>
                <label for="NAME">ユーザー名</label><input type="text" id="NAME" name="NAME" placeholder="ユーザー名を入力">
                <br>
                <label for="email">Email</label><input type="text" id="email" name="email" placeholder="メールアドレスを入力">
                <br>
                <label for="password">パスワード</label><input type="password" id="password" name="password" value="" placeholder="パスワードを入力">
                <br>
                <label for="password2">パスワード(確認用)</label><input type="password" id="password2" name="password2" value="" placeholder="再度パスワードを入力">
                <br>
                <input type="submit" id="signUp" name="signUp" value="新規登録">
            </fieldset>
        </form>
        <p>すでに登録済みの方は<a href="login.php">こちら</a></p>
    </body>
</html>