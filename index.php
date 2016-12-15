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
<table id='auc' border='5' width='1000'>
<script>
load()
function load() {
    $.ajax({
        url: "see.php",
		dataType: 'html',
        type: 'POST',
        error: function(response) {
			alert('Ajax request failed!');
			},
		success: function(json) {
            jsdata = jQuery.parseJSON(json);
            txt = '<tr><td>交易序號</td><td>Name</td><td>card</td><td>數量</td><td>底價</td><td>截止時間</td><td>剩餘時間</td><td>目前最高者</td><td>目前金額</td></tr>';
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
                    txt+="<td>"+jsdata[i].aid+"</td><td>"+jsdata[i].name+"</td><td>"+jsdata[i].cName+"</td><td>"+jsdata[i].num+"</td><td>"+jsdata[i].lowprice+"</td><td>"+jsdata[i].deadline+"</td><td>"+time+"</td><td>"+jsdata[i].high_name+"</td><td>"+jsdata[i].high_price+"</td></tr>";
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
window.onload = function () {
    setInterval(function () {
		load()
    }, 1000);
};
</script>
