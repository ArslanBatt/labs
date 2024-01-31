<?php      
include "connect.php";

//навигация
$query_get_category = "select * from categories"; 
$categories = mysqli_fetch_all(mysqli_query($con, $query_get_category));
$news = mysqli_query($con, "select * from news");
//


$new_id = isset($_GET["new"]) ? $_GET["new"] :false;

$query_getnew = "select news.*, categories.name from news inner join categories on news.category_id = categories.category_id where news_id = $new_id";
$new_info = mysqli_fetch_assoc(mysqli_query($con, $query_getnew));


include "header.php";


$date = date("d-m-y  h:m:s", strtotime($new_info["publish_date"]));

$month = [
    "01" => 'Январь',
    "02" => 'Февраль',
    "03" => 'Март',
    "04" => 'Апрель',
    "05" => 'Май',
    "06" => 'Июнь',
    "07" => 'Июль',
    "08" => 'Август',
    "09" => 'Сентябрь',
    "10" => 'Октябрь',
    "11" => 'Ноябрь',
    "12" => 'Декабрь'
];


$m_text = $month[substr($date, 3, 2)];
$publish_date = substr($date, 0,2). " " . $m_text .  " " . substr($date, 6);
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">

    <?php
    echo "<h1 class='post-text'>" . $new_info["title"] ."</h1>";
    echo "<div class='post_img' style='background-image:url(images/news/" . $new_info['image'] . ")'></div>";
    echo "<p 'post-cat'>Категория:<b>". $new_info["name"] ."</b></i>";
    echo "<p class = 'description'>". $new_info['content'] ."</p>";
    echo "<i>". $publish_date ."</i>";
    echo "</div>"
    ?>
    </div>
</body>
</html>