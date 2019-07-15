<?php
    header("Access-Control-Allow-Origin:*");
    header('content-type:text/html;charset=utf8');
    //连接数据库
    $db_hostName = 'localhost';
    $db_userName = 'root';
    $db_pwd = "root";
    $db_name = 'xy';

    $connect = new mysqli($db_hostName,$db_userName,$db_pwd,$db_name);

    if($connect -> connect_error){
        die('连接失败'.$connect -> connect_error);
    }
    //设置数据库的编码
    $connect->query('set names utf8');
?>