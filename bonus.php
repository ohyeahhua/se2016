<?php
require ('dbconnect.php');
global $conn;
$uid = $_POST['id'];
$newD = date("Y-m-d H:i:s",strtotime("+420 minutes"));
$sql ="update player set money=money+1000, loginTime='$newD' where uid = '$uid';";
mysqli_query($conn,$sql);
?>