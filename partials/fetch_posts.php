<?php
if(isset($_POST['Watches'])){
    $query = "SELECT COUNT(comment.post_id) AS amount_of_comments, posts.id, posts.title, posts.date, posts.image, posts.content, posts.category, posts.user_id, users.firstname, users.lastname, users.email 
              FROM posts 
              INNER JOIN users ON posts.user_id = users.id 
              LEFT JOIN comment ON posts.id = comment.post_id 
              WHERE posts.category='Watches' 
              GROUP BY posts.id ORDER BY posts.id DESC";
    }
elseif(isset($_POST['Sunglasses'])){
    $query = "SELECT COUNT(comment.post_id) AS amount_of_comments, posts.id, posts.title, posts.date, posts.image, posts.content, posts.category, posts.user_id, users.firstname, users.lastname, users.email 
              FROM posts 
              INNER JOIN users ON posts.user_id = users.id 
              LEFT JOIN comment ON posts.id = comment.post_id 
              WHERE posts.category='Sunglasses' 
              GROUP BY posts.id 
              ORDER BY posts.id DESC";
}    
elseif(isset($_POST['Interior'])){
    $query = "SELECT COUNT(comment.post_id) AS amount_of_comments, posts.id, posts.title, posts.date, posts.image, posts.content, posts.category, posts.user_id, users.firstname, users.lastname, users.email 
              FROM posts 
              INNER JOIN users ON posts.user_id = users.id 
              LEFT JOIN comment ON posts.id = comment.post_id 
              WHERE posts.category='Interior' 
              GROUP BY posts.id 
              ORDER BY posts.id DESC";
}    
else{  
    $query = "SELECT COUNT(comment.post_id) AS amount_of_comments, posts.id, posts.title, posts.date, posts.image, posts.content, posts.category, posts.user_id, users.firstname, users.lastname, users.email 
              FROM posts 
              INNER JOIN users ON posts.user_id = users.id 
              LEFT JOIN comment ON posts.id = comment.post_id 
              GROUP BY posts.id 
              ORDER BY posts.id DESC";
}
$statement = $pdo->prepare($query);  
$statement->execute();
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);