<?php
$n = "";
$n = $name;
$h = $html;
$v = $value;

foreach($_GET as $n => $v) {
    if ($n = "name") {
        $n = $v;
    }
}
$h = file_get_contents("index-two.html");
$h = str_replace('---name---', $n, $h);
echo $h;

?>