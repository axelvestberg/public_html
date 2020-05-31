<?php
if (!empty($_GET['id'])) {
    $todos_url = "https://api.edamam.com/search?q=" . urlencode($_GET['id']) . "&app_id=c950b701&app_key=3227595a44a82292164fed1f488323f7&from=0&to=6";
} else {
    $todos_url = "https://api.edamam.com/search?q=easy&app_id=c950b701&app_key=3227595a44a82292164fed1f488323f7&from=0&to=6";
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
    if (!empty($todos_array)) {
        foreach($todos_array['hits'] as $todo) {
            echo $todo['recipe']['label'];
            echo '<br/>';
        }
    }   
    ?>
</body>
</html>