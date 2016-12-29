<?php
session_start();
$_SESSION = array();
session_unset();
setcookie("scouta","",time()-42000,"/");
setcookie(session_name(),"",time()-42000,"/");
session_destroy();
header("Location: /");
exit;