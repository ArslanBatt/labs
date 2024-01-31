<?php
    // $Title = $_POST['Title'];
    // $newsText = $_POST['text'];
    // $Category = $_POST['category'];

    // $errors = [];

    // if (empty($Title)  empty($newsText)  empty($Category)) {
    //     $errors[] = "Ошибка: Заполните все поля.";
    // }

    // if (strlen($Title) > 20) {
    //     $errors[] = "Ошибка: Название новости не должно превышать 20 символов.";
    // }

    // if (!is_string($Title)) {
    //     $errors[] = "Ошибка: Название новости должно быть строкой.";
    // }

    // if (!is_string($newsText)) {
    //     $errors[] = "Ошибка: Текст новости должен быть строкой.";
    // }

    // if (!is_string($Category)) {
    //     $errors[] = "Ошибка: Категория новости должна быть строкой.";
    // }

    // $newsImg = $_FILES['image'];

    //     if (empty($newsImg)) {
    //         $errors[] = "Ошибка: Загрузите изображение.";
    //     } else {
    //         $destination = "images/" . $newsImg['name'];
    //         $filename = $newsImg["tmp_name"];

    //         // Проверяем тип файла
    //         $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];
    //         $fileType = $newsImg['type'];

    //         if (!in_array($fileType, $allowedTypes)) {
    //             $errors[] = "Неподдерживаемый тип файла. Пожалуйста, загрузите изображение в формате JPEG или PNG.";
    //         }

    //         $check_upload = move_uploaded_file($filename, $destination);

    //         if (!$check_upload) {
    //             $errors[] = "Ошибка: Вы не загрузили изображение";
    //         }
    //     }

    //     if (!empty($errors)) {
    //         foreach ($errors as $error) {
    //             echo $error . "<br>";
    //         }
    //         exit;
    //     }

    //     echo "Изображение успешно загружена.";






    // это проверка


    include "connect.php";


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
            move_uploaded_file($file["tmp_name"], "images/news/$file_name");
            echo check_error("Новость успешно создана!");
        }
        else check_error("Произошла ошибка!:" . mysqli_error($con));
    }
    else{
        echo check_error("Все поля должны быть заполнены!");
    };




    // require "connect.php";

    // $img = $_FILES['image']['name'];
    // $title = $_POST['Title'];
    // $content = $_POST['text'];


    // $query = "INSERT INTO News (image, Title, content) VALUES (, $img, $title, $content)";

    // $result = mysqli_query($con, $query);

    // if ($result) {
    //     echo "Запись успешно добавлена в таблицу БД.";
    // } else {
    //     echo "Произошла ошибка при добавлении записи в таблицу БД.";
    // }

    ?>