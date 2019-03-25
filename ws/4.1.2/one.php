<?php
$e = "";
$n = $name;
$v = $value;
$h = $html;

foreach($_POST as $n => $v) {
    if ($n = "name") {
        $e = $v;   
    }
}
$h = file_get_contents("index-two.html");
$h = str_replace('---$name---', $e, $h);
echo $h;

?>