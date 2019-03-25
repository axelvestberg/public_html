<?php
session_start();

header('Content-type: text/plain');

$myfile = fopen("visits.txt", "w") or die("Unable to open file!");

$_SESSION['visits'] = $_SESSION['visits'] + 1;
$count = $_SESSION['visits'];
fwrite($myfile, $count);

$output_file = file_get_contents("visits.txt");
echo $output_file;

?>