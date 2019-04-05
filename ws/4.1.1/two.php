<?php
header("Content-type: text/plain");

$n = $name;
$v = $value;

foreach($_GET as $n => $v) {   
    echo $n . " = " . $v . "\n";    
} 
?>