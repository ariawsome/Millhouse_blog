<?php
$postid = $_GET["post_id"];
$query = "SELECT posts.id, posts.title,  posts.content, posts.category 
          FROM posts 
          WHERE posts.id = $postid";

$statement = $pdo->prepare($query);  
$statement->execute();
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);