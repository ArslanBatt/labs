<?php

$name = isset($_COOKIE['name'])? $_COOKIE['name']:'';

?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>Привет! <?= $name; ?> </h1>
	<a href="exit.php">Что бы выйти нажмите по ссылке.</a>

</body>
</html>
