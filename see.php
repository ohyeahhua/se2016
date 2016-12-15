<?php
require('sell.php');
require('dbconnect.php');
$result = seeAuction();
$auc = array();
while($row = mysqli_fetch_assoc($result)){
    $auc[] = $row;
}
    echo json_encode($auc);
?>
