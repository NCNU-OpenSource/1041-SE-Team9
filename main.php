<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content="30" />
<link rel="stylesheet" type="text/css" href="main.css">
<script src="functions.js"></script>
</head>
<body>
<?php
session_start();
include_once "connMysql.php";
include_once "checklandstatus.php";
$user=$_SESSION["username"];
?>
<div id="demo"><h2>開心農場</h2></div>

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
echo "<table>";
echo "<tr><td>玩家名稱:$row[2]</td><tr>";
echo "<tr><td>體力:$row[3]</td><tr>";
echo "<tr><td>經驗值:$row[4]</td><tr>";
echo "<tr><td>等級:$row[5]</td><tr>";
echo "<tr><td>升級所需經驗:$row[6]</td><tr>";
echo "<tr><td id=\"playerMoney\">金錢:$row[7]</td><tr>";
echo "</table>";
echo "<a href=\"store.php\">商店</a> ";
echo "<a href=\"bag.php\">背包</a><br>";
echo"<table>";
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
            $status="尚未解鎖";
            echo "<td><button id=\"land{$index}\" title=\"{$status}\" onclick=\"unlock($index)\" {$disabled}>{$status}</button></td>";
        }
        else if($available[$index-1][2]==0){
            $disabled="";
            $status="閒置";
        echo "<td><button id=\"land{$index}\" title=\"{$status}\" onclick=\"show($index)\" data=\"{$index}\" {$disabled}>{$status}</button></td>";
        }
        else if($available[$index-1][2]==1){
            $disabled="";
            $status="生長中";
        echo "<td><button id=\"land{$index}\" title=\"{$status}\" value=\"{$available[$landid][3]}\" {$disabled}>{$status}</button></td>";
        }
        else if($available[$index-1][2]==2){
            $disabled="";
            $status="待採收";
            echo "<td><button id=\"land{$index}\" title=\"{$status}\" onclick=\"get($index)\" {$disabled}>{$status}</button></td>";
        }
        $index++;
    }
    echo "</tr>";
}
?>
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