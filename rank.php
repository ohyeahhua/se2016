<?php
require ('dbconnect.php');
global $conn;
$sql ="SELECT  money,name,(SELECT COUNT(*)+1 from player as p2 where p2.money > p1.money and uid != 0 ) as rank FROM `player` as p1  where uid != 0 order by rank asc limit 10;";
$result = mysqli_query($conn,$sql);
$rank = array();
while($row = mysqli_fetch_assoc($result)){
    $rank[] = $row;
}
echo json_encode($rank);
?>