<?php
include "connMysql.php";
session_start();
$user=$_SESSION["username"];
$foodid=$_GET["foodid"];
//testing update
//購買前
$sql="select * from bag where playerid='$user' and foodid=$foodid";
$result=mysqli_query($db_link,$sql);
if (!$result) die("Query Fail!".mysqli_error($db_link));
$foodNumber=mysqli_num_rows($result);//背包裡是否有這個食物
$warn="購買成功";
//testing123
$sql="select * from food where fid=$foodid";
$result=mysqli_query($db_link,$sql);
if (!$result) die("Query Fail!".mysqli_error($db_link));
$row=mysqli_fetch_array($result);
$price=$row['price'];//食物價錢

$sql="select money from user where id='$user'";
$result=mysqli_query($db_link,$sql);
if (!$result) die("Query Fail!".mysqli_error($db_link));
$row=mysqli_fetch_array($result);
$playerMoney=$row['money'];//玩家現有金錢

$sql2="select * from bag where playerid='$user' and foodid=$foodid";
$result2=mysqli_query($db_link,$sql2);
if (!$result2) die("Query Fail!".mysqli_error($db_link));
$row2=mysqli_fetch_array($result2);//取出玩家現有物品數量

//購買後
if($playerMoney<$price){
    $warn="金錢不足";
    goto send_data;
}
else{
//從玩家的錢裡扣掉購買食物的錢
    $sql="update user set money=money-$price where id='$user'";
    $result=mysqli_query($db_link,$sql);
    if (!$result) die("Query Fail!".mysqli_error($db_link));
}

if($foodNumber==0){//沒有這個食物
    $sql="insert into bag (`playerid`,`foodid`,`number`) values('$user',$foodid,1)";
}
else{//有這個食物
    $sql="update bag set number=number+1 where playerid='$user' and foodid=$foodid";
}
$result=mysqli_query($db_link,$sql);
if (!$result) die("Query Fail!".mysqli_error($db_link));

//取出玩家目前擁有的食物數量
$sql2="select * from bag where playerid='$user' and foodid=$foodid";
$result2=mysqli_query($db_link,$sql2);
if (!$result2) die("Query Fail!".mysqli_error($db_link));
$row2=mysqli_fetch_array($result2);
//echo "$row2[2]";

$sql="select money from user where id='$user'";
$result=mysqli_query($db_link,$sql);
if (!$result) die("Query Fail!".mysqli_error($db_link));
$row=mysqli_fetch_array($result);
$playerMoney=$row['money'];//買完之後的玩家金錢

send_data:
$arr=Array($warn,$playerMoney,$row2[2]);
echo json_encode($arr);
?>