<h2>Your Record</h2>
<table border='5' width='500'>
<tr>
    <td>拍賣者</td>
    <td>得標者</td>
    <td>得標卡</td>
    <td>得標金額</td>
    <td>截止時間</td>
</tr>
<?php
require("dbconnect.php");
session_start();
global $conn;
$uid = $_SESSION['uid'];
$name = $_SESSION['name'];
$sql = "SELECT * from record where auc='$name' or bidder='$name';";
if ($result = mysqli_query($conn,$sql)) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>{$row['auc']}</td>";
        echo "<td>{$row['bidder']}</td>";
        echo "<td>{$row['cName']}</td>";
        echo "<td>{$row['price']}</td>";
        echo "<td>{$row['deadline']}</td></tr>";
    }
}
?>
</table>
<a href="profile.php">返回我的頁面<a/>