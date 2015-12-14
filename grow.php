<?php
include "connMysql.php";
session_start();
set_time_limit(0);
$user=$_SESSION["username"];
$plantid=$_GET["plantid"];
$landid=$_GET["landid"];
//取得種植時間
$sql="select * from plants where plantid=$plantid";
$result=mysqli_query($db_link,$sql);
if (!$result) die("Query Fail!".mysqli_error($db_link));
$row=mysqli_fetch_row($result);
$wait=$row[3];//種植時間

//將現在時間將上種植時間，就是完成時間
$timeNow=time();
$timeFinish=$timeNow+$wait;

//將完成時間寫入農地資料庫並更改農地狀態為"生長中"
$sql="update lands set finishtime=$timeFinish,status=1,plantid=$plantid where playerid='$user' and landid=$landid";
$result=mysqli_query($db_link,$sql);
if (!$result) die("Query Fail!".mysqli_error($db_link));

//等待成長
/*sleep($wait);

//完成後將農地狀態設定為2(待採收)
$sql="update lands set finishtime=0,status=2 where playerid='$user' and landid=$landid";
$result=mysqli_query($db_link,$sql);
if (!$result) die("Query Fail!".mysqli_error($db_link));*/
echo "finish!";
?>