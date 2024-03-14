<?php
    // это проверка


    include "../connect.php";

    $title = isset($_POST['Title'])?$_POST['Title']:false;
    $text = isset($_POST['text'])?$_POST['text']:false;
    $file = isset($_FILES['image']['tmp_name'])?$_FILES['image']:false;
    $category_id = isset($_POST['category'])?$_POST['category']:false;
    function check_error($error)
    {
        return "<script> alert('$error');
        location.href = '/admin';
        </script>";
    }

    if($title and $text and $file and $category_id){
        if(strlen($title) > 50) 
        echo check_error("Название не должно превышать 50 символов!");
    else{
        $file_name = $file["name"];
        $result = mysqli_query($con,"INSERT INTO news (title, `content`, `image`, category_id) VALUES ('$title', '$text', '$file_name', $category_id)");
    
    
    }
        if($result){
            move_uploaded_file($file["tmp_name"], "../images/news/$file_name");
            echo check_error("Новость успешно создана!");
        }
        else check_error("Произошла ошибка!:" . mysqli_error($con));
    }
    else{
        echo check_error("Все поля должны быть заполнены!");
    };

    ?>