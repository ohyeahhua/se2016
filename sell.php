<?php
require("dbconnect.php");
function seeAuction(){
    global $conn;
    $now = date ("Y-m-d H:i:s"); 
    $sql = "select aid,cName,name,lowprice,num,deadline,`high-name`,`high-price` from auction,player,card where auction.uid=player.uid and card.cID=auction.cID and deadline > '$now' and uptime < '$now';";  
    return mysqli_query($conn,$sql);
}
function up($uid, $cName, $num, $lowprice, $uptime, $deadline) {
    global $conn;
    $sql = "SELECT cID from card where cName = '$cName'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $cID = $row['cID'];
    $sql = "INSERT INTO `auction` (`aid`,`uid`,`cID`,`num`,`lowprice`,`uptime`,`deadline`,`high-name`,`high-price`) VALUES (NULL,'$uid','$cID',$num,'$lowprice','$uptime','$deadline','','$lowprice');";
    if(mysqli_query($conn,$sql))
        return true;
    else
        return false;
}
function changeAuc($aid,$name,$price){
    global $conn;
    $sql = "update `auction` set `high-name`='$name', `high-price`='$price' where `auction`.`aid` = $aid";
    return mysqli_query($conn,$sql);
}
function addmoney($hName,$high){
    global $conn;
    $sql = "select money from player where name = '$hName'";
    $result=mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $money = $row['money'];
    $tmp = $money + $high;
    $sql = "update player set money ='$tmp' where name = '$hName'";
    mysqli_query($conn,$sql);
}
function submoney($name,$price,$money){
    global $conn;
    $tmp = $money-$price;
    $sql = "update player set money='$tmp' where player.name ='$name';";
    mysqli_query($conn,$sql);
    return $tmp;
}
?>