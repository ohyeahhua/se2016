<?php
function up($uid, $cID, $lowprice, $uptime, $deadline) {
    global $conn;
    $loginID = mysqli_real_escape_string($conn, $loginID);
    $sql = "SELECT uid from player where loginID = '$loginID'";
    if ($result = mysqli_query($conn,$sql)) {
        $sql = "select cID from player where cID = '$cID'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $sql = "INSERT INTO `auction` (`aid`,`uid`,`cID`,`lowprice`,`uptime`,`deadline`,`high-name`,`high-price`) VALUES (NULL,'$uid','{$row['cID']}','$lowprice','$uptime','$deadline','','');";
        $result = mysqli_query($conn,$sql);
        return true;
    } else {
        return false;
    }
}
?>