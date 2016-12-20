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
#log{
    margin:0px auto;
    margin-top:80px;
    width:350px;
    height:65px;
    border-style:dashed;
    border-color:DarkGrey;
    border-width:2px;
    background:rgba(220, 220, 220,0.3);
    background-position:left;
}
#auc {
    margin:35px;
}
</style>
<title>WELCOME!</title>
<h1 style="color:MidnightBlue;font-style:italic;font-size:1.0cm">World Hegemony Battle</h1>
<img src="./card/bbg.png" />
</head>
<body>
<div id="log" align="center">
<script type="text/javascript" src="jquery.js"></script>
<form method="post" action="controller.php">
<input type="hidden" name="act" value="login">
Login ID : <input type="text" name="loginID"><br/>
Password : <input type="password" name="pwd"><br/>
<input type="submit" value="登入">
<input type="button" value="Register" onclick="location.href='register.html'">
</form>
</div>
<hr></hr>
<table id='auc' border='5' width='1000'>
<script>
load();
function load() {
    bag();
    $.ajax({
        url: "see.php",
		dataType: 'html',
        type: 'POST',
        error: function(response) {
			alert('Ajax request failed!');
			},
		success: function(json) {
            jsdata = jQuery.parseJSON(json);
            txt = '<tr align="center" style="font-weight:bold"><td>交易序號</td><td>Name</td><td>Card</td><td>數量</td><td>底價</td><td>截止時間</td><td>剩餘時間</td><td>目前最高者</td><td>目前金額</td></tr>';
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
                    txt+="<td>"+jsdata[i].aid+"</td><td>"+jsdata[i].name+"</td><td>"+jsdata[i].Hname+"</td><td>"+jsdata[i].num+"</td><td>"+jsdata[i].lowprice+"</td><td>"+jsdata[i].deadline+"</td><td>"+time+"</td><td>"+jsdata[i].high_name+"</td><td>"+jsdata[i].high_price+"</td></tr>";
                }
            }
            txt += "</table>";
            document.getElementById("auc").innerHTML=txt;
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
                    alert('Ajax request failed!');
                }
            });
    }
}
window.onload = function () {
    setInterval(function () {
		load()
    }, 1000);
};
</script>
