<?php
session_start();
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
            echo "login OK</br>";
        } else {
            $_SESSION['loginID'] = "";
            echo "Login failed.</br>";
        }
        break;
    case "register":
        $loginID = $_POST['loginID'];
        $password = $_POST['pwd'];
        $name = $_POST['name'];
        if (register($loginID,$password,$name)){
            echo "register sucessfully!";
            echo "<a href='index.php'>返回登入頁面</a>";
        }else{
            echo "register failed!";
            echo "<a href='index.php'>返回登入頁面</a>";
        }
        break;
    default:
}
?>
