<?php

$numberOfRecipes = 20;

if (!empty($_POST['showmore'])) {
    showMore();
}

function showMore() {
    $numberOfRecipes = $numberOfRecipes + 4;
    print_r($numberOfRecipes);
}
// $query = http_build_query($_GET['health'], $_GET['cuisineType']);

//TODO BUILD THE QUERY BUILDER WITH CHECKBOXES ETC
if (!empty($_GET['id'])) {
    $todos_url = "https://api.edamam.com/search?q=" . urlencode($_GET['id']) . "&app_id=c950b701&app_key=3227595a44a82292164fed1f488323f7&time=1%2B&from=0&to=" . $numberOfRecipes;
} else {
    $todos_url = "https://api.edamam.com/search?q=easy&app_id=c950b701&app_key=3227595a44a82292164fed1f488323f7&time=1%2B&from=0&to=" . $numberOfRecipes;
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
    <div id="search-form">
        <form action="" method="get">
            <input type="text" name="id" value="<?php echo (isset($_GET['id'])) ? htmlentities($_GET['id']) : '' ?>"/>
            <button id="search-button" type="submit"><i class="fas fa-search"></i></button>
            <br>
            <label class="container">American
            <input type="checkbox" name="cuisineType[]" value="american" <?php echo in_array('american', $_GET['cuisineType']) ? "checked" : '' ?>>
            <span class="checkmark"></span>
            </label>
            <label class="container">French
            <input type="checkbox" name="cuisineType[]" value="french" <?php echo in_array('french', $_GET['cuisineType']) ? "checked" : '' ?>>
            <span class="checkmark"></span>
            </label>
            <label class="container">Asian
            <input type="checkbox" name="cuisineType[]" value="asian" <?php echo in_array('asian', $_GET['cuisineType']) ? "checked" : '' ?>>
            <span class="checkmark"></span>
            </label>
            <br>
            <label class="container">No dairy
            <input type="checkbox" name="health[]" value="dairy-free" <?php echo in_array('dairy-free', $_GET['health']) ? "checked" : '' ?>>
            <span class="checkmark"></span>
            </label>
            <label class="container">Vegetarian
            <input type="checkbox" name="health[]" value="vegetarian" <?php echo in_array('vegetarian', $_GET['health']) ? "checked" : '' ?>>
            <span class="checkmark"></span>
            </label>
            <label class="container">No gluten
            <input type="checkbox" name="health[]" value="gluten-free" <?php echo in_array('gluten-free', $_GET['health']) ? "checked" : '' ?>>
            <span class="checkmark"></span>
        </form>
    </div>
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
        <button id="showmore" type="submit" onclick="getMoreRecipes()"></i>Show more recipes</button>
    </form>
</body>
</html>