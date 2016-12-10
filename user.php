<?php
require("dbconnect.php");
session_start();
function checkUser($loginID, $pwd){
    global $conn;
    $loginID =mysqli_real_escape_string($conn,$loginID);
    $sql = "SELECT loginID,pwd,name,uid from player where loginID = '$loginID'";
    if ($result = mysqli_query($conn,$sql)){
        $row = mysqli_fetch_assoc($result);
        if($row['pwd'] === $pwd){
            $_SESSION['uid'] = $row['uid'];
            $_SESSION['name'] = $row['name'];
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}
function register($loginID,$pwd,$name){
    global $conn;
    $loginID =mysqli_real_escape_string($conn,$loginID);
    $sql = "INSERT INTO `player` (`uid`, `loginID`, `name`, `pwd`, `money`) VALUES (NULL, '$loginID', '$name', '$pwd', '1000');";
    if ($result = mysqli_query($conn,$sql)){
        $sql ="select uid from player where loginID = '$loginID'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $sql = "INSERT INTO `inventory` (`uid`,`A`,`B`,`C`,`D`,`E`,`F`,`G`,`H`) VALUES ('{$row['uid']}',2,2,2,2,0,0,0,0)";
        $result = mysqli_query($conn,$sql);
        return true;
    }else{
        return false;
    }
}   
?>