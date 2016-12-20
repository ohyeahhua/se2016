<?php
require("dbconnect.php");
require("sell.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
body {
    color:black;
    background: white url(./card/bg.jpg) center 60px fixed no-repeat;
    background-size: 800px;
}
img {
    width:720px;
    position:absolute;
    left:330px;
    margin-top:-226px;
    z-index:-1;
}
h1 {
    position:relative;
    text-align:center;
    top:35px;
    text-shadow:2px 2px 2px DarkGray;
}
h2 {
    font-family:cursive;
    font-weight:bold;
}
#ci {
    position:relative;
    top:20px;
    left:35px;
}
#mp {
    position:absolute;
    right:130px;
}
#logout {
    padding:5px 10px; 
    background:Gainsboro; 
    border:0 none;
    cursor:pointer;
    border-radius: 5px;
}
</style>
<title>WELCOME!</title>
<h1 style="color:MidnightBlue;font-style:italic;font-size:1.0cm" align="center">World Hegemony Battle</h1>
<img src="./card/bbg.png" />
</head>
<body>
</script>
<div id="ci">
<div id="mp">
<big><a href="profile.php" style="font-family:Century Gothic;font-weight:bold;text-decoration:none;color:DarkOrchid">My Page<a/></big><br/>
<big><a href="cInfor.php" style="font-family:Century Gothic;font-weight:bold;text-decoration:none;color:DarkOrchid">Card Information<a/></big><br/>
<a href='controller.php?logout=true'><button id="logout">登出</button></a>
</div>
<h2 style="margin-top:100px">Your Record</h2>
<table style="border:3px LimeGreen groove;text-align:center" border='5' width='500'>
<tr style='font-weight:bold'>
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
$sql = "SELECT auc,bidder,Hname,price,deadline,card.cName from record,card where (auc='$name' or bidder='$name') and card.cName = record.cName;";
if ($result = mysqli_query($conn,$sql)) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>{$row['auc']}</td>";
        echo "<td>{$row['bidder']}</td>";
        echo "<td>{$row['Hname']}</td>";
        echo "<td>{$row['price']}</td>";
        echo "<td>{$row['deadline']}</td></tr>";
    }
}
?>
</table>
</div>