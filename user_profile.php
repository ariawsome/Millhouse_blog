<?php
session_start();
if(isset($_SESSION["user"])){
    require 'partials/database.php';
    
    
//    if(isset($_SESSION["user"])){
//      echo "<h1 class='text-center'>" . 
//              $_SESSION["user"]["email"] . 
//            "</h1>";
//    }
//    if(isset($_GET["error"])){
//      echo "<h1 class='alert alert-danger'>" . 
//              $_GET["error"] . 
//            "</h1>";
//    }

    require 'partials/head.php';
?>

    <div class="main" style="margin-bottom:30px;">
        <h1><?= $_SESSION["user"]["firstname"] . " " . $_SESSION["user"]["lastname"] ?></h1>

    <?php
        $session_id = $_SESSION["user"]["id"];

        if(isset($_SESSION["user"]) && $_SESSION["user"]["admin"] == 1){
            // Count how many posts the logged in user have created
            $query = "SELECT COUNT(user_id) AS amount_of_posts 
                      FROM posts 
                      WHERE user_id = $session_id";

            $statement = $pdo->prepare($query);  
            $statement->execute();
            $display_posts_amount = $statement->fetchAll(PDO::FETCH_ASSOC); 
    ?>
            <p>Total amount of posts: <?= $display_posts_amount[0]['amount_of_posts'];?></p>
    <?php
        }

        // Count how many comments the logged in user have created
        $query = "SELECT COUNT(user_id) AS amount_of_comments 
                  FROM comment 
                  WHERE user_id = $session_id";

        $statement = $pdo->prepare($query);  
        $statement->execute();
        $display_comment_amount = $statement->fetchAll(PDO::FETCH_ASSOC);
    ?>
        <p>Total amount of comments: <?= $display_comment_amount[0]['amount_of_comments'] ;?></p>
        
        <hr style="border: 0; height: 1px; background-image: -webkit-linear-gradient(left, #d2cfd0, #8c8b8b, #d2cfd0); background-image: -moz-linear-gradient(left, #d2cfd0, #8c8b8b, #d2cfd0); background-image: -ms-linear-gradient(left, #d2cfd0, #8c8b8b, #d2cfd0); background-image: -o-linear-gradient(left, #d2cfd0, #8c8b8b, #d2cfd0);" />
        
        <!--div class="w3-row"-->
        
    <?php
        if(isset($_SESSION["user"]) && $_SESSION["user"]["admin"] == 1){
    ?>
            <div style="float: left; display: flex; flex-direction: column; margin-right: 60px; margin-bottom:30px;">
            <!--div class="w3-half"-->
            <h2>My latest blog posts</h2>
    <?php
            // Print the five latest posts the logged in user have created
            $query = "SELECT posts.id, posts.title, posts.date, posts.category, posts.user_id 
                      FROM posts 
                      WHERE user_id = $session_id 
                      ORDER BY posts.id DESC";

            $statement = $pdo->prepare($query);  
            $statement->execute();
            $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            for($i=0; $i<5; $i++){
                if(isset($posts[$i])){ ?>
                    <a href="display_post.php?id=<?= $posts[$i]["id"] ?>" style="background:white; display:block; width:300px; color:black; margin-bottom: 20px; padding: 10px;">
                        <h3 style="margin:0;"><?= $posts[$i]["title"]; ?></h3>
                        <p style="margin:0; font-size:0.7em;"><?= $posts[$i]["date"]; ?> | <?= $posts[$i]["category"]; ?></p>
                    </a>
    <?php      }
            }
    ?>
            </div>
    <?php } ?>
    
        
        <div style="float: left; display: flex; flex-direction: column; margin-bottom:30px;">
           <!--div class="w3-half"-->
            <h2>My latest comments</h2>
    <?php
        // Print the five latest comments the logged in user have created
        $query = "SELECT comment.id, comment.content, comment.date, comment.user_id, comment.post_id 
                  FROM comment 
                  WHERE user_id = $session_id 
                  ORDER BY comment.id DESC";

        $statement = $pdo->prepare($query);  
        $statement->execute();
        $comment = $statement->fetchAll(PDO::FETCH_ASSOC); 

        for($i=0; $i<5; $i++){
            if(isset($comment[$i])){ 
     ?>
                <a href="display_post.php?id=<?= $comment[$i]["post_id"] ?>" style="background:white; display:block; width:300px; color:black; margin-bottom: 20px; padding: 10px;">
                    <p style="margin:0; font-size:0.8em;"><?= $comment[$i]["content"]; ?></p>
                    <p style="margin:0; font-size:0.7em;"><?= $comment[$i]["date"]; ?></p>
                </a>
     <?php  }
        }
     ?>
        </div>
        <div style="clear:both;"></div>
    <?php
        if(isset($_SESSION["user"]) && $_SESSION["user"]["admin"] == 1){
     ?>
           <a href="create_post.php" style="background: white; padding: 4px 6px 7px 6px; font-size: 0.9em; color: black; border-radius: 5px;">Create post</a>
     <?php } ?>
        <!--/div-->
</div>

<?php 
    require 'partials/footer.php';
}
else{
    header("Location: /prodjektarbete/index.php");
}?>