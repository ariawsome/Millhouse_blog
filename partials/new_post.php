<?php
session_start();

require 'database.php';
    var_dump($_POST);
    
$filename = $_FILES["uploaded_file"]["name"];
$path = $_FILES["uploaded_file"]["tmp_name"];

if(move_uploaded_file($path, "../uploaded_images/" . $filename)){
    $statement = $pdo->prepare("
        INSERT INTO posts (title, user_id, image, content, category, date) VALUES (:title, :userid, :image, :content, :category, CURDATE()) 
    ");

    $statement->execute(array(
        ":title" => $_POST["title"],
        ":userid" => $_POST["userid"],
        ":image" => "uploaded_images/" . $filename,
        ":content" => $_POST["content"],
        ":category" => $_POST["category"]
    ));
}else{
    echo "fail!";
}