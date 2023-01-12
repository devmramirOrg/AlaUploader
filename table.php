<?php

// ------- Sql Code -------
include("config.php");

mysqli_multi_query(
    $conn,
    "CREATE TABLE `users` (
        `id` bigint PRIMARY KEY,
        `step` varchar(20),
        `time` text
        ) default charset = utf8mb4;
        CREATE TABLE `films` (
        `id` text,
        `caption` text,
        `seen` text,
        `link` text
        ) default charset = utf8mb4;");
    if(mysqli_connect_errno()){
    echo "به دلیل مشکل زیر، اتصال برقرار نشد : <br />" . mysqli_connect_error();
    die();
}else{
echo "دیتابیس متصل و نصب شد .";

            
            
            
            
            
}

?>
