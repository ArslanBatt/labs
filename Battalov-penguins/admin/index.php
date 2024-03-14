<?php
// Подключение к базе данных
require "../connect.php";
require "../header.php";

$news = mysqli_fetch_all(mysqli_query($con,"select news_id, title from news"));

$id_new = isset($_GET["new"])?$_GET["new"]:false;

if($id_new) $new_info = mysqli_fetch_assoc(mysqli_query($con, "select * from news where news_id=$id_new"));


?>
<!DOCTYPE html> 
    <html lang="en"> 
    <head> 
        <meta charset="UTF-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Админ</title>
        <link rel='stylesheet' type='text/css' media='screen' href='../style.css'> 
        <style>
            li{
                list-style: none;
            }
        </style>
    </head> 
    <body> 
    <h1 style="text-align: center;">Панель Администратора</h1>
        <div class="conts">
        <div class="containers1">
    <h2>Список новостей:</h2>
    <?php 
        foreach($news as $new){ 
            echo "<li><a href='?new=" . $new[0] ."'>" . $new[1] ."</a>
            <a href='deleteNew.php?new=" . $new[0] . "'><img style= 'width: 20px; height: 20px' src='/images/icons/trash.png'>
            </a></li>"; 
            echo "<hr>";
        } 
    ?> 
    <a href="index.php"><img style="width: 30px; height: 30px" src="../images/icons/plus.png" alt="Добавить новость"><?=$id_new?"":"";?></a>
    </div>
    <div class="containers2">
    <h2 style="text-align:center;"><?=$id_new?"Редактирование новости №$id_new":"Создание новости";?></h2>
    <form style="padding-top: 0;" action='<?=$id_new?"update":"create";?>NewValid.php' method="post" enctype="multipart/form-data">  
<?= "<div class='post_img' style='background-image:url(../images/news/" . (isset($new_info['image']) ? $new_info['image'] : '') . ")'></div>";?>      
<?= $id_new ?  "<input type='hidden' name='id' value='$id_new'>":"";?>      
    <label  for="category">Выберите категорию:</label>  
            <select id="category" name="category">  
                <?php 
                foreach($categories as $category){ 
                    $id_cat = $category[0];
                    $name = $category[1];
                    $is_sel = ($id_cat==$new_info['category_id'])? "selected":'';
                    echo "<option value='$id_cat'". ($id_new ? $is_sel : ''). ">$name</option>";
                    } 
                ?>
            </select>
            <br>
            <label for="Title">Заголовок:</label>  
            <input type="text" id="Title" name="Title" class="submit-button-img" value='<?=$id_new?$new_info["title"]:"";?>'>
            <label for="text" >Текст:</label>
            <textarea id="text" name="text" rows="4" cols="50" ><?=$id_new?$new_info["content"]:"";?></textarea>
            <label for="image">Изображение:</label>  
            <input type="file" id="image" name="image" accept="image/*" class="submit-button-img"> 
            <input type="submit" value="Отправить" class="submit-button">
        </form>
        </div>
    </body> 
</html>