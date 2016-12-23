<link href="//cdnjs.cloudflare.com/ajax/libs/alertify.js/0.3.11/alertify.core.css" rel="stylesheet">  
<link href="//cdnjs.cloudflare.com/ajax/libs/alertify.js/0.3.11/alertify.default.css" rel="stylesheet"> 
<script src="//cdnjs.cloudflare.com/ajax/libs/alertify.js/0.3.11/alertify.min.js"></script>  
<div>
</div>
<?php
require("user.php");
require("sell.php");
if( isset($_GET["logout"])) {
    session_destroy();
    echo "<script>alertify.alert('Logout! Please login.',function(){window.location='index.php';})</script> ";
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
            echo "<script>alertify.alert('Login OK!',function(){window.location='profile.php';})</script> ";
        } else {
            echo "<script>alertify.alert('Login failed',function(){window.location='index.php';})</script> ";
        }
        break;
    case "register":
        $loginID = $_POST['loginID'];
        $password = $_POST['pwd'];
        $name = $_POST['name'];
        if (register($loginID,$password,$name)){
            echo "<script>alertify.alert('Successfully, please login.',function(){window.location='index.php';})</script> ";
        }else{
            echo "<script>alert('Failed, please register again.'); window.location='register.html';</script> ";
        }
        break;
    case "up":
        $num = $_POST['num'];
        $nnum = $_POST['nnum'];
        if($nnum < $num){
            echo "<script>alertify.alert('Too many, please try again.',function(){window.location='profile.php';})</script> ";
            exit(0);
        }
        $uid = $_SESSION['uid'];
        $cName = $_POST['type'];
        $lowprice = $_POST['lowprice'];
        $uptime = $_POST['update']." ".$_POST['uptime'].":00";
        $deadline = $_POST['deaddate']." ".$_POST['deadtime'].":00";
        if($uptime > $deadline){
            echo "<script>alertify.alert('Wrong date!',function(){window.location='profile.php';})</script> ";
            exit(0);
        }
        if (up($uid, $cName,$num, $lowprice, $uptime, $deadline)) {
            change($uid, $cName, $nnum,$num);
            echo "<script>alertify.alert('Successfully!',function(){window.location='profile.php';})</script> ";
        } else {
            echo "<script>alert('Failed,please try again.'); window.location='profile.php';</script> ";
        }
        break;
    case "raised":  
        $price = $_POST['price'];
        $money = $_POST['money'];
        if($price > $money){
            echo "<script>alertify.alert('You don\'t have enough money.',function(){window.location='profile.php';})</script> ";
            exit(0);
        }
        $high = $_POST['high'];
        if($price <= $high){
            echo "<script>alertify.alert('You need to raise higher!',function(){window.location='profile.php';})</script> ";
            exit(0);
        }
        $deadline = $_POST['deadline'];
        $now = Date("Y-m-d H:i:s",strtotime("+420 minutes"));
        if($deadline < $now){
            echo "<script>alertify.alert('Time\'s up',function(){window.location='profile.php';})</script> ";
            exit(0);
        }          
        $hName = $_POST['hName'];
        $aid = $_POST['aid'];
        $name = $_SESSION['name'];
        if($hName != ""){
            addmoney($hName,$high);
        }
        if(changeAuc($aid,$name,$price)){
            $_SESSION['money']=submoney($name,$price,$money);
            echo "<script>alertify.alert('Successfully!',function(){window.location='profile.php';})</script> ";
        }else
            echo "<script>alert('Failed.'); window.location='profile.php';</script>";
        break;
    default:
}
?>