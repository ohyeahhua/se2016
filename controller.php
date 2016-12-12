<?php
require("user.php");
require("sell.php");
if( isset($_GET["logout"])) {
    session_destroy();
    echo "<script>alert('Logout! Please login.'); window.location='index.php';</script> ";
}

if(! isset($_POST["act"])) {
    exit(0);
}

$act =$_POST["act"];
switch($act) {
    case "login":
        $loginID = $_POST['loginID'];
        $password = $_POST['pwd'];
        if (checkUser($loginID, $password)) {
            echo "<script>alert('Login OK'); window.location='profile.php';</script> ";
        } else {
            echo "<script>alert('Login failed'); window.location='index.php';</script> ";
        }
        break;
    case "register":
        $loginID = $_POST['loginID'];
        $password = $_POST['pwd'];
        $name = $_POST['name'];
        if (register($loginID,$password,$name)){
            echo "<script>alert('Successfully, please login.'); window.location='index.php';</script> ";
        }else{
            echo "<script>alert('Failed, please register again.'); window.location='register.html';</script> ";
        }
        break;
    case "up":
        $num = $_POST['num'];
        $nnum = $_POST['nnum'];
        if($nnum < $num){
            echo "<script>alert('Too many, please try again.'); window.location='profile.php';</script> ";
        }
        $uid = $_SESSION['uid'];
        $cName = $_POST['type'];
        $lowprice = $_POST['lowprice'];
        $uptime = $_POST['update']." ".$_POST['uptime'].":00";
        $deadline = $_POST['deaddate']." ".$_POST['deadtime'].":00";
        if (up($uid, $cName,$num, $lowprice, $uptime, $deadline)) {
            change($uid, $cName, $nnum,$num);
            echo "<script>alert('Successfully.'); window.location='profile.php';</script> ";
        } else {
            echo "<script>alert('Failed,please try again.'); window.location='profile.php';</script> ";
        }
        break;
    case "raised":  
        $price = $_POST['price'];
        $money = $_SESSION['money'];
        if($price > $money){
            echo "<script>alert('You don\'t have enough money.'); window.location='profile.php';</script>";
        }
        $high = $_POST['high'];
        if($price <= $high){
            echo "<script>alert('Failed.'); window.location='profile.php';</script>";
        }
        $hName = $_POST['hName'];
        $aid = $_POST['aid'];
        $name = $_SESSION['name'];
        if($hName != ""){
            addmoney($hName,$high);
        }
        if(changeAuc($aid,$name,$price)){
            $_SESSION['money']=submoney($name,$price,$money);
            echo "<script>alert('Successfully.'); window.location='profile.php';</script>";
        }else
            echo "<script>alert('Failed.'); window.location='profile.php';</script>";
        break;
    default:
}
?>