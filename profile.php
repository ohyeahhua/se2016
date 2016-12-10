<?php
session_start();
require("sell.php");
if(isset($_SESSION['name']))
    echo "<h2>Hi {$_SESSION['name']}</h2>";
else
    echo "<h2>Hi, please login</h2>";
?>
<table border='5' width='500'>
<tr>
    <td>Name</td>
    <td>card</td>
    <td>底價</td>
    <td>截止時間</td>
    <td>目前最高者</td>
    <td>目前金額</td>
</tr>
<?php
$result = seeAuction();
while($row = mysqli_fetch_assoc($result)){
    echo "<tr><td>{$row['name']}</td>";
    echo "<td>{$row['cName']}</td>";
    echo "<td>{$row['lowprice']}</td>";
    echo "<td>{$row['deadline']}</td>";
    echo "<td>{$row['high-name']}</td>";
    echo "<td>{$row['high-price']}</td></tr>";
}

?>
