<?php
include "connMysql.php";
session_start();
set_time_limit(0);
$user=$_SESSION["username"];
$plantid=$_GET["plantid"];
$landid=$_GET["landid"];
//���o�شӮɶ�
$sql="select * from plants where plantid=$plantid";
$result=mysqli_query($db_link,$sql);
if (!$result) die("Query Fail!".mysqli_error($db_link));
$row=mysqli_fetch_row($result);
$wait=$row[3];//�شӮɶ�

//�N�{�b�ɶ��N�W�شӮɶ��A�N�O�����ɶ�
$timeNow=time();
$timeFinish=$timeNow+$wait;

//�N�����ɶ��g�J�A�a��Ʈw�ç��A�a���A��"�ͪ���"
$sql="update lands set finishtime=$timeFinish,status=1,plantid=$plantid where playerid='$user' and landid=$landid";
$result=mysqli_query($db_link,$sql);
if (!$result) die("Query Fail!".mysqli_error($db_link));

//���ݦ���
/*sleep($wait);

//������N�A�a���A�]�w��2(�ݱĦ�)
$sql="update lands set finishtime=0,status=2 where playerid='$user' and landid=$landid";
$result=mysqli_query($db_link,$sql);
if (!$result) die("Query Fail!".mysqli_error($db_link));*/
echo "finish!";
?>