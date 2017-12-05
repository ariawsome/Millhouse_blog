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

    <main>
       <div class="user_profile">
        <h1><?= $_SESSION["user"]["firstname"] . " " . $_SESSION["user"]["lastname"] ?></h1>
        <p><?= $_SESSION["user"]["email"] ?></p>

        <?php
        $session_id = $_SESSION["user"]["id"]; ?>
        
        <p>
           <?php 
            if(isset($_SESSION["user"]) && $_SESSION["user"]["admin"] == 1){
                require 'partials/count_amount_posts.php'; ?>
                Total amount of blog posts: <?= $display_posts_amount[0]['amount_of_posts'];?><br />
    <?php }

            require 'partials/count_amount_comments.php'; ?>
            Total amount of comments: <?= $display_comment_amount[0]['amount_of_comments'] ;?>
        </p>
        
    <?php
        if(isset($_SESSION["user"]) && $_SESSION["user"]["admin"] == 1){ ?>
            <div class="w3-half">
            <h2>My latest blog posts</h2>
            <?php
            require 'partials/fetch_latest_posts.php';
            
            // Print the five latest blog posts
            for($i=0; $i<5; $i++){
                if(isset($posts[$i])){ ?>
                    <a href="display_post.php?id=<?= $posts[$i]["id"] ?>">
                        <?= $posts[$i]["date"]; ?> | <?= $posts[$i]["title"]; ?>
                    </a><br />
        <?php }
            } ?>
            </div>
    <?php } ?>
    
        
        <div class="w3-half">
            <h2>My latest comments</h2>
            <?php
            require 'partials/fetch_latest_comments.php'; 
            
            // Print the five latest comments
            for($i=0; $i<5; $i++){
                if(isset($comment[$i])){ ?>
                    <a href="display_post.php?id=<?= $comment[$i]["post_id"] ?>">
                        <?= $comment[$i]["date"]; ?> | <?= $comment[$i]["content"]; ?>
                    </a><br />
         <?php }
            } ?>
        </div>
        <div class="clear"></div>
        
        <?php
        if(isset($_SESSION["user"]) && $_SESSION["user"]["admin"] == 1){ ?>
           <a class="create_post_btn" href="create_post.php">Create post</a>
    <?php } ?>
    
    </div>
</main>

<?php 
    require 'partials/footer.php';
}
else{
    header("Location: /prodjektarbete/index.php");
}?>