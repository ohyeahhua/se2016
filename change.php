<?php
require('dbconnect.php');
$uid=$_POST['id'];
global $conn;
$sql="update inventory set A=A-1,B=B-1,C=C-1,D=D-1,E=E-1,F=F-1,G=G-1,H=H-1 where uid='$uid';";
mysqli_query($conn,$sql);
$sql="update player set money=money+1000 where uid='$uid';";
mysqli_query($conn,$sql);
?>