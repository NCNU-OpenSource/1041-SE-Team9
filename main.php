﻿<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="refresh" content="30" />
  <title>開心農場</title>
  <link rel="stylesheet" type="text/css" href="main.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
<script src="functions.js">
$(function() {
    $( "#dialog" ).dialog({
      autoOpen: false,
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "explode",
        duration: 1000
      }
    });
 
    $( "#opener" ).click(function() {
      $( "#dialog" ).dialog( "open" );
    });
  });
</script>
<style>

</style>
</head>
<body>
<?php
include_once "islogin.php";
include_once "connMysql.php";
include_once "checklandstatus.php";
?>
<center><div id="demo"><h2><tr><td><img src="img/開心農場去背景.png"></td></tr></h2></div></center>

<div>
<?php 
//checkland();
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
?>
<div id="dialog" title="玩家資訊">
  <p>
 <?php 
echo "<table>";
echo "玩家名稱:$row[2]";
echo "體力:$row[3]";
echo "經驗值:$row[4]";
echo "等級:$row[5]";
echo "升級所需經驗:$row[6]";
echo "<tr><td id=\"playerMoney\">金錢:$row[7]</td><tr>";

?>
</p>
</div>

<button id="opener"><img src="img/農夫.jpg"></button>
<div id="shop" >
<?php
echo "<h1><a href=\"store.php\"><img  id=shop  src=img/商店.jpg ></a></h1><br>";
?>
</div>
<div id="ground" >
<?php
$index=1;
for($i=0;$i<5;$i++){
    echo "<tr>";
    for($j=0;$j<5;$j++){
        $landid=$index-1;
        $disable="";
        $status="";
        if($available[$index-1][2]==-1){
            $disabled="disabled";
            if($count<$row[8])
                $disabled="";
            $status="<h2>尚未解鎖</h2>";
            echo "<td><button id=\"land{$index}\" title=\"{$status}\" onclick=\"unlock($index)\" {$disabled}>{$status}</button></td>";
        }
        else if($available[$index-1][2]==0){
            $disabled="";
            $status="<h1>閒置</h1>";
        echo "<td><button id=\"land{$index}\" title=\"{$status}\" onclick=\"show($index)\" data=\"{$index}\" {$disabled}>{$status}</button></td>";
        }
        else if($available[$index-1][2]==1){
            $disabled="";
            $status="<h3>生長中</h3>";
        echo "<td><button id=\"land{$index}\" title=\"{$status}\" value=\"{$available[$landid][3]}\" {$disabled}>{$status}</button></td>";
        }
        else if($available[$index-1][2]==2){
            $disabled="";
            $status="<h4>待採收</h4>";
            echo "<td><button id=\"land{$index}\" title=\"{$status}\" onclick=\"get($index)\" {$disabled}>{$status}</button></td>";
        }
        $index++;
    }
    echo "</tr>";
}
?>
</div>
    </table>
</div>
<div id="plantlist">
    <p id="whichland"></p>
    <table>
<?php
$sql="select * from plants";
$result=mysqli_query($db_link,$sql);
$index=0;
echo"<tr>";
while($row[$index]=mysqli_fetch_array($result)){
    echo"<td><label><input type=\"radio\" id=\"{$row[$index]['name']}\" name=\"plants\" value=\"{$row[$index]['plantid']}\" onclick=\"getValue(this.value)\">{$row[$index]['name']}</input></label></td>";
    //echo$index;
    if(($index+1)%3==0)
        echo"</tr>";
    $index++;
}
?>
        <tr><td><input type="button" value="確定" onclick="grow()"></td></tr>
    </table>
</div>
<script src="functions.js"></script>
<script src="Countdown.js"></script>


</body>
</html>