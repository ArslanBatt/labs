<?php 

require "../connect.php";

$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_SPECIAL_CHARS); // Удаляет все лишнее и записываем значение в переменную //$login
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_SPECIAL_CHARS);
$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_SPECIAL_CHARS); 

function check_error($error)
    {
        return "<script> alert('$error');
        location.href = 'reg.php';
        </script>";
    }


if(empty($pass) || empty($name) || empty($pass)){
	echo check_error("Введите данные для регистрации!");
	exit();
}

if(mb_strlen($login) < 5 || mb_strlen($login) > 100){
	echo check_error("Недопустимая длина логина!");
	exit();
}


$result = mysqli_query($con,"SELECT * FROM `users` WHERE `login` = '$login'");
$user = mysqli_fetch_assoc($result);

if(!empty($user)){
	echo check_error("Данный логин уже используется!");
	exit();
}

mysqli_query($con,"INSERT INTO `users` (`login`, `name` ,`pass`)VALUES('$login', '$name' ,'$pass')");