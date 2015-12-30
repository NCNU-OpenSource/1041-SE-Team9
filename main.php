<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content="60" />
<meta charset="utf-8">
  <title>開心農場</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="main.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  
<script src="functions.js"></script>
<script>
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
<center><div id="demo"><h2><img id="logo" src="img/開心農場去背景.png"></h2></div></center>

<!--div id="main"-->
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
     <?php 
    echo "<table>";
    echo "<tr><td>玩家名稱:$row[2]</td><tr>";
    echo "<tr><td>體力:$row[3]</td><tr>";
    echo "<tr><td>經驗值:$row[4]</td><tr>";
    echo "<tr><td>等級:$row[5]</td><tr>";
    echo "<tr><td>升級所需經驗:$row[6]</td><tr>";
    echo "<tr><td id=\"playerMoney\">金錢:$row[7]</td><tr>";
    echo "</table>";
    ?>
    </div>
    <div id="content">
        <div id="sidebar">
            <div id="info">
                <submit id="opener" style="background-color: transparent" ; ><img src="img/農夫(去背過).png"></button>
            </div>

            <div id="shop" >
                <a href="store.php"><img  id="shop" title="商店" src="img/商店(去背過).png"></a>
            </div>
            <div id="bag" >
                <a href="bag.php"><img  id="bag" title="背包" src="img/背包(去背過).png" width="200" height="150"></a>
            </div>
        </div>
        <div id="ground">
            <table style="align:center;">
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
                            $status="<div id=land><p id=\"land{$index}\">尚未解鎖</p></div>";
                            echo "<td><button onclick=\"unlock($index)\" {$disabled}>{$status}</button></td>";
                        }
                        else if($available[$index-1][2]==0){
                            $disabled="";
                            $status="<div id=land><p id=\"land{$index}\">閒置</p></div>";
                        echo "<td><button onclick=\"show($index)\" data=\"{$index}\" {$disabled}>{$status}</button></td>";
                        }
                        else if($available[$index-1][2]==1){
                            $disabled="";
                            $status="<div id=land><p id=\"land{$index}\" data-end=\"{$available[$landid][3]}\" title=\"生長中\">生長中</p></div>";
                        echo "<td><button value=\"{$available[$landid][3]}\" {$disabled}>{$status}</button></td>";
                        }
                        else if($available[$index-1][2]==2){
                            $disabled="";
                            $status="<div id=land><p id=\"land{$index}\">待採收</p></div>";
                            echo "<td><button onclick=\"get($index)\" {$disabled}>{$status}</button></td>";
                        }
                        $index++;
                    }
                    echo "</tr>";
                }
                ?>
                <tr><td colspan="5">
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
                </tr>
            </table>
        </div>
    </div>
<script src="functions.js"></script>
<script src="Countdown.js"></script>
</body>
</html>