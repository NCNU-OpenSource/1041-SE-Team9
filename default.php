<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>開心農場</title>
<link rel=stylesheet type="text/css" href="login.css">
<script src="functions.js"></script>
</head>
<body>
<div id="cont">
<form action="login.php" method="post">
<div id="farm"><tr><td><img src="開心農場去背景.png"></td></tr>
</div>
<table cellpadding="5">
<tr><td align="right">User Name: </td><td align="left"><input type="text" style="border:3px green double;" id="uid" name="uid"></td></tr>
<tr><td align="right">Password: </td><td align="left"><input type="password" style="border:3px green double;" id="pwd" name="pwd"></td></tr>
<tr><td id="result" colspan="2"></td></tr>
<tr><td colspan="2" align="center">
<input type="button" onclick="fuckyou()" value="登入" name="login"></tr>
</table>
</div>
<script src="functions.js"></script>
</body>
</html>
