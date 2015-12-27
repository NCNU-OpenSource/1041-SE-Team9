<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>開心農場</title>
<<<<<<< HEAD
<link rel=stylesheet type="text/css" href="login.css">
<<<<<<< HEAD
<script src="functions.js"></script>
=======
=======
<style type="text/css">
body {
background-image:url(登入農場.jpg);
background-size:2000px 1100px;
width:1800px;
}
#cont {
width: 400px;
margin: 250px auto;
border-radius: 100px;
background-color:#1E90FF;
padding: 50px;
color:ivory;
font-size: 20pt;
text-align: center;
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
>>>>>>> origin/master
>>>>>>> parent of e5bb5b7... 將登入頁面的css獨立出來
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
