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
        ?>
       <a href="create_post.php">Create post</a>
    </div>
    
<?php 
    require 'partials/footer.php';
?>