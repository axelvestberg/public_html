<?php

$html = file_get_contents("index.html");
$html_pieces = explode("<!--===xxx===-->", $html);

$nametest = "nametest";
$valuetest = "valuetest";
echo "$html_pieces[0]";

$other_html = str_replace('---name---', $nametest, $html_pieces[1]);
echo "$other_html";

echo "$html_pieces[2]";
?>