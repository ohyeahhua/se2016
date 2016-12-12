<?php
require("sell.php");
require("user.php");
if(isset($_SESSION['name']))
    echo "<h2>Hi {$_SESSION['name']} Your money: {$_SESSION['money']}</h2>";
else
    echo "<h2>Hi, please login</h2>";
if(isset($_GET['type'])&&isset($_GET['nnum'])){
    $type=$_GET['type'];
    $nnum=$_GET['nnum'];
}else{
    $type="";
    $nnum=0;
}
?>
<a href='record.php'>Record</a>
<a href='controller.php?logout=true'><button>登出</button></a>
<hr></hr>
<h2>Your card<h2>
<table border='5' width='500'>
<tr>
    <td>A</td>
    <td>B</td>
    <td>C</td>
    <td>D</td>
    <td>E</td>
    <td>F</td>
    <td>G</td>
    <td>H</td>
</tr>
<?php
$result = seeCard($_SESSION['uid']);
while($row = mysqli_fetch_assoc($result)){
    echo "<tr><td><a href='profile.php?type=A&nnum={$row['A']}'>{$row['A']}</a></td>";
    echo "<td><a href='profile.php?type=B&nnum={$row['B']}'>{$row['B']}</a></td>";
    echo "<td><a href='profile.php?type=C&nnum={$row['C']}'>{$row['C']}</a></td>";
    echo "<td><a href='profile.php?type=D&nnum={$row['D']}'>{$row['D']}</a></td>";
    echo "<td><a href='profile.php?type=E&nnum={$row['E']}'>{$row['E']}</a></td>";
    echo "<td><a href='profile.php?type=F&nnum={$row['F']}'>{$row['F']}</a></td>";
    echo "<td><a href='profile.php?type=G&nnum={$row['G']}'>{$row['G']}</a></td>";
    echo "<td><a href='profile.php?type=H&nnum={$row['H']}'>{$row['H']}</a></td></tr>";
}
?>
</table>
<form method='post' action='controller.php'>
<input type='hidden' name='act' value='up'>
Type:<input type='text' name='type' value='<?php echo "$type"?>'>
Amount:<input type='text' name='num' value='<?php echo "$nnum"?>' >
<input type='hidden' name='nnum' value='<?php echo "$nnum"?>'>
底價:<input type='text' name='lowprice' >
上架時間:<input type='date' name='update' ><input type='time' name='uptime' >
截止時間:<input type='date' name='deaddate' ><input type='time' name='deadtime' >
<input type='submit' value='確認'>
</form>
<hr></hr>


<h2>AUCTION</h2>
<table border='5' width='1000'>
<tr>
    <td>交易序號</td>
    <td>Name</td>
    <td>card</td>
    <td>數量</td>
    <td>底價</td>
    <td>截止時間</td>
    <td>目前最高者</td>
    <td>目前金額</td>
    <td></td>
</tr>
<?php
$result = seeAuction();
while($row = mysqli_fetch_assoc($result)){
    $uptime=strtotime($row['uptime']);
    $deadline=strtotime($row['deadline']);
    $now=strtotime(date ("Y-m-d H:i:s",strtotime("+420 minutes")));
    if($uptime < $now && $now < $deadline ){
        echo "<tr><td>{$row['aid']}</td>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['cName']}</td>";
        echo "<td>{$row['num']}</td>";
        echo "<td>{$row['lowprice']}</td>";
        echo "<td>{$row['deadline']}</td>";
        echo "<td>{$row['high-name']}</td>";
        echo "<td>{$row['high-price']}</td>";
        if($row['name'] == $_SESSION['name'])
            echo "<td><button>我要出價</button></td></tr>";
        else
            echo "<td><a href='profile.php?aid={$row['aid']}&high={$row['high-price']}&hName={$row['high-name']}'><button>我要出價</button></a></td></tr>";
    }
}
if(isset($_GET['aid'])){
    $aid=$_GET['aid'];
    echo "<form method='post' action='controller.php'>";
    echo "<input type='hidden' name='high' value='{$_GET['high']}'>";
    echo "<input type='hidden' name='hName' value='{$_GET['hName']}'>";
    echo "<input type='hidden' name='act' value='raised'>";
    echo "<input type='hidden' name='aid' value='$aid'>";
    echo "<table border='5' width='500'><tr><td>交易序號:$aid</td>";
    echo "<td>輸入金額:<input type='text' name='price'></td>";
    echo "<td><input type='submit' value='確認'></form></td></tr></table>";
}
?>
</table>
