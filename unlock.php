<?php
include "connMysql.php";
session_start();
$user=$_SESSION["username"];
if(isset($_GET["landid"]))
    $landid=$_GET["landid"];
$sql="select * from user where id='$user'";
$result=mysqli_query($db_link,$sql);
$row=mysqli_fetch_row($result);

$sql2="select * from lands where playerid='$user'";
$result2=mysqli_query($db_link,$sql2);
if (!$result2) die("Query Fail!".mysqli_error($db_link));
$index=0;
while($available[$index]=mysqli_fetch_row($result2)){
    $index++;
}

$count=0;
for($i=0;$i<sizeof($available)-1;$i++){
    if($available[$i][2]>=0)
        $count++;//玩家可解鎖農地的數量
}

if($count>=$row[8])
    echo '<meta http-equiv=REFRESH CONTENT=1;url=main.php>';

$sql="update lands set status=0 where landid={$landid}";
$result=mysqli_query($db_link,$sql);
if (!$result) die("Query Fail!".mysqli_error($db_link));
?>