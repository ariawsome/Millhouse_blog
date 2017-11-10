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
}?>
   <a href="create_post.php">Create post</a>
    </div>
    
<?php 
    require 'partials/footer.php';
?>