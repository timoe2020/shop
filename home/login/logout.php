<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
session_unset();
session_destroy();
setcookie(session_name(),'',time()-3600,'/');
echo "<a href='login.php'>登录</a>";
