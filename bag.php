<?php
require "dbconnect.php";
require "sell.php";
$name = $_POST['name'];
$num = $_POST['num'];
$price = $_POST['price'];
$uptime = Date("Y-m-d H:i:s",strtotime("+420 minutes"));
$a = rand(25230,25260);
$deadline=Date("Y-m-d H:i:s",strtotime("+$a seconds"));
echo up1(0,9,$num, $price, $uptime, $deadline);
?>