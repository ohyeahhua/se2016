<?php
require("sell.php");
require("user.php");
if(isset($_SESSION['name'])){
    echo "<h2>Hi {$_SESSION['name']} Your money: {$_SESSION['money']}</h2>";
    echo "<script>var uid = {$_SESSION['uid']};var name = {$_SESSION['name']}</script>";
}else
    echo "<h2>Hi, please login</h2>";
if(isset($_GET['type'])&&isset($_GET['nnum'])){
    $type=$_GET['type'];
    $nnum=$_GET['nnum'];
}else{
    $type="";
    $nnum=0;
}
?>
<script type="text/javascript" src="jquery.js"></script>
<script>
load();
card(uid);
function load() {
    card(uid);
    $.ajax({
        url: "see.php",
		dataType: 'html',
        type: 'POST',
        error: function(response) {
			alert('Ajax request failed!');
			},
		success: function(json) {
            jsdata = jQuery.parseJSON(json);
            txt = '<tr><td>交易序號</td><td>Name</td><td>card</td><td>數量</td><td>底價</td><td>截止時間</td><td>剩餘時間</td><td>目前最高者</td><td>目前金額</td><td>出價</td></tr>';
            for(var i=0;i<jsdata.length;i++){
                now= new Date();
                tday=new Date(jsdata[i]['deadline']);
                upday = new Date(jsdata[i]['uptime']);
                time=Math.floor((tday-now)/1000);
                if(time<=0){
                    checkSale(jsdata[i]);
                }else if(upday>now){
                    continue;
                }else{
                    txt+="<td>"+jsdata[i].aid+"</td><td>"+jsdata[i].name+"</td><td>"+jsdata[i].cName+"</td><td>"+jsdata[i].num+"</td><td>"+jsdata[i].lowprice+"</td><td>"+jsdata[i].deadline+"</td><td>"+time+"</td><td>"+jsdata[i].high_name+"</td><td>"+jsdata[i].high_price+"</td>";
                    if(jsdata[i].name==name)
                        txt+="<td>我要出價</td></tr>";
                    else
                        txt+="<td><a href='profile.php?aid="+jsdata[i].aid+"&high="+jsdata[i].high_price+"&hName="+jsdata[i].high_name+"'>我要出價</a></td></tr>";
                }
            }
            txt += "</table>";
            document.getElementById("auc").innerHTML=txt;
		}
    });
}
function card(uid){
    $.ajax({
        url: "card.php",
		dataType: 'html',
        type: 'POST',
        data:{id:uid},
        error: function(response) {
			alert('Ajax request failed!');
			},
		success: function(json) {
            jsdata = jQuery.parseJSON(json);
            txt = '<tr><td>A</td><td>B</td><td>C</td><td>D</td><td>E</td><td>F</td><td>G</td><td>H</td></tr>';
            txt += "<tr><td>"+"<a href='profile.php?type=A&nnum="+jsdata.A+"'>"+jsdata.A+"</a>"+"</td><td>"+"<a href='profile.php?type=B&nnum="+jsdata.B+"'>"+jsdata.B+"</a>"+"</td><td>"+"<a href='profile.php?type=C&nnum="+jsdata.C+"'>"+jsdata.C+"</a>"+"</td><td>"+"<a href='profile.php?type=D&nnum="+jsdata.D+"'>"+jsdata.D+"</a>"+"</td><td>"+"<a href='profile.php?type=E&nnum="+jsdata.E+"'>"+jsdata.E+"</a>"+"</td><td>"+"<a href='profile.php?type=F&nnum="+jsdata.F+"'>"+jsdata.F+"</a>"+"</td><td>"+"<a href='profile.php?type=G&nnum="+jsdata.G+"'>"+jsdata.G+"</a>"+"</td><td>"+"<a href='profile.php?type=H&nnum="+jsdata.H+"'>"+jsdata.H+"</a>"+"</td></tr>";
            txt += "</table>";
            document.getElementById("card").innerHTML=txt;
		}
    });
}
function checkSale(auc){
    $.ajax({
		url: "json.php",
		dataType: 'html',
		type: 'POST',
		data: { aid: auc.aid,
                name:auc.name,
                cName:auc.cName,
                num:auc.num,
                hName:auc.high_name,
                price:auc.high_price,
                deadline:auc.deadline},
			error: function(response) {
				alert('Ajax request failed!');
				}
            });
}
window.onload = function () {
    setInterval(function () {
		load()
    }, 1000);
};
</script>
<a href='record.php'>Record</a>
<a href='controller.php?logout=true'><button>登出</button></a>
<hr></hr>
<h2>Your card<h2>
<table id='card' border='5' width='500'>

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
<table id='auc' border='5' width='1000'>
<?php
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
