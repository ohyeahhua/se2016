<?php
require("dbconnect.php");
function seeAuction(){
    global $conn; 
    $sql = "select aid,Hname,player.name,lowprice,num,deadline,uptime,`high_name`,`high_price` from auction,player,card 
where auction.uid=player.uid and card.cID=auction.cID";  
    return mysqli_query($conn,$sql);
}
function up($uid, $cName, $num, $lowprice, $uptime, $deadline) {
    global $conn;
    $sql = "SELECT cID from card where cName = '$cName'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $cID = $row['cID'];
    $sql = "INSERT INTO `auction` (`aid`,`uid`,`cID`,`num`,`lowprice`,`uptime`,`deadline`,`high_name`,`high_price`) VALUES (NULL,'$uid','$cID',$num,'$lowprice','$uptime','$deadline','','$lowprice');";
    if(mysqli_query($conn,$sql))
        return true;
    else
        return false;
}
function up1($uid, $cID, $num, $lowprice, $uptime, $deadline) {
    global $conn;
    $sql = "INSERT INTO `auction` (`aid`,`uid`,`cID`,`num`,`lowprice`,`uptime`,`deadline`,`high_name`,`high_price`) VALUES (NULL,'$uid','$cID',$num,'$lowprice','$uptime','$deadline','','$lowprice');";
    if(mysqli_query($conn,$sql))
        return true;
    else
        return false;
}
function changeAuc($aid,$name,$price){
    global $conn;
    $sql = "update `auction` set `high_name`='$name', `high_price`='$price' where `auction`.`aid` = $aid";
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
function seeRecord($uid) {
    global $conn;
    $sql = "SELECT name,high_name,cName,deadline,high_price from player,auction where auction.uid=player.uid and auction.high_name=player.uid and card.cID=auction.cID";
    if ($result = mysqli_query($conn,$sql)) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>{$row['name']}</td>";
            echo "<td>{$row['high_name']}</td>";
            echo "<td>{$row['cName']}</td>";
            echo "<td>{$row['high_price']}</td>";
            echo "<td>{$row['deadline']}</td></tr>";
        }
    } else {
        return false;
    }
}
?>