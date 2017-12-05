<?php
$query = "SELECT comment.date, comment.content, comment.post_id, users.firstname, users.lastname, users.email 
          FROM comment 
          INNER JOIN users ON comment.user_id = users.id 
          WHERE comment.post_id = :postID";  
$statement = $pdo->prepare($query);  
$statement->execute(array(":postID" => $_GET["id"]));
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);