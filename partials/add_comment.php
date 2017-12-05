<?php
session_start();

require 'database.php';
    
$postid = $_POST["postid"];

$statement = $pdo->prepare("
    INSERT INTO comment (user_id, post_id, content, date) 
    VALUES (:userid, :postid, :content, CURDATE()) 
");

$statement->execute(array(
    ":userid" => $_POST["userid"],
    ":postid" => $postid,
    ":content" => $_POST["comment"]
));

header("Location: /prodjektarbete/display_post.php?id=".$postid);
