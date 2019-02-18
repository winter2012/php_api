<?php
/**
 * Created by PhpStorm.
 * User: Winter
 * Date: 2018/9/29
 * Time: 14:58
 */
include '../config/config.php';

$username = $_POST['username'];
$nickname = $_POST['nickname'];
$password = $_POST['password'];
$time = date('Y-m-d H:i:s');
if($username == '' || $nickname == '' || $password == ''){
    echo '参数不能为空';die;
}

try{
    $pdo = new PDO("mysql:host=" . $mysql_conf['host'] . ";dbname=" . $mysql_conf['db'], $mysql_conf['db_user'], $mysql_conf['db_pwd']);
    $sql = "insert user(username,nickname,password,created_at,updated_at) values('".$username."','".$nickname."','".$password."','".$time."','".$time."')";
    $num = $pdo->exec($sql);
    $insertId = $pdo->lastInsertId();
    if($num){
        echo '注册成功,新增的主键ID是: '.$insertId;
    } else {
        echo '注册失败';
    }
} catch (PDOException $e){
    die('注册失败'.$e->getMessage());
}