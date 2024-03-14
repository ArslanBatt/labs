<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"  
integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="  
crossorigin="anonymous" referrerpolicy="no-referrer">
</script>
<?php
require "connect.php";
$query_get_category = "select * from categories"; 
$categories = mysqli_fetch_all(mysqli_query($con, $query_get_category));
$news = mysqli_query($con, "select * from news");
session_start();
$username = isset($_SESSION["user_id"]) ? mysqli_fetch_assoc(mysqli_query($con, 'select name from users where user_id =' . $_SESSION["user_id"]))["name"] : false;
?>
<!DOCTYPE html> 
<html> 
<head> 
    <meta charset='utf-8'>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
    <meta http-equiv='X-UA-Compatible' content='IE=edge'> 
    <title>Page Title</title> 
    <meta name='viewport' content='width=device-width, initial-scale=1'> 
    <link rel='stylesheet' type='text/css' media='screen' href='style.css'> 
    <link rel="stylesheet" href="style.css">
    <script src='main.js'></script> 
</head>
<body> 
    <header> 
    <div class="nav-header"> 
                <div class="sections">
                    <img src="images/Hamburger menu.png" alt="">
                    <h2>Разделы</h2>   
                </div>
                <input type="text" placeholder="Поиск" class="poisk">
                <div class="vhod">
                <?php if ($username) { ?>
                    <a href="/page.php" class="pers-name"><?= $username ?></a>
                <?php } ?>
                <?php if(!isset($_SESSION["user_id"])) { ?>
                    <a href="auth.php">Вход</a>/<a href="reg.php">Регистрация</a>
                <?php } else { ?>
                    <a href="signout.php">Выход</a>
                <?php } ?>
                </div>
        </div>
        <div class="Pinguins-and-date-and-temp">
            <a href="index.php" class="namePost1">Пингвины</a> 
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
        <?php
         foreach($categories as $category){
            echo "<li><a href='/?new=" . $category[0] . "'>$category[1]</a></li>"; 
            } 
        ?> 
    </div> 
</main>