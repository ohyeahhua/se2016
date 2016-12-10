<?php
$host = 'localhost';
$user = 'c19';
$pass = 'c19';
$db = 'c19';
$conn = mysqli_connect($host, $user, $pass, $db) or die('Error with MySQL connection'); //跟MyMSQL連線並登入
mysqli_query($conn,"SET NAMES utf8"); //選擇編碼
?>