<?php
// Fetch the comments the logged in user have created
$query = "SELECT comment.id, comment.content, comment.date, comment.user_id, comment.post_id 
          FROM comment 
          WHERE user_id = $session_id 
          ORDER BY comment.id DESC";

$statement = $pdo->prepare($query);  
$statement->execute();
$comment = $statement->fetchAll(PDO::FETCH_ASSOC);