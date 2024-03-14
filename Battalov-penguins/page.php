<?php
include "header.php";
$user_id = $_SESSION['user_id'];
$user = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `users` WHERE `user_id` = '$user_id'"));
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<h1 class='Personal-cab'>Личный кабинет</h1>
 <form action="update_user.php" method="post">
   <label for="login">Login:</label>
   <input required type="text" name="login" value="<?php echo $user['login']; ?>">
   <br>
   <label for="name">Имя:</label>
   <input required type="text" name="name" value="<?php echo $user['name']; ?>">
   <br>
   <button type="submit">Отправить</button>
 </form>
</body>
</html>
