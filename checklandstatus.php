<?php
    include "connMysql.php";
    //session_start();
    $user=$_SESSION["username"];
    $timeNow=time();
    $sql="select * from lands where playerid='$user'";
    $result=mysqli_query($db_link,$sql);
    if (!$result) die("Query Fail!".mysqli_error($db_link));
    $index=0;
    while($row[$index]=mysqli_fetch_array($result)){
        if($row[$index][3]<$timeNow && $row[$index][3]>0){//待採收
            $sql2="update lands set finishtime=0,status=2 where playerid='$user' and landid={$row[$index][0]}";
            $result2=mysqli_query($db_link,$sql2);
        }
        $index++;
    }
?>