<?php
require("dbconnect.php");
function seeAuction(){
    global $conn;
    $now = date ("Y-m-d H:i:s"); 
    $sql = "select cName,name,lowprice,deadline,`high-name`,`high-price` from auction,player,card where auction.uid=player.uid and card.cID=auction.cID and deadline > '$now';";  
    return mysqli_query($conn,$sql);
}
?>