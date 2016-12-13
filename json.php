<?php 
require "dbconnect.php";
$aid=$_POST["aid"];
$name=$_POST["name"];
$cName=$_POST["cName"];
$num=$_POST["num"];
$hName=$_POST["hName"];
$price=$_POST["price"];
$deadline=$_POST["deadline"];
//加錢
$sql="update player set money = money+$price where name='$name';";
mysqli_query($db,$sql);

//減錢,加庫存
$sql="update player set money = money-$price where name='$hName';
      GO
      update inventory,player set $cName=$cName+$num where name='$hName' and player.uid = inventory.uid;";
mysqli_query($db,$sql);
//紀錄

$sql="INSERT INTO `record` (`rid`, `auc`, `bidder`, `cName`, `price`, `deadline`) VALUES (NULL, '$name', '$hName', 'cName', 'price', '$deadline');";
mysqli_query($db,$sql);
//刪除
$sql="delete from auction where aid = 'aid';";
mysqli_query($db,$sql);
?>
