<?php
session_start();

$myfile = fopen("hits.txt", "w") or die("Unable to open file!");

$_SESSION['hits'] = $_SESSION['hits'] + 1;
$hits = $_SESSION['hits'];
fwrite($myfile, $hits);

$output_file = file_get_contents("hits.txt");
$html = file_get_contents("index.html");
$html = str_replace('---$hits---', $hits, $html);
echo $html;

?>