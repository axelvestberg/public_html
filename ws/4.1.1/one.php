<?php

foreach($_GET as $name => $value) {
    if ($name = "name") {
        $name = $value;
    }
}
$html = file_get_contents("index-two.html");
$html = str_replace('---name---', $name, $html);
echo $html;

?>