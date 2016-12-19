<?php
require("dbconnect.php");
require("user.php");
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
h1 {
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
</head>
<body>
<div id="ci">
<table style="border:3px LimeGreen groove;" border='3' width='1000'>
<tr  style="font-weight:bold" align="center" cellpadding="2">
    <td>Card ID</td>
    <td>Card Image</td>
    <td>Card Name</td>
    <td>Card Function</td>
</tr>
<div id="mp">
<big><a href="profile.php" style="font-family:Century Gothic;font-weight:bold;text-decoration:none">My Page<a/></big><br/>
<big><a href="record.php" style="font-family:Century Gothic;font-weight:bold;text-decoration:none">My Record<a/></big><br/>
<a href='controller.php?logout=true'><button id="logout">登出</button></a>
</div>
<h2>Card Information</h2>
<?php
$result = seeInfor();
$i = 0;
while($row = mysqli_fetch_assoc($result)){
    if ($i < 8) {
        echo "<tr align='center'><td style='font-size:1.0cm'>{$row['cID']}</td>";
        echo "<td><img src='./card/c$i.jpg' style='width:200px'></img></td>";
        echo "<td style='font-size:0.6cm;font-weight:bold'>{$row['Hname']}</td>";
        echo "<td style='white-space:pre-wrap;font-size:0.6cm;font-weight:bold' align='justify'>{$row['function']}</td></tr>";
        $i++;
    }
}
?>
</table>
</div>
<a href="profile.php"></a>
</body>
</html>