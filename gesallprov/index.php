<?php

$numberOfRecipes = 20;

if (!empty($_POST['showmore'])) {
    showMore();
}

function showMore() {
    $numberOfRecipes = $numberOfRecipes + 4;
    print_r($numberOfRecipes);
}

if (!empty($_GET['id'])) {
    $todos_url = "https://api.edamam.com/search?q=" . urlencode($_GET['id']) . "&app_id=c950b701&app_key=3227595a44a82292164fed1f488323f7&from=0&to=" . $numberOfRecipes;
} else {
    $todos_url = "https://api.edamam.com/search?q=easy&app_id=c950b701&app_key=3227595a44a82292164fed1f488323f7&from=0&to=" . $numberOfRecipes;
}

$todos_json = file_get_contents($todos_url);
$todos_array = json_decode($todos_json, true);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Recipe Finder</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/870e39642e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="styles.css"/>
</head>
<body>
    <h1>Search recipes</h1>
    <form action="" method="get">
        <input type="text" name="id"/>
        <button type="submit">Submit</button>
    </form>
<br/>
    <?php
    echo '<div class="container">';
    echo '<div id="showing">';
    echo "showing " . $numberOfRecipes . " of " . $todos_array['count'] . " recipes";
    echo '</div>';
    echo '<div class="recipe-container">';
    if (!empty($todos_array)) {
        foreach($todos_array['hits'] as $todo) {
            echo '<a href="' . $todo['recipe']['url'] . '">';
            echo '<div>';
            echo '<img src="' . $todo['recipe']['image'] . '" width="150" height="150">';
            echo '<span title="' . $todo['recipe']['label'] . '" class="label">' . $todo['recipe']['label'] . '</span>';
            echo '<span class="label">' . $todo['recipe']['totalTime'] . ' minutes </span>';
            echo '<i id="like" class="far fa-heart"></i>';
            echo '</div>';
            echo '</a>';
        }
    }
    echo '</div>';
    echo '</div>';
    ?>
    <form action="" method="post">
        <button type="submit" onclick="getMoreRecipes()">Show more recipes</button>
    </form>
</body>
</html>