<?php      
include "connect.php";
include "header.php";

//навигация
$query_get_category = "select * from categories"; 
$categories = mysqli_fetch_all(mysqli_query($con, $query_get_category));
$news = mysqli_query($con, "select * from news");
//

$query_category = "SELECT * FROM categories";

$categories = mysqli_fetch_all(mysqli_query($con, $query_category));



?> 
<!DOCTYPE html> 
<html> 
<head> 
    <meta charset='utf-8'> 
    <meta http-equiv='X-UA-Compatible' content='IE=edge'> 
    <title>Page Title</title> 
    <meta name='viewport' content='width=device-width, initial-scale=1'> 
    <link rel='stylesheet' type='text/css' media='screen' href='style.css'> 
    <link rel="stylesheet" href="pinguins.css">
    <script src='main.js'></script> 
</head> 
<body> 
    <header> 

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
    </header> 
            
    <main> 
    <div class="text-main"> 
        <?php foreach($categories as $category){ 
            echo "<li><a href='#'>$category[1]</a></li>"; 
            } 
        ?> 
    </div> 
</main> 

        <form action="createNewValid.php" method="post" enctype="multipart/form-data">  
            <label for="category">Выберите категорию:</label>  
            <select id="category" name="category">  
                <?php 

                foreach($categories as $category){ 
                    $id_cat = $category[0];
                    $name = $category[1];
                    echo "<option value='$id_cat'>$name</option>";
                    } 
                ?>
            </select>
            <br><br>
            <label for="Title">Заголовок:</label>  
            <input type="text" id="Title" name="Title" class="submit-button-img"><br><br>  
            <label for="text" >Текст:</label><br>  
            <textarea id="text" name="text" rows="4" cols="50"></textarea><br><br>  
            <label for="image">Изображение:</label>  
            <input type="file" id="image" name="image" accept="image/*" class="submit-button-img"><br><br>  
            <input type="submit" value="Отправить" class="submit-button">

        </form>
        
</body> 
</html>