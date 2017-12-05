<?php
// Count how many comments the logged in user have created
$query = "SELECT COUNT(user_id) AS amount_of_comments 
          FROM comment 
          WHERE user_id = $session_id";

$statement = $pdo->prepare($query);  
$statement->execute();
$display_comment_amount = $statement->fetchAll(PDO::FETCH_ASSOC);