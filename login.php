<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
<?php 
include 'connMysql.php';
$uid = addslashes($_POST['uid']);
$pwd = sha1(addslashes($_POST['pwd'])); //  sha1 hash of $_POST['pwd']
$sql1 = "select * from `user` where `id`='".$uid."'and `pw`='".$pwd."'";
$sql2="select * from `user` where `id`='$uid'";
$result1 = mysqli_query($db_link, $sql1) or die("Query Fail! 1".mysqli_error($db_link));
$result2 = mysqli_query($db_link, $sql2) or die("Query Fail! 2".mysqli_error($db_link));

$numRow1 = mysqli_num_rows($result1);
$numRow2 = mysqli_num_rows($result2);
if($_POST['login']){
    if ($numRow1 ==0) {
      $msg= "帳號密碼錯誤!<br/><br/>返回先前頁面...";
      echo '<meta http-equiv=REFRESH CONTENT=1;url=default.php>';
    }
    else {
        $_SESSION['username'] = $uid;
        $row=mysqli_fetch_assoc($result1);
        $msg = "Dear ".$row['id'].", You are welcome!<br/><br/>導向中...";
        echo '<meta http-equiv=REFRESH CONTENT=1;url=main.php>';
    }
}
?>
<meta charset="UTF-8">
<title>Application Login</title>
<style type="text/css">
body {width:1300px; margin:10px auto;background-color:DarkOliveGreen; }
#cont {
width: 400px;
margin: 20px auto;
border-radius: 30px;
background-color: #690;
padding: 40px;
color:ivory;
font-size: 14pt;
}
#msg {
font-weight: bold;
color:red;
}
input {
font-size: 14pt;
font-family: Times New Roman;
}
</style>
</head>
<body>
<div id="cont">
Message: <span id="msg">
<?php
echo $msg;
?>
</span>
</div>
</body>
</html>
