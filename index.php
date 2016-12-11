<?php
require("dbconnect.php");
require("sell.php");
?>
<form method="post" action="controller.php">
<input type="hidden" name="act" value="login">
LoginID: <input type="text" name="loginID">
Password : <input type="password" name="pwd">
<input type="submit">
<a href="register.html">Register<a/>
</form>
<table border='5' width='500'>
<tr>
    <td>Name</td>
    <td>card</td>
    <td>數量</td>
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
    echo "<td>{$row['num']}</td>";
    echo "<td>{$row['lowprice']}</td>";
    echo "<td>{$row['deadline']}</td>";
    echo "<td>{$row['high-name']}</td>";
    echo "<td>{$row['high-price']}</td></tr>";
}
?>
</table>
