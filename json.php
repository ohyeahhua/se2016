<?php 
require "dbconnect.php";
$aid=$_POST["aid"];
$name=$_POST["name"];
$cName=$_POST["cName"];
$num=$_POST["num"];
$hName=$_POST["hName"];
$price=$_POST["price"];
$deadline=$_POST["deadline"];
$cards = array("A","B","C","D","E","F","G","H");
$f=$_POST['first'];
$s=$_POST['second'];
$t=$_POST['third'];
global $conn;
//若有人競價 -> 新增record 得標者加庫存 拍賣者加錢
if($hName != ""){
    $sql="INSERT INTO `record` (`rid`, `auc`, `bidder`, `cName`,`num`, `price`, `deadline`) VALUES (NULL, '$name', '$hName', '$cName','$num', '$price', '$deadline');";
    $result = mysqli_query($conn,$sql);
    if($name=='NPC'){
        $sql="update inventory,player set $cards[$f]=$cards[$f]+1 where name='$hName' and player.uid = inventory.uid;";
        $result = mysqli_query($conn,$sql);
        $sql="update inventory,player set $cards[$s]=$cards[$s]+1 where name='$hName' and player.uid = inventory.uid;";
        $result = mysqli_query($conn,$sql);
        $sql="update inventory,player set $cards[$t]=$cards[$t]+1 where name='$hName' and player.uid = inventory.uid;"; 
    }else
        $sql="update inventory,player set $cName=$cName+$num where name='$hName' and player.uid = inventory.uid;";
    $result = mysqli_query($conn,$sql);

    $sql="update player set money=money+$price where name='$name';";
    $result = mysqli_query($conn,$sql);
}else{//拍賣者加庫存
    $sql="update inventory,player set $cName=$cName+$num where name='$name' and player.uid = inventory.uid;";
    $result = mysqli_query($conn,$sql);
}

$sql="delete from auction where aid = '$aid';";
$result = mysqli_query($conn,$sql);
?>
