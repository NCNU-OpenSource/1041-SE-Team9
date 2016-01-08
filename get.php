<?php
include "connMysql.php";
session_start();
$user=$_SESSION["username"];
$landid=$_GET["landid"];

//取得玩家經驗值資訊
$sql="select level,money,exp,exptonext from user where id='$user'";
$result=mysqli_query($db_link,$sql);
if (!$result) die("Query Fail!".mysqli_error($db_link));
$row=mysqli_fetch_array($result);
$level=$row['level'];
$nextLevel=$level+2;
$money=$row['money'];
$currentExp=$row['exp'];
$nextExp=$row['exptonext'];

//取得等級資訊
$sql="select * from levels where level=$nextLevel";
$result=mysqli_query($db_link,$sql);
if (!$result) die("Query Fail!".mysqli_error($db_link));
$row=mysqli_fetch_array($result);
$newNextExp=$row['exp'];


$sql="select * from lands where playerid='$user' and landid=$landid";
$result=mysqli_query($db_link,$sql);
if (!$result) die("Query Fail!".mysqli_error($db_link));
$row=mysqli_fetch_array($result);
$plantid=$row['plantid'];//植物id

//取得植物的數據
$sql="select * from plants where plantid=$plantid";
$result=mysqli_query($db_link,$sql);
if (!$result) die("Query Fail!".mysqli_error($db_link));
$row=mysqli_fetch_array($result);
$getMoney=$row[2];
$getExp=$row[4];

//更新玩家狀態
$money=$money+$getMoney;
$currentExp=$currentExp+$getExp;
if($currentExp>=$nextExp){
    $level=$level+1;
    $sql="update user set money=$money,exp=$currentExp,level=level+1,exptonext=$newNextExp,energy=energy-1,landsavaliable=(select number from landnumber where level=$level)
    where id='$user'";
}
else{
    $sql="update user set money=$money,exp=$currentExp,energy=energy-1 where id='$user'";
}
$result=mysqli_query($db_link,$sql);
if (!$result) die("Query Fail!2".mysqli_error($db_link));

//改變土地狀態
$sql="update lands set status=0,plantid=0 where playerid='$user' and landid=$landid";
$result=mysqli_query($db_link,$sql);
if (!$result) die("Query Fail!".mysqli_error($db_link));

?>