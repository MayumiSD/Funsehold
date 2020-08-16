<?php
session_start();
$receipeName = getReceipeName();
$receipeName;

require './vendor/autoload.php';
$smarty = new Smarty();
$smarty->assign('receipeName',$receipeName);
$smarty->display('receipe.tpl');


function getReceipeName (){
            require_once'DSN.php';
            // 接続先DBリンク
            $connect = "mysql:host={$dsn['host']};dbname={$dsn['dbnm']}";
            $pdo = new PDO($connect, $dsn['user'], $dsn['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $stmt = $pdo->prepare('SELECT * FROM receipe ');
            $stmt->execute();
            while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                yield $row;
                $receipeName=$row['receipe_name'];
            }
            foreach ($receipeName as $i)   
            echo $i.'<br>';
            
}
