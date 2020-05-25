<?php

$html = file_get_contents("index.html");
$html_pieces = explode("<!--===xxx===-->", $html);
$nametest = "nametest";
$valuetest = "valuetest";

$url = "https://api.edamam.com/search?q=chicken&app_id=c950b701&app_key=3227595a44a82292164fed1f488323f7&from=0&to=3";
// $parts = parse_url($url);
$obj = json_decode($url);

foreach((object) $obj->hits as $key => $value) {
    $other_html = str_replace('---name---', $key, $html_pieces[1]);
    $other_html = str_replace('---value---', $value, $other_html);
    echo $other_html;
}
echo "$html_pieces[0]";

// $other_html = str_replace('---name---', $nametest, $html_pieces[1]);
// $second = str_replace('---value---', $valuetest, $other_html);
// $third = str_replace('---recept---', $parts, $second);
// echo "$third";

echo "$html_pieces[2]";
?>