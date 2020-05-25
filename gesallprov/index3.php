<?php

$html = file_get_contents("index.html");
$html_pieces = explode("<!--===xxx===-->", $html);

echo "$html_pieces[0]";

foreach($_SERVER as $var_name => $var_value) {
    $other_html = str_replace('---name---', $var_name, $html_pieces[1]);
    $other_html = str_replace('---value---', $var_value, $other_html);
    echo $other_html;
}

echo "$html_pieces[2]";
?>