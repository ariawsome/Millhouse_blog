<?php
session_start();

if(isset($_SESSION["user"]) && $_SESSION["user"]["admin"] == 1){
    require "database.php";
   $statement = $pdo->prepare('UPDATE posts 
                               SET title = :title, content = :content, category = :category, date = CURDATE() 
                               WHERE id = :id') ;
    $statement->execute(array(
        ':title' => $_POST["title"],
        ':content' => $_POST["content"],
        ':category' => $_POST["category"],
        ':id' => $_POST["id"]
    ));

    header("Location: /prodjektarbete/index.php");
}
else{
    header("Location: /prodjektarbete/index.php");    
}