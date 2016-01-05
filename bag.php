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
        <link rel="stylesheet" type="text/css" href="bag.css">
        <script src="functions.js"></script>
        <title>背包</title>
    </head>
    <body>
<div id="playerimage">
    <h1><img id="playerimage" src="img/農夫(去背過).png"></h1>
</div>
<div id="info">
    <?php
        echo "<table>";
        echo "<tr><td>玩家名稱:$row[2]</td><tr>";
        echo "<tr><td id=\"playerEnergy\">體力:$row[3]</td><tr>";
        echo "<tr><td>經驗值:$row[4]</td><tr>";
        echo "<tr><td>等級:$row[5]</td><tr>";
        echo "<tr><td>升級所需經驗:$row[6]</td><tr>";
        echo "<tr><td id=\"playerMoney\">金錢:$$row[7]</td><tr>";
        echo "</table>";
    ?>
</div>
<div id="foodinbag">
    <table  ALIGN="center" CELLSPACING="20" >
        <?php
        $sql2="SELECT food.name,food.recovery,bag.number FROM bag,food WHERE fid=foodid and playerid='{$user}'";
        $result2=mysqli_query($db_link,$sql2);
        if (!$result2) die("Query Fail!".mysqli_error($db_link));
        $index=0;
        while($row2[$index]=mysqli_fetch_array($result2)){
            $foodid=$index+1;
            if($row2[$index][2]<=0){
                $index++;
                continue;
            }
            if($foodid==1)
            {
              echo"<tr><td><img src=\"img\麵包.png\"  alt=\"麵包\" height=\"100\" width=\"100\"></td>";
            }
            if($foodid==2)
            {
              echo"<tr><td><img src=\"img\Redbull.png\"  alt=\"Redbull\" height=\"100\" width=\"60\" td align=\"center\"></td>";
            }
            if($foodid==3)
            {
              echo"<tr><td><img src=\"img\七七乳加巧克力.png\"  alt=\"七七乳加巧克力\" height=\"100\" width=\"100\"></td>";
            }
            if($foodid==4)
            {
              echo"<tr><td><img src=\"img\便當.png\"  alt=\"便當\" height=\"100\" width=\"100\"></td>";
            }
            echo"           
            <td>回復體力{$row2[$index][1]}</td>
            <td id=\"manyFood{$foodid}\">擁有{$row2[$index][2]}個</td>
            <td><button id=\"{$foodid}\" onclick=\"eat({$foodid})\">使用</button></td></tr>";
            $index++;
        }
        ?>
    </table>
</div>        
<div id="backmain" >
    <a href="main.php"><img  id="backmain" title="返回農場" src="img/返回用箭頭.png" width="50"></a>
</div>
        <p id="warn"></p>
    </body>
</html>