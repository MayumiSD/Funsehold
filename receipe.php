<?php
session_start();
$receipeName = getReceipeName();
foreach ($receipeName as $i) {
    echo $i;
}

require './vendor/autoload.php';
$smarty = new Smarty();
$smarty->assign('receipeName',$receipeName);
$smarty->display('receipe.tpl');


function getReceipeName (){
            require_once'DSN.php';
            // 接続先DBリンク
            $connect = "mysql:host={$dsn['host']};dbname={$dsn['dbnm']}";
            $pdo = new PDO($connect, $dsn['user'], $dsn['pass'], [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
            $stmt = $pdo->prepare('SELECT * FROM receipe ');
            $stmt->execute();

            $item = array();
            while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                $item[]=$row;
            }
            
}
