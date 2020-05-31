<?php
$url = 'https://jsonplaceholder.typicode.com/todos';
$test_json = file_get_contents($url);
$test_array = json_decode($testjson, true);
echo $test_array[0]['id'];
?>