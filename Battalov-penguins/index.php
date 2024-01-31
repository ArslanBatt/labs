<?php      
include "connect.php";


$query_get_category = "select * from categories"; 

$categories = mysqli_fetch_all(mysqli_query($con, $query_get_category));

$news = mysqli_query($con, "select * from news");

?> 

<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Пингвины</title>
    <link rel='stylesheet' type='text/css' media='screen' href='style.css'> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
</head> 
<body> 

<nav> 

<div class="nav-header"> 
                <div class="sections">
                    <img src="images/Hamburger menu.png" alt="">
                    <h2>Разделы</h2>   
                </div>
                <input type="text" placeholder=" Поиск" class="poisk" > 
                <div class="vhod"> 
                    <img src="images/Man.png" alt=""> 
                    <a href="#">Вход</a> 
                </div> 
        </div> 

        <div class="Pinguins-and-date-and-temp">
            <h1 class="namePost1">Пингвины</h1> 
            <div class="date-and-temp">
                <p>Понедельник, Январь 1, 2018</p>
                <div class="temp-content">
                    <img src="images/Sun.svg" alt="">
                    <p>- 23 °C</p>
                </div>
            </div>
        </div>

<main> 
    <div class="text-main"> 
        <?php foreach ($categories as $category){ 
            echo "<li><a href='#'>$category[1]</a></li>"; 
            } 
        ?> 
    </div> 
</main> 

<div class="main">
    <div class="last-news">
        <?php
            while($new = mysqli_fetch_assoc($news)){
                echo "<div class='card'>";

                $new_id = $new["news_id"];
                
                echo "<img src='images/news/" . $new['image'] . "'>";
                echo "<h2 class = 'c_title'>" . $new['title'] . "</h2>";
                echo "<a href='oneNew.php?new=$new_id'>" . $new['news_id'] . "</a>";
                echo "</div>";
            }
        ?>
    </div>
</div>

</body> 
</html> 