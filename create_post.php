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
       <form action="partials/new_post.php" method="post" enctype="multipart/form-data">
           <input type="hidden" name="userid" value="<?php echo $_SESSION["user"]["id"]; ?>">
            <label for="title">Title</label><input type="text" name="title" id="title"><br />
            <label for="image">Image</label><input type="file" name="uploaded_file" id="image"><br />
            <label for="content">Content</label><textarea name="content" id="content"></textarea><br />
            <label for="watches">Watches</label><input type="radio" name="category" id="watches" value="watches"><br />
            <label for="sunglasses">Sunglasses</label><input type="radio" name="category" value="sunglasses" id="sunglasses"><br />
            <label for="design">Interior design</label><input type="radio" name="category" id="design" value="design"><br /><br />
            <input type="submit" value="Send">
        </form>
    </div>
    
<?php 
    require 'partials/footer.php';
?>