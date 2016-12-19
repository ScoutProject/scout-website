<?php
session_start();
session_unset();
session_destroy();
setcookie("scouta","gone",time()-1);
header("Location: /");
exit;