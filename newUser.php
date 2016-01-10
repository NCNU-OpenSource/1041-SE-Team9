<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">



<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新使用者</title>
<link rel="stylesheet" type="text/css" href="signup.css"></link>
</head>

<body>

<p>insert new user</p>

<?php
include"connMysql.php";

$id = $_POST['id'];
$password=$_POST['password'];
$password=sha1($password);
$name=$_POST['name'];
$sql = "select exp from levels where level='2';";
$result=mysqli_query($db_link,$sql)or die('MySQL query error');
$row = mysqli_fetch_array($result);
$n;
$status=0;
$statuslock=-1;
$foodid;

if ($id) {
    
	$sql = "insert into user (id, pw,name,exptonext) values ('$id', '$password','$name',$row[0])";
	mysqli_query($db_link,$sql) or die("MySQL insert user error"); //執行SQL
	echo "註冊成功<br>";
    for($n=1;$n<=4;$n++){
    $sql="insert into lands (landid,playerid,status) values ('$n','$id','$status')";
    mysqli_query($db_link,$sql) or die("MySQL insert user error"); //執行SQL

    }
    for($n=5;$n<=25;$n++){
    $sql="insert into lands (landid,playerid,status) values ('$n','$id','$statuslock')";
    mysqli_query($db_link,$sql) or die("MySQL insert user error"); //執行SQL

    }
    echo "農地給完了<br>";
    
    for($foodid=1;$foodid<=4;$foodid++){
    $sql="insert into bag (playerid,foodid,number) values ('$id','$foodid','$status')";
    mysqli_query($db_link,$sql) or die("MySQL insert user error"); //執行SQL
    }
} else {
	echo "註冊失敗";
}
?>


<p><a href="default.php">回登入畫面</a></p>
</body>
</html>