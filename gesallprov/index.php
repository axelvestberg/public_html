<?php
$url = "https://api.edamam.com/search?q=chicken&app_id=c950b701&app_key=3227595a44a82292164fed1f488323f7&from=0&to=3";
$parts = parse_url($url);
$other_html = str_replace('---value---', test, '---value---');
echo $other_html;
// $output = [];
// parse_str($parts['query'], $output);
// echo $output['page']; // 12
?>