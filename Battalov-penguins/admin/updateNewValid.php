<?php   
    include "../connect.php";    
 
    $id = isset($_POST['id']) ? $_POST['id'] : false;    
    $title = isset($_POST['Title']) ? $_POST['Title'] : false;    
    $text = isset($_POST['text']) ? $_POST['text'] : false;    
    $file = ($_FILES['image']['size'] != 0) ? $_FILES['image'] : false;    
    $category_id = isset($_POST['category']) ? $_POST['category'] : false;    
 
    function check_error($error, $id)    
    {    
        return "<script>alert('$error'); window.location.href = '/admin?new=$id';</script>";    
    }   
 
    $new_info = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM news WHERE news_id = $id"));  
 
    $query_update = "UPDATE news SET ";  
    $check_update = false;  
 
    if ($new_info["title"] != $title) {  
        $query_update .= "title = '$title', ";
        $check_update = true;  
    }  
    if ($new_info["content"] != $text) {  
        $query_update .= "content = '$text', ";  
        $check_update = true;  
    }  
    if ($new_info["category_id"] != $category_id) {  
        $query_update .= "category_id = '$category_id', ";  
        $check_update = true;  
    }  
    if ($file) {   
        $query_update .= "image = '" . $file["name"] . "', ";   
        move_uploaded_file($file["tmp_name"], "../images/news/" . $file["name"]);  
        $check_update = true;  
    } 
 
    if ($check_update) {  
        $query_update = substr($query_update, 0 , -2); 
        $query_update .= " WHERE news_id = $id"; 
 
        $result = mysqli_query($con, $query_update);  
        if ($result) {  
            echo check_error("Данные обновлены!", $id);  
        } else {  
            echo check_error("Ошибка обновления! " . mysqli_error($con), $id);  
        }  
    } else {  
        echo check_error("Данные актуальны!", $id);  
    } 
?>