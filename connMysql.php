<?php 
	//資料庫主機設定
    //此為網站所使用之帳號密碼
    /*$db_host = "mysql3.000webhost.com";
	$db_username = "a1767975_hw11";
	$db_password = "a12345678";
	$db_name = "a1767975_hw11";*/
    
    $db_host = "127.0.0.1";
	$db_username = "fin";
	$db_password = "12345678";
	$db_name = "fin";
	//連線伺服器
	$db_link = @mysqli_connect($db_host,$db_username,$db_password,$db_name);
	if (!$db_link) die("資料連結失敗！");
	//設定字元集與連線校對
	mysqli_query($db_link, "SET NAMES 'utf8'");
?>