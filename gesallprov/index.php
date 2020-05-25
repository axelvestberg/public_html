<?php

$html = file_get_contents("index.html");
$html_pieces = explode("<!--===xxx===-->", $html);

echo "$html_pieces[0]";

$html_pieces[1] = str_replace('---value---', "test", '---value---');
echo "$html_pieces[1]";

echo "$html_pieces[2]";
// $output = [];
// parse_str($parts['query'], $output);
// echo $output['page']; // 12
// $url = "https://api.edamam.com/search?q=chicken&app_id=c950b701&app_key=3227595a44a82292164fed1f488323f7&from=0&to=3";
// $parts = parse_url($url);
?>