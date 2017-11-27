<?php
    session_start();
    if(isset($_SESSION["user"]) && $_SESSION["user"]["admin"] == 1){
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
    } */

    require 'partials/head.php';
?>

    <div class="main">
       <div class="create_post">
           <H1>Create Post</H1>
           
       <form action="partials/new_post.php" method="post" enctype="multipart/form-data">
          
           <input type="hidden" name="userid" value="<?php echo $_SESSION["user"]["id"]; ?>">
         <div class="space">
            <label for="title"><b>Title</b></label> <br />
            <input type="text" name="title" id="title" required><br />
            
            <label for="image"><b>Image</b></label> <br />
            <input type="file" name="uploaded_file" id="image" class="file_image" required><br />
            
            <label for="content"><b>Add a description</b></label><br />
            <textarea name="content" id="content" required></textarea><br />
           </div>
    
            <b>Category Selection</b><br />
        
            <input type="radio" name="category" id="watches" value="Watches" required>
            <label for="watches">Watches</label>
           
            <br />
            <input type="radio" name="category" value="Sunglasses" id="sunglasses">
            <label for="sunglasses">Sunglasses</label>
            <br />
            
            <input type="radio" name="category" id="design" value="Interior">
            <label for="design">Interior design</label> 
      
            <br />
            <input type="submit" value="Send">
        </form>
        </div>
    </div>

<?php 
    require 'partials/footer.php';
    }
else{
header("Location: /prodjektarbete/index.php");
}?>