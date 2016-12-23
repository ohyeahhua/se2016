<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
body {
    color:black;
    background: white url(./card/bg.jpg) center 60px fixed no-repeat;
    background-size: 800px;
    overflow-y: auto;
    overflow-x: hidden;
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
    font-size:0.7cm;
}
#yc {
    position:relative;
    left:35px;
}
#ci {
    position:absolute;
    left:1100px;
}
#au {
    position:relative;
    left:35px;
}
input[type="submit"]{
    padding:5px 10px; 
    background:Gainsboro; 
    border:0 none;
    cursor:pointer;
    border-radius: 5px; 
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
<div id="yc">
<?php
require("sell.php");
require("user.php");
if(isset($_SESSION['name'])){
    echo "<h2 id='hi' style='margin-top:100px'></h2>";
    echo "<script>var uid = {$_SESSION['uid']};var name = '{$_SESSION['name']}';</script>";
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
<link href="//cdnjs.cloudflare.com/ajax/libs/alertify.js/0.3.10/alertify.core.css" rel="stylesheet">  
<link href="//cdnjs.cloudflare.com/ajax/libs/alertify.js/0.3.10/alertify.default.css" rel="stylesheet">  
<script src="//cdnjs.cloudflare.com/ajax/libs/alertify.js/0.3.10/alertify.min.js"></script>  
<script>
hi(uid);
load();
card(uid);
var cards = ["歧視的川普","悲傷之音-Si La Re","進擊的小英","小馬愛說笑","阿扁口袋深","做好做滿倫","安倍三把箭","欲罷不能的阿惠"];
function load() {
    hi(uid);
    bag();
    card(uid);
    $.ajax({
        url: "see.php",
		dataType: 'html',
        type: 'POST',
        error: function(response) {
			alertify.alert('Ajax request failed!');
			},
		success: function(json) {
            jsdata = jQuery.parseJSON(json);
            txt = '<tr align="center" style="font-weight:bold"><td>交易序號</td><td>Name</td><td>Card</td><td>數量</td><td>底價</td><td>截止時間</td><td>剩餘時間</td><td>目前最高者</td><td>目前金額</td><td width="100">出價</td></tr>';
            for(var i=0;i<jsdata.length;i++){
                now= new Date();
                tday=new Date(jsdata[i]['deadline']);
                upday = new Date(jsdata[i]['uptime']);
                time=Math.floor((tday-now)/1000);
                if(time<=0){
                    f = Math.floor(Math.random()*8);
                    s = Math.floor(Math.random()*8);
                    t = Math.floor(Math.random()*8);
                    if(jsdata[i].high_name == name){
                        if(jsdata[i].name=='NPC'){
                            alertify.alert("Congregation! You has won a fukubukuro!"+"</br>1."+cards[f]+"</br>2."+cards[s]+"</br>3."+cards[t]);
                        }
                        else
                            alertify.alert("Congregation! Your bid("+jsdata[i].aid+") has won!");
                    }
                    checkSale(jsdata[i],f,s,t);
                }else if(upday>now){
                    continue;
                }else{
                    if(jsdata[i].name == 'NPC')
                        txt+="<tr style='background-color:gold'><td>"+jsdata[i].aid+"</td><td>"+jsdata[i].name+"</td><td>"+jsdata[i].Hname+"</td><td>"+jsdata[i].num+"</td><td>"+jsdata[i].lowprice+"</td><td>"+jsdata[i].deadline+"</td><td>"+time+"</td><td>"+jsdata[i].high_name+"</td><td>"+jsdata[i].high_price+"</td>";
                    else
                        txt+="<tr><td>"+jsdata[i].aid+"</td><td>"+jsdata[i].name+"</td><td>"+jsdata[i].Hname+"</td><td>"+jsdata[i].num+"</td><td>"+jsdata[i].lowprice+"</td><td>"+jsdata[i].deadline+"</td><td>"+time+"</td><td>"+jsdata[i].high_name+"</td><td>"+jsdata[i].high_price+"</td>";
                    if(jsdata[i].name==name||jsdata[i].high_name==name)
                        txt+="<td><button>X</button></td></tr>";
                    else
                        txt+="<td><a href='profile.php?aid="+jsdata[i].aid+"&high="+jsdata[i].high_price+"&hName="+jsdata[i].high_name+"&deadline="+jsdata[i].deadline+"&myMoney="+myMoney+"'><button>我要出價</button></a></td></tr>";
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
			alertify.alert('Ajax request failed!');
			},
		success: function(json) {
            jsdata = jQuery.parseJSON(json);
            txt = '<tr style="font-weight:bold"><td>歧視的川普</td><td>悲傷之音-Si La Re</td><td>進擊的小英</td><td>小馬愛說笑</td><td>阿扁口袋深</td><td>做好做滿倫</td><td>安倍三把箭</td><td>欲罷不能的阿惠</td></tr>';
            txt += "<tr><td>"+"<a href='profile.php?type=A&nnum="+jsdata.A+"'>"+jsdata.A+"</a>"+"</td><td>"+"<a href='profile.php?type=B&nnum="+jsdata.B+"'>"+jsdata.B+"</a>"+"</td><td>"+"<a href='profile.php?type=C&nnum="+jsdata.C+"'>"+jsdata.C+"</a>"+"</td><td>"+"<a href='profile.php?type=D&nnum="+jsdata.D+"'>"+jsdata.D+"</a>"+"</td><td>"+"<a href='profile.php?type=E&nnum="+jsdata.E+"'>"+jsdata.E+"</a>"+"</td><td>"+"<a href='profile.php?type=F&nnum="+jsdata.F+"'>"+jsdata.F+"</a>"+"</td><td>"+"<a href='profile.php?type=G&nnum="+jsdata.G+"'>"+jsdata.G+"</a>"+"</td><td>"+"<a href='profile.php?type=H&nnum="+jsdata.H+"'>"+jsdata.H+"</a>"+"</td></tr>";
            txt += "</table>";
            document.getElementById("card").innerHTML=txt;
		}
    });
}
function hi(uid){
    $.ajax({
        url: "name.php",
		dataType: 'html',
        type: 'POST',
        data:{id:uid},
        error: function(response) {
			alertify.alert('Ajax request failed!');
			},
		success: function(json) {
            jsdata = jQuery.parseJSON(json);
            txt = 'Hi '+jsdata.name+", your money: $"+jsdata.money;
            myMoney=jsdata.money;
            login = jsdata.loginTime;
            document.getElementById("hi").innerHTML=txt;
		}
    });
}
function checkSale(auc,f,s,t){
    $.ajax({
		url: "json.php",
		dataType: 'html',
		type: 'POST',
		data: { aid: auc.aid,
                name:auc.name,
                cName:auc.cName,
                num:auc.num,
                first:f,
                second:s,
                third:t,
                hName:auc.high_name,
                price:auc.high_price,
                deadline:auc.deadline},
			error: function(response) {
				alertify.alert('Ajax request failed!');
				}
            });
}
function changeMoney(){
    $.ajax({
        url: "card.php",
		dataType: 'html',
        type: 'POST',
        data:{id:uid},
        error: function(response) {
			alertify.alert('Ajax request failed!');
			},
		success: function(json) {
            jsdata = jQuery.parseJSON(json);
            if(jsdata.A<1 || jsdata.B<1 || jsdata.C<1 || jsdata.D<1 || jsdata.E<1 || jsdata.F<1 || jsdata.G<1 || jsdata.H<1)
                alertify.alert("You don't have enough card!");
            else{
                var r=confirm("Are you sure?");
                if(r==true)
                    change();
            }
		}
    });
}
function change(){
$.ajax({
        url: "change.php",
		dataType: 'html',
        type: 'POST',
        data:{id:uid},
        error: function(response) {
			alertify.alert('Ajax request failed!');
			},
		success: function() {
            alertify.alert("Exchange successfully!");
		}
    });
}
function bag(){
    now = new Date();
    s = now.getSeconds();
    if(s % 30 == 0){
        $.ajax({
            url: "bag.php",
            dataType: 'html',
            type: 'POST',
            data: { name:'npc',
                    cID:9,
                    num:'1',
                    price:(Math.random()*(500-300)+300),
                  },
            error: function(response) {
                    alertify.alert('Ajax request failed!');
                }
            });
    }
}
function rank(){
$.ajax({
        url: "rank.php",
		dataType: 'html',
        type: 'POST',
        data:{id:uid},
        error: function(response) {
			alertify.alert('Ajax request failed!');
			},
		success: function(rank) {
            ranks = jQuery.parseJSON(rank);
            txt ="<h2>Rank<h2><table border='5' width ='500'><tr><td>Rank</td><td>Name</td><td>Money</td></tr>";
            for(i = 0; i < ranks.length; i++){
                if(ranks[i].name == name)
                    txt +="<tr bgcolor='#FF0000'><td>"+ranks[i].rank+"</td><td>"+ranks[i].name+"</td><td>"+ranks[i].money+"</td></tr>";
                else 
                    txt +="<tr><td>"+ranks[i].rank+"</td><td>"+ranks[i].name+"</td><td>"+ranks[i].money+"</td></tr>";
            }
            txt +='</table>';
            alertify.alert(txt);
		}
    });}
function bonus(){
    d = new Date();
    time = new Date(d.getFullYear(),d.getMonth(),d.getDate());
    loginTime = new Date(login);
    if(loginTime <= time){
        $.ajax({
        url: "bonus.php",
		dataType: 'html',
        type: 'POST',
        data:{id:uid
        },
        error: function(response) {
			alertify.alert('Ajax request failed!');
			},
		success: function() {
            alertify.alert("<h2>You get the bonus for $1000!!!</h2>");
		}
    });
    }else
        alertify.alert("<h2>You had already got the login-bonus</br>Last time: "+loginTime+"</h2>");
    
}
window.onload = function () {
    setInterval(function () {
		load()
    }, 1000);
};
</script>
<div id="ci">
<big><a href="cInfor.php" style="font-family:Century Gothic;font-weight:bold;text-decoration:none;color:DarkOrchid">Card Information</a></big><br/>
<big><a href='javascript: changeMoney()' style="font-family:Century Gothic;font-weight:bold;text-decoration:none;color:DarkOrchid">Money Exchange</a></big><br/>
<big><a href="record.php" style="font-family:Century Gothic;font-weight:bold;text-decoration:none;color:DarkOrchid">My Record</a></big><br/>
<button id="logout" onclick='rank()'>Rank</button>
<button id="logout" onclick='bonus()'>每日領取</button>
<a href='controller.php?logout=true'><button id="logout">登出</button></a>
</div>

<h2 style="margin-top:-15px">Your card<h2>
<table style="border:3px LimeGreen groove;text-align:center" id='card' border='5' width='1000'>

</table>
<form method='post' action='controller.php'>
<input type='hidden' name='act' value='up'>
<small>Type:</small><input type='text' name='type' size="3" value='<?php echo "$type"?>'>
<small>Amount:</small><input type='text' name='num' size="3" value='<?php echo "$nnum"?>' >
<input type='hidden' name='nnum' value='<?php echo "$nnum"?>'>
<small>底價:</small><input type='text' name='lowprice' size="5"></br>
<small>上架時間 : </small><input type='date' name='update' ><input type='time' name='uptime' ></br>
<small>截止時間 : </small><input type='date' name='deaddate' ><input type='time' name='deadtime' >
<input type='submit' value='確認'>
</form>
</div>
<hr></hr>

<div id="au">
<h2>AUCTION</h2>
<table style="border:3px LimeGreen groove;text-align:center" cellpadding="2" id='auc' border='5' width='1000'>
</table>
<?php
if(isset($_GET['aid'])){
    $aid=$_GET['aid'];
    echo "<form method='post' action='controller.php'>";
    echo "<input type='hidden' name='high' value='{$_GET['high']}'>";
    echo "<input type='hidden' name='hName' value='{$_GET['hName']}'>";
    echo "<input type='hidden' name='deadline' value='{$_GET['deadline']}'>";
    echo "<input type='hidden' name='money' value='{$_GET['myMoney']}'>";
    echo "<input type='hidden' name='act' value='raised'>";
    echo "<input type='hidden' name='aid' value='$aid'>";
    echo "<table border='5' width='500'><tr><td>交易序號:$aid</td>";
    echo "<td>輸入金額:<input type='text' name='price'></td>";
    echo "<td><input type='submit' value='確認'></form></td></tr></table>";
}
?>
</div>