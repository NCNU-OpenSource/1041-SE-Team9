<?php
include "connMysql.php";
session_start();
$user=$_SESSION["username"];
$landid=$_GET["landid"];
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
$sql="update `user` set money=money+$getMoney, exp=exp+$getExp, energy=energy-1 where id='$user'";
echo $sql;
$result=mysqli_query($db_link,$sql);
if (!$result) die("Query Fail!".mysqli_error($db_link));
$row=mysqli_fetch_array($result);

//改變土地狀態
$sql="update lands set status=0,plantid=0 where playerid='$user' and landid=$landid";
$result=mysqli_query($db_link,$sql);
if (!$result) die("Query Fail!".mysqli_error($db_link));

?>