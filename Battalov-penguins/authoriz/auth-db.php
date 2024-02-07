
<?php
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_SPECIAL_CHARS);
$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_SPECIAL_CHARS);

require "../connect.php";

// Проверяем наличие пользователя с указанным логином и паролем
$query = "SELECT * FROM users WHERE login='$login' AND pass='$pass'";
$result = mysqli_query($con, $query);

if(mysqli_num_rows($result) == 0){
    echo "Такой пользователь не найден.";
    exit();
} elseif(mysqli_num_rows($result) > 1) {
    echo "Найдено больше одного пользователя с таким логином и паролем. Пожалуйста, обратитесь к администратору.";
    exit();
}

$user = mysqli_fetch_assoc($result); // Получаем данные пользователя

setcookie('name', $user['name'], time() + 3600, "/");

header('Location: page.php');
?>