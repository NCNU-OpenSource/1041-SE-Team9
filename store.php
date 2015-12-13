<?php
include "connMysql.php";
session_start();
$user=$_SESSION["username"];

$sql="select * from user where id='$user'";
$result=mysqli_query($db_link,$sql);
$row=mysqli_fetch_row($result);
?>
<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
<?php
echo "玩家名稱:$row[2]<br>";
echo "金錢:$row[7]<br>";
?>
        <table>
            <tr><td>食物1</td><td>恢復10體力</td><td>50元</td><td><button onclick="">購買</button></td></tr>
            <tr><td>食物2</td><td>恢復10體力</td><td>50元</td><td><button onclick="">購買</button></td></tr>
            <tr><td>食物3</td><td>恢復10體力</td><td>50元</td><td><button onclick="">購買</button></td></tr>
        </table>
    </body>
</html>