<?php
//Fetching the one blog post that has the same id as the id that was sent in the get variable
$query = "SELECT posts.id, posts.title, posts.date, posts.image, posts.image_alt, posts.content, posts.category, posts.user_id, users.firstname, users.lastname, users.email 
          FROM posts 
          INNER JOIN users ON posts.user_id = users.id 
          WHERE posts.id = :postID";  
$statement = $pdo->prepare($query);  
$statement->execute(array(":postID" => $_GET["id"]));
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);