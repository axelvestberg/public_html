<?php

$base_url = "https://api.edamam.com/search?";
$app_key = "3227595a44a82292164fed1f488323f7";
$app_id = "c950b701";

$recipe_has_time = "&time=1%2B";
$from = 0;
if (empty($_GET['results'])) {
    $to = 20; 
} else {
    $to = $_GET['results'];
}

if (!empty($_GET['q'])) {
    $search_string = urlencode($_GET['q']);
    $query_parameters = array("q"=> $search_string, "app_id"=> $app_id, "app_key"=> $app_key, "from" => $from, "to" => $to);
} else {
    $query_parameters = array("q"=> "easy", "app_id"=> $app_id, "app_key"=> $app_key, "from" => $from, "to" => $to);
}
$query_url = $base_url . http_build_query($query_parameters);

if (!empty($_GET['health'])) {
    // $query_url = $query_url . "&health=" . implode('&health=', $_GET['health']));
    $query_url = $query_url . "&health=" .implode('&health=', $_GET['health']) . $recipe_has_time;
} else {
    $query_url = "https://api.edamam.com/search?q=easy&app_id=c950b701&app_key=3227595a44a82292164fed1f488323f7&time=1%2B&from=0&to=20";
}

$query_json = file_get_contents($query_url);
$query_array = json_decode($query_json, true);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Recipe Finder</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/870e39642e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="styles.css"/>
    <script>
        function toggle(x) {
            x.classList.toggle("fas")
        }
    </script>
</head>
<body>
    <h1>Search recipes</h1>
    <div id="search-form">
        <form action="" method="get">
            <input type="text" name="q" value="<?php echo (isset($_GET['q'])) ? htmlentities($_GET['q']) : '' ?>"/>
            <button id="search-button" type="submit"><i class="fas fa-search"></i></button>
            <br>
            <label>Vegan
            <input type="checkbox" name="health[]" value="vegan" <?php if (!empty($_GET['health'])) echo in_array('vegan', $_GET['health']) ? "checked" : '' ?>/>
            <span class="checkmark"></span>
            </label>
            <label>Vegetarian
            <input type="checkbox" name="health[]" value="vegetarian" <?php if (!empty($_GET['health'])) echo in_array('vegetarian', $_GET['health']) ? "checked" : '' ?>/>
            <span class="checkmark"></span>
            </label>
            <label>Peanut free
            <input type="checkbox" name="health[]" value="peanut-free" <?php if (!empty($_GET['health'])) echo in_array('peanut-free', $_GET['health']) ? "checked" : '' ?>/>
            <span class="checkmark"></span>
            <br>
            <label>Amount of results to fetch
            <select name="results" selected="40">
                <option value="20">20</option>
                <option value="40">40</option>
                <option value="60">60</option>
                <option value="80">80</option>
            </select>
        </form>
    </div>
<br/>
    <?php
    echo '<div class="container">';
    echo '<div id="showing">';
    echo "showing " . $to . " of " . $query_array['count'] . " recipes";
    echo '</div>';
    echo '<div class="recipe-container">';
    if (!empty($query_array)) {
        foreach($query_array['hits'] as $recipe) {
            echo '<div id="test">';
            echo '<a href="' . $recipe['recipe']['url'] . '">';
            echo '<div>';
            echo '<img src="' . $recipe['recipe']['image'] . '" width="150" height="150">';
            echo '<span title="' . $recipe['recipe']['label'] . '" class="label">' . $recipe['recipe']['label'] . '</span>';
            echo '<span class="label">' . $recipe['recipe']['totalTime'] . ' minutes </span>';
            echo '</div>';
            echo '</a>';
            echo '<i onclick="toggle(this)" id="like" class="far fa-heart"></i>';
            echo '</div>';
        }
    }
    echo '</div>';
    echo '</div>';
    ?>
</body>
</html>