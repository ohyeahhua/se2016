<?php
require("dbconnect.php");
require("sell.php");
?>
<script type="text/javascript" src="jquery.js"></script>
<form method="post" action="controller.php">
<input type="hidden" name="act" value="login">
LoginID: <input type="text" name="loginID">
Password : <input type="password" name="pwd">
<input type="submit">
<a href="register.html">Register<a/>
</form>
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
        echo "<td>{$row['high-price']}</td></tr>";
    }
}
?>
</table>
<script>
function check() {
	now= new Date();
	for (i=0; i < auc.length;i++) {	
		tday=new Date(auc[i]['deadline']);
		if (tday <= now) {
            $.ajax({
			url: "json.php",
			dataType: 'html',
			type: 'POST',
			data: { aid: auc[i]['aid']},
                    name:auc[i]['name'],
                    cName:auc[i]['cName'],
                    num:auc[i]['num'],
                    hName:auc[i]['high-name'],
                    price:auc[i]['price'],
                    deadline:auc[i]['deadline'],
			error: function(response) {
				alert('Ajax request failed!');
				},
			success: function() {

				}
            });
		} else {			
			$("#timer"+i).html(Math.floor((tday-now)/1000))	;		
		}
	}
}
window.onload = function () {
    setInterval(function () {
		check()
    }, 1000);
};
</script>
<table border='5' width='1000'>
<?php
$result = seeAuction();
$auchtml = array();
$auc = array();
$i=0;
$j=0;
while($row = mysqli_fetch_assoc($result)){  
    $uptime=strtotime($row['uptime']);
    $deadline=strtotime($row['deadline']);
    $now=strtotime(date ("Y-m-d H:i:s",strtotime("+420 minutes")));
    $auc[] = $row;
    if($uptime < $now && $now < $deadline ){
        echo "<tr><td>{$row['aid']}</td>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['cName']}</td>";
        echo "<td>{$row['num']}</td>";
        echo "<td>{$row['lowprice']}</td>";
        echo "<td>{$row['deadline']}</td>";
        echo "<td id='timer$j'>0</td>";
        echo "<td>{$row['high-name']}</td>";
        echo "<td>{$row['high-price']}</td></tr>";
    }
    $j++;
}
?>
</table>
<script>
<?php
	echo "var auchtml=" . json_encode($auchtml);
    echo ";var auc=" . json_encode($auc);
?>
</script>