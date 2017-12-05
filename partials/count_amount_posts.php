<?php
// Count how many posts the logged in user have created
$query = "SELECT COUNT(user_id) AS amount_of_posts 
          FROM posts 
          WHERE user_id = $session_id";

$statement = $pdo->prepare($query);  
$statement->execute();
$display_posts_amount = $statement->fetchAll(PDO::FETCH_ASSOC);