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
                        $stmt = $pdo->prepare("INSERT INTO userData VALUES (?,?,?)");
                        $stmt->execute(array($userid,$password,$username));
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

require './vendor/autoload.php';
$smarty = new Smarty();
$smarty->display('head.tpl');

?>

    <body>
        <h3 class="logintop">新規登録</h3>
        <div class="overlay">
            <div class="container">
                <div class="row">    
                    <form id="loginForm" name="loginForm" action="" method="POST">
                        <fieldset>
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
                    <div class="loginbtn"><a href="login.php" class="btn hanten free_submit">すでに登録済みの方はこちら</a></div>
                </div>
            </div>   
        </div>   
    </body>
</html>