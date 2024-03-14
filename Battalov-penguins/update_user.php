<?php 
include "connect.php"; 
include "header.php";
$login = $_POST['login'];
$username = $_POST['name'];
$user_id = $_SESSION['user_id']; //изменено $_COOKIE['user_id'] на $_SESSION['user_id']
$queryUserCheck = mysqli_query($con, "UPDATE `users` SET `name`='$username',`login`='$login' WHERE user_id = $user_id"); 
echo "<script>
alert(\"готово\"); 
location.href='page.php';
</script>";
?>