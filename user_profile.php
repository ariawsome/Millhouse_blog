<?php
    session_start();
    require 'partials/database.php';
    
    
    if(isset($_SESSION["user"])){
      echo "<h1 class='text-center'>" . 
              $_SESSION["user"]["email"] . 
            "</h1>";
    }
    if(isset($_GET["error"])){
      echo "<h1 class='alert alert-danger'>" . 
              $_GET["error"] . 
            "</h1>";
    }

    require 'partials/head.php';
?>

    <div class="main">
        <?php
        
    
            if(isset($_SESSION["user"])){
                echo "<h1 class='text-center'>" . 
                    "Welcome ".$_SESSION["user"]["firstname"]." to you profile"."</h1>";
                
                $session_id = $_SESSION["user"]["id"];
                
                
                $query = "SELECT COUNT(user_id) AS amount_of_posts FROM posts WHERE user_id = $session_id";
        
                $statement = $pdo->prepare($query);  
                $statement->execute();
                $display_posts_amount = $statement->fetchAll(PDO::FETCH_ASSOC); ?>

                <p>Total amount of posts: <?php echo $display_posts_amount[0]['amount_of_posts'];?></p>



                <?php $query = "SELECT COUNT(user_id) AS amount_of_comments FROM comment WHERE user_id = $session_id";

                $statement = $pdo->prepare($query);  
                $statement->execute();
                $display_comment_amount = $statement->fetchAll(PDO::FETCH_ASSOC); ?>

        <p>Total amount of comments: <?php echo $display_comment_amount[0]['amount_of_comments'];?></p><?php 
                
                
                $query = "SELECT posts.id, posts.title, posts.date, posts.category, posts.user_id FROM posts WHERE user_id = $session_id ORDER BY posts.id DESC";

                $statement = $pdo->prepare($query);  
                $statement->execute();
                $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
                
                for($i=0; $i<5; $i++){
                    if(isset($posts[$i])){ ?>
                        <a href="display_post.php?id=<?php echo $posts[$i]["id"] ?>" style="background:white; display:block; width:200px; color:black;">
                            <h2><?php echo $posts[$i]["title"]; ?></h2>
                            <p><?php echo $posts[$i]["date"]; ?> | <?php echo $posts[$i]["category"]; ?></p>
                        </a>
                   <?php }
                }
            }
        
           $query = "SELECT comment.id, comment.content, comment.date, comment.user_id, comment.post_id FROM comment WHERE user_id = $session_id ORDER BY comment.id DESC";
        
            $statement = $pdo->prepare($query);  
            $statement->execute();
            $comment = $statement->fetchAll(PDO::FETCH_ASSOC); 

            for($i=0; $i<5; $i++){
                if(isset($comment[$i])){ ?>
                    <a href="display_post.php?id=<?php echo $comment[$i]["post_id"] ?>" style="background:white; display:block; width:200px; color:black;">
                        <p><?php echo $comment[$i]["content"]; ?></p>
                        <p><?php echo $comment[$i]["date"]; ?></p>
                    </a>
               <?php }
            }
        
        
        ?>
            
       <a href="create_post.php">Create post</a>
    </div>

    
<?php 
    require 'partials/footer.php';
?>