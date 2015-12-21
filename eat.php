<?php
include "connMysql.php";
session_start();
$user=$_SESSION["username"];
$foodid=$_GET["foodid"];
$warn="好吃~";

$sql="select energy from user where id='$user'";
$result=mysqli_query($db_link,$sql);
if (!$result) die("Query Fail!".mysqli_error($db_link));
$row=mysqli_fetch_array($result);
$energy=$row['energy'];//玩家吃東西前的體力

$sql="select * from food where fid=$foodid";
$result=mysqli_query($db_link,$sql);
if (!$result) die("Query Fail!".mysqli_error($db_link));
$row=mysqli_fetch_array($result);
$recovery=$row['recovery'];//恢復的體力

$sql="select * from bag where foodid=$foodid and playerid='$user'";
$result=mysqli_query($db_link,$sql);
if (!$result) die("Query Fail!".mysqli_error($db_link));
$row=mysqli_fetch_array($result);
$many=$row['number'];//背包裡面有多少個食物

if($many<=0){//判斷有沒有這食物
    $warn="已經沒有了";
    goto send_data;
}
else if($energy>=100){
    $warn="體力已滿";
    goto send_data;
}
else{//有食物的話，減1(吃掉一個)
    $sql="update bag set number=number-1 where playerid='$user' and foodid=$foodid";
    $result=mysqli_query($db_link,$sql);
    if (!$result) die("Query Fail!".mysqli_error($db_link));
}

if($energy+$recovery>100)//恢復的體力不能超過100
    $sql="update user set energy=100 where id='$user'";
else
    $sql="update user set energy=energy+$recovery where id='$user'";
$result=mysqli_query($db_link,$sql);
if (!$result) die("Query Fail!".mysqli_error($db_link));

$sql="select * from bag where foodid=$foodid and playerid='$user'";
$result=mysqli_query($db_link,$sql);
if (!$result) die("Query Fail!".mysqli_error($db_link));
$row=mysqli_fetch_array($result);
$many=$row['number'];//吃了之後，背包裡面有多少個食物

$sql="select energy from user where id='$user'";
$result=mysqli_query($db_link,$sql);
if (!$result) die("Query Fail!".mysqli_error($db_link));
$row=mysqli_fetch_array($result);
$energy=$row['energy'];//玩家吃東西之後的體力

send_data:
$data = Array($energy,$many,$warn);
echo json_encode($data);
?>