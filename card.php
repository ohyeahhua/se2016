<?php
require("dbconnect.php");
global $conn;
$uid = $_POST['id'];
$sql = "select * from inventory where uid = '$uid'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
echo json_encode($row);
?>