<?php
    session_start();
    if(isset($_SESSION["user"]) && $_SESSION["user"]["admin"] == 1){
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
        $postid = $_GET["post_id"];
      $query = "SELECT posts.id, posts.title,  posts.content, posts.category FROM posts WHERE posts.id = $postid";

      $statement = $pdo->prepare($query);  
	  $statement->execute();
      $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
    ?>
       <form action="partials/edit.php" method="post" enctype="multipart/form-data">
          
           <input type="hidden" name="id" value="<?php echo $postid; ?>">
           
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="<?php echo $posts[0]["title"]; ?>" required><br />
            
            <label for="content">Content</label>
            <textarea name="content" id="content" required><?php echo $posts[0]["content"]; ?></textarea><br />
            
            <label for="watches">Watches</label>
            <input type="radio" name="category" id="watches" value="Watches" required>
            <br />
            
            <label for="sunglasses">Sunglasses</label>
            <input type="radio" name="category" value="Sunglasses" id="sunglasses">
            <br />
            

            <label for="design">Interior design</label>
            <input type="radio" name="category" id="design" value="Interior"><br /><br />

            
            <input type="submit" value="Send">
        </form>
   </div>
    
<?php 
    require 'partials/footer.php';
    }
else{
header("Location: /prodjektarbete/index.php");
}?>