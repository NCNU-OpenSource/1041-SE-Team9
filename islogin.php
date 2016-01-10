<?php
session_start();
//登入功能
if(isset($_SESSION['username'])){
    $user=$_SESSION['username'];
}
else{//沒有登入直接回到登入頁面
    echo '<meta http-equiv=REFRESH CONTENT=0;url=default.html>';
    exit();
}//登入功能
?>