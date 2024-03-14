<?php 
session_start();
require "connect.php";

$login = htmlspecialchars(trim($_POST['login']),ENT_QUOTES);
$name = htmlspecialchars(trim($_POST['name']), ENT_QUOTES);
$pass = htmlspecialchars(trim($_POST['pass']),ENT_QUOTES); 

// Проверка длины логина
if(mb_strlen($login) < 5 || mb_strlen($login) > 100){
    echo "Недопустимая длина логина";
    exit();
}

// Проверка наличия пользователя с такой почтой или логином
$result1 = mysqli_query($con,"SELECT * FROM `users` WHERE `login` = '$login'");
$result2 = mysqli_query($con,"SELECT * FROM `users` WHERE `name` = '$name'");
$user1 = mysqli_fetch_assoc($result1); 
$user2 = mysqli_fetch_assoc($result2); 

if(!empty($user1)){
    echo "Данная почта уже используется!";
    exit();
}

if(!empty($user2)){
    echo "Данный логин уже используется!";
    exit();
}

// Добавление пользователя в базу данных
$insert = mysqli_query($con,"INSERT INTO `users` (`name`, `pass`, `login`)VALUES('$name', '$pass','$login' )");

// Получение идентификатора вновь созданного пользователя
$user_id = mysqli_insert_id($con);

// Установка идентификатора пользователя в сессию
$_SESSION["user_id"] = $user_id;

// Перенаправление на страницу входа
header('Location: auth.php');
