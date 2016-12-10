<?php
require("user.php");
/*
if( isset($_GET["logout"])) {
    if ($_GET["logout"]==1)
        echo "Please <a href='index.php'>Login</a>.";
        session_destroy();
        exit(0);
}
*/
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
            echo "<script>alert('Sucessfully, please login.'); window.location='index.php';</script> ";
        }else{
            echo "<script>alert('Failed, please register again.'); window.location='register.html';</script> ";
        }
        break;
    default:
}
?>
