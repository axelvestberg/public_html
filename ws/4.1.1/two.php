<?php
header("Content-type: text/plain");

foreach($_GET as $name => $value) {   
    echo $name . " = " . $value . "\n";    
} 
?>