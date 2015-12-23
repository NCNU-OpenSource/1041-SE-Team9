<?php
session_start();
include 'connMysql.php';
$uid = addslashes($_POST['uid']);
$pwd = sha1(addslashes($_POST['pwd'])); //  sha1 hash of $_POST['pwd']
$sql1 = "select * from `user` where `id`='".$uid."'and `pw`='".$pwd."'";
$sql2="select * from `user` where `id`='$uid'";
$result1 = mysqli_query($db_link, $sql1) or die("Query Fail! 1".mysqli_error($db_link));
$result2 = mysqli_query($db_link, $sql2) or die("Query Fail! 2".mysqli_error($db_link));

$numRow1 = mysqli_num_rows($result1);
$numRow2 = mysqli_num_rows($result2);
if ($numRow1 ==0) {
    echo "帳號密碼錯誤!";
}
else {
    $_SESSION['username'] = $uid;
    echo "登入中...<meta http-equiv=REFRESH CONTENT=1;url=main.php>";
}
?>
