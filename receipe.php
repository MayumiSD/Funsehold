<?php
session_start();

require './vendor/autoload.php';
$suggestionReceipe = getReceipeName();
echo $suggestionReceipe;

$smarty = new Smarty();
$smarty->display('receipe.tpl');



function getReceipeName (){
            require_once'DSN.php';
            // 接続先DBリンク
            $connect = "mysql:host={$dsn['host']};dbname={$dsn['dbnm']}";
            $pdo = new PDO($connect, $dsn['user'], $dsn['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $sql = 'SELECT * FROM receipe ';
            $stmt=$pdo->query($sql);
            $row = $stmt->fetchAll(PDO::FETCH_COLUMN);

            $suggestionReceipe = $row['receipe_name'];
            return $suggestionReceipe;
}
