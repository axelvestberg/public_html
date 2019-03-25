<?php

$url = "two.php";
$cookie_name = "user";
$cookie_value = "John Doe";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

echo "<a href=".$url.">Cookie</a>";     
?>