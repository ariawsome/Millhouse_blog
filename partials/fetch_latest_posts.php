<?php
// Fetch the blog posts the logged in user have created
$query = "SELECT posts.id, posts.title, posts.date, posts.category, posts.user_id 
          FROM posts 
          WHERE user_id = $session_id 
          ORDER BY posts.id DESC";

$statement = $pdo->prepare($query);  
$statement->execute();
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);