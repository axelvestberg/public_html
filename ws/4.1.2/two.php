<?php
header("Content-type: text/plain");
     foreach($_POST as $n => $v) {
    echo $n . " = " . $v . "\n";
    }
?>