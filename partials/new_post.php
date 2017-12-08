<?php
session_start();

require 'database.php';
    
$filename = $_FILES["uploaded_file"]["name"];
$path = $_FILES["uploaded_file"]["tmp_name"];

// Move the image to the folder uploaded_images and then insert the blog post to the database
if(move_uploaded_file($path, "../uploaded_images/" . $filename)){
    $statement = $pdo->prepare("
        INSERT INTO posts (title, user_id, image, image_alt, content, category, date) 
        VALUES (:title, :userid, :image, :image_alt, :content, :category, CURDATE()) 
    ");

    $statement->execute(array(
        ":title" => $_POST["title"],
        ":userid" => $_POST["userid"],
        ":image" => "uploaded_images/" . $filename,
        ":image_alt" => $_POST["alt"],
        ":content" => $_POST["content"],
        ":category" => $_POST["category"]
    ));
    header("Location: /prodjektarbete/index.php");
}
else{
    echo "Something went wrong! Try again!";
}