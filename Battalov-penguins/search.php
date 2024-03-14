<?php
include "connect.php";

$search = isset($_GET["search"]) ? $_GET["search"] : false;

if ($search) {
    $query = "SELECT * FROM news WHERE title LIKE '%$search%'";
    $news = mysqli_query($con, $query);
}


?>