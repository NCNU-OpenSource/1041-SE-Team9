<!DOCTYPE html>
<html>
<style>
body
{
    font-size: 25pt;
    font-family: Times New Roman;
    position:absolute;
    top:45%;
    left:40%;   
}
form{
    width: 40%;
    height: 50%;
    margin-left:auto; 
    margin-right:auto;
    border-radius: 100px;
    background-color:#1E90FF;
    padding: 50px;
    color:ivory;
    font-size: 25pt;
    text-align: center;
}
</style>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>註冊頁面</title>
<link rel="stylesheet" type="text/css" href="signup.css"></link>
</head>

<body>
<form name="form" method="post" action="newUser.php">
id<input type="text" name="id" required/> <br>
password<input type="password" name="password" required/> <br>
name<input type="text" name="name" required/> <br>
<input type="submit" name="button" value="確定" />
</form>

</body>

</html>
