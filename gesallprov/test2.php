<?php
if (!empty($_GET['id'])) {
    $todos_url = "https://jsonplaceholder.typicode.com/todos/" . urlencode($_GET['id']);
} else {
    $todos_url = "https://jsonplaceholder.typicode.com/todos";
}

    $todos_json = file_get_contents($todos_url);
    $todos_array = json_decode($todos_json, true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Todos</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
<form action="" method="get">
    <input type="text" name="id"/>
    <button type="submit">Submit</button>
</form>
<br/>
    <?php
    // var_dump($todos_array);
    // var_dump($_GET['id']);
    // echo '<br/>';
    if (!empty($todos_array) && !empty($_GET['id'])) {
        echo $todos_array['title'];
    } else {
        foreach($todos_array as $todo) {
            echo $todo['title'];
            echo '<br/>';
        }
    }
    ?>
</body>
</html>