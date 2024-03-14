<?php 
include "header.php";     
include "connect.php";
$query_get_category = "select * from categories"; 
$categories = mysqli_fetch_all(mysqli_query($con, $query_get_category));
$news = mysqli_query($con, "select * from news");
$new_id = isset($_GET["new"]) ? $_GET["new"] :false;
$query_getnew = "select news.*, categories.name from news inner join categories on news.category_id = categories.category_id where news_id = $new_id";
$new_info = mysqli_fetch_assoc(mysqli_query($con, $query_getnew));
$date = date("d-m-y  h:m:s", strtotime($new_info["publish_date"]));
$month = [
    "01" => 'Январь',
    "02" => 'Февраль',
    "03" => 'Март',
    "04" => 'Апрель',
    "05" => 'Май',
    "06" => 'Июнь',
    "07" => 'Июль',
    "08" => 'Август',
    "09" => 'Сентябрь',
    "10" => 'Октябрь',
    "11" => 'Ноябрь',
    "12" => 'Декабрь'
];
function date_new($date_old){
    global $month;
    $date = date("d.m.Y H:i:s", strtotime($date_old));
    return substr($date, 0,2) ." ". $month[substr($date,3,2)]." ". substr($date, 6);
}
$m_text = $month[substr($date, 3, 2)];
$publish_date = substr($date, 0,2). " " . $m_text .  " " . substr($date, 6);
$comments_result = mysqli_query($con, "SELECT comments.*, users.name FROM comments INNER JOIN users ON comments.user_id = users.user_id WHERE news_id = $new_id ORDER BY comment_date DESC");
$comments = mysqli_fetch_all($comments_result);
$comments_count = mysqli_num_rows($comments_result);
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"      rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>
<div class="container"> 
    <?php 
    echo "<h1 class='post-text'>" . $new_info["title"] ."</h1>"; 
    echo "<div class='post_img' style='background-image:url(images/news/" . $new_info['image'] . ")'></div>"; 
    echo "<p 'post-cat'>Категория:<b>". $new_info["name"] ."</b></i>"; 
    echo "<p class = 'description'>". $new_info['content'] ."</p>"; 
    echo "<i>". $publish_date ."</i>"; 
    echo "</div>" 
    ?> 
 <h3>Комментарии </h3>
    <h3><img style="height: 30px;" src="images/free-icon-comment-2414210.png" alt=""><?= $comments_count ?></h3>
    <?php if ($username){?>
        <form action="comment-DB.php" method="post">
    <input type="hidden" name="id_new" value="<?= $new_id ?>">
    <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">
    <div class="mb-3 d-flex">
        <label for="comment_text" class="form-label">Напишите комментарий</label>
        <input type="text" name="comment_text">
    </div>
    <button type="submit">Отправить</button>
</form>
    <?php } ?>
    <?php if (mysqli_num_rows($comments_result)) {
        foreach ($comments as $comment){ ?> 
        <div class="card text-left"> 
            <div class="card-header"> 
                <?=date_new($comment[4])?> 
            </div> 
        <div class="card-body">
            <h6 class="card-subtitle mb-2 text-body-secondary">
            <?= $comment[5]?> 
            </h6>
            <p class="card-text">
                <?=$comment[3]?> 
            </p>
        </div>
        </div> 
    <?php }}else 
    echo "<i>Комментариев пока нет!</1>"; ?> 
    </div>
</body>
</html>