<?php
include "connMysql.php";
include_once "islogin.php";
$sql="select * from user where id='$user'";
$result=mysqli_query($db_link,$sql);
$row=mysqli_fetch_row($result);
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="store.css">
        <script src="functions.js"></script>
    </head>
    <body>
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

<div id="backmain" >
    <a href="main.php"><img  id="backmain" title="返回農場" src="img/返回用箭頭.png" width="50"></a>
</div>

        <table>

<div id="good">
<?php
$sql2="select * from bag where playerid='$user'";
$result2=mysqli_query($db_link,$sql2);
if (!$result2) die("Query Fail!".mysqli_error($db_link));
$index=0;
while($row2[$index]=mysqli_fetch_array($result2)){
    $index++;
}
$sql="select * from food order by fid";
$result=mysqli_query($db_link,$sql);
if (!$result) die("Query Fail!".mysqli_error($db_link));
$index=0;
while($row[$index]=mysqli_fetch_array($result)){
    $foodid=$index+1;
    
	echo"<tr><td>{$row[$index][1]}</td>
    <td>回復體力{$row[$index][3]}</td>
    <td>{$row[$index][2]}元</td>
    <td id=\"manyFood{$foodid}\">擁有{$row2[$index][2]}個</td>
    <td><button id=\"{$foodid}\" onclick=\"buy({$foodid})\">購買</button></td></tr>";
	
    $index++;
}
?>
</div>
        </table>
        <p id="warn"></p>
    </body>
</html>