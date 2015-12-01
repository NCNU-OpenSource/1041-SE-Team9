<!DOCTYPE html>
<html>
<head>
<style>
#plantlist {
    visibility:hidden;
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
$avaliable=explode(",",$row[8]);
$count=0;
for($i=0;$i<sizeof($avaliable);$i++){
    if($avaliable[$i]>=0)
        $count++;//玩家可解鎖農地的數量
}
echo "玩家名稱:$row[2]<br>";
echo "體力:$row[3]<br>";
echo "經驗值:$row[4]<br>";
echo "等級:$row[5]<br>";
echo "升級所需經驗:$row[6]<br>";
echo "金錢:$row[7]<br>";
echo"<table>";
$index=0;
for($i=0;$i<5;$i++){
    echo "<tr>";
    for($j=0;$j<5;$j++){
        
        $disable="";
        $status="";
        if($avaliable[$index]==-1){
            $disabled="disabled";
            if($count<$row[9])
                $disabled="";
            $status="尚未解鎖";
            echo "<td><input type=\"button\" value=\"{$status}\" onclick=unlock({$index}) {$disabled}></td>";
        }
        else if($avaliable[$index]==0){
            $disabled="";
            $status="閒置";
            echo "<td><input type=\"button\" value=\"{$status}\" onclick=show() {$disabled}></td>";
        }
        else if($avaliable[$index]==1){
            $disabled="";
            $status="生長中";
            echo "<td><input type=\"button\" value=\"{$status}\" onclick=show() {$disabled}></td>";
        }
        
        $index++;
    }
    echo "</tr>";
}
?>
    </table>
</div>
<div id="plantlist">
    <form>
        <label><input type="radio" name="plant" value="1">作物1</input></label>
        <label><input type="radio" name="plant" value="2">作物2</input></label>
        <label><input type="radio" name="plant" value="3">作物3</input></label>
        <input type="button" value="確定" onclick="do">
    </form>
</div>
<script>
function unlock(landid) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      //document.getElementById("demo").innerHTML = xhttp.responseText;
      location.reload(true);
    }
  };
  xhttp.open("GET", "unlock.php?landid="+landid, true);
  xhttp.send();
}
function show(){
    document.getElementById("plantlist").style.visibility = "visible";
}
</script>

</body>
</html>