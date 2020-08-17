<?php
session_start();
$receipeName= getReceipeName();
foreach ($receipeName as $i){
    echo $i['receipe_name'];
}


require './vendor/autoload.php';
$smarty = new Smarty();
$smarty->display('receipe.tpl');
$receipeName;


function getReceipeName (){
            require_once'DSN.php';
            // 接続先DBリンク
            $connect = "mysql:host={$dsn['host']};dbname={$dsn['dbnm']}";
            $pdo = new PDO($connect, $dsn['user'], $dsn['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $stmt = $pdo->prepare('SELECT * FROM receipe ');
            $stmt->execute();

            while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                yield $row;
                $smarty->append('receipeName',$row); 
            }            
}
