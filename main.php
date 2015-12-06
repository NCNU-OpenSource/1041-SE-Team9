<!DOCTYPE html>
<html>
<head>
<style>
#plantlist {
    visibility:hidden;
    //可種植列表預設為隱藏
}
</style>
</head>
<body>
<?php
include "connMysql.php";
session_start();
$user=$_SESSION["username"];
?>
<div id="demo"><h2>開心農場</h2></div>

<div>
<?php 
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
echo "玩家名稱:$row[2]<br>";
echo "體力:$row[3]<br>";
echo "經驗值:$row[4]<br>";
echo "等級:$row[5]<br>";
echo "升級所需經驗:$row[6]<br>";
echo "金錢:$row[7]<br>";
echo "<a href=\"store.php\">商店</a><br>";
echo"<table>";
$index=0;
for($i=0;$i<5;$i++){
    echo "<tr>";
    for($j=0;$j<5;$j++){
        
        $disable="";
        $status="";
        if($available[$index][2]==-1){
            $disabled="disabled";
            if($count<$row[8])
                $disabled="";
            $status="尚未解鎖";
            echo "<td><button onclick=unlock({$index}) {$disabled}>{$status}</button></td>";
        }
        else if($available[$index][2]==0){
            $disabled="";
            $status="閒置";
            echo "<td><button onclick=show({$index}) {$disabled}>{$status}</button></td>";
        }
        else if($available[$index][2]==1){
            $disabled="";
            $status="生長中";
            echo "<td><button onclick=show({$index}) {$disabled}>{$status}</button></td>";
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
    <form>
        <label><input type="radio" id="1" name="plant" value="10" onclick="getValue(this.id)">作物1</input></label>
        <label><input type="radio" id="2" name="plant" value="15" onclick="getValue(this.id)">作物2</input></label>
        <label><input type="radio" id="3" name="plant" value="20" onclick="getValue(this.id)">作物3</input></label>
        <input type="button" value="確定" onclick="grow()">
    </form>
</div>
<script src="functions.js"></script>


</body>
</html>