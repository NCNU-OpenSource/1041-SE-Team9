<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>開心農場</title>
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
<form action="login.php" method="post">
<table cellpadding="5">
<tr><td align="right">User Name: </td><td align="left"><input type="text" name="uid"></td></tr>
<tr><td align="right">Password: </td><td align="left"><input type="password" name="pwd"></td></tr>
<tr><td colspan="2" align="center">
<input type="submit" value="登入" name="login"> </tr>
</table>
</div>
</body>
</html>