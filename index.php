<?php
    session_start();
    require 'partials/database.php';
    
    
   /* if(isset($_SESSION["user"])){
      echo "<h1 class='text-center'>" . 
              $_SESSION["user"]["email"] . 
            "</h1>";
    }
    if(isset($_GET["error"])){
      echo "<h1 class='alert alert-danger'>" . 
              $_GET["error"] . 
            "</h1>";
    }
    */

    require 'partials/head.php'; 
?>

    <main>
     
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

    foreach($posts as $post){ ?>    
        <article class="post">

            <h2><?= $post["title"];?></h2>

            <p>
               <?= $post["date"];?> | <?= $post["category"];
                if(isset($_SESSION["user"]) && $_SESSION["user"]["id"] == $post["user_id"]){ ?>
                    | <a href="edit_post.php?post_id=<?= $post["id"];?>">EDIT</a> | 
                    <a onclick="return confirm('Are you sure you want to delete?')" href="partials/delete.php?post_id=<?= $post["id"];?>">DELETE</a> 
                <?php } ?>
            </p>   

            <img src="<?= $post["image"];?>">

            <p><?= $post["content"];?></p> 

            <div class=userdetails> 
                <p>
                    <a href="mailto:<?= $post["email"]; ?>"><?= $post["firstname"]." ".$post["lastname"];?></a> | <a href="display_post.php?id=<?= $post["id"];?>" >COMMENTS (<?= $post["amount_of_comments"]; ?>)</a>
                </p>
            </div>

        </article>
   <?php   }  ?>
   </main>
    
<?php 
    require 'partials/footer.php';
?>
