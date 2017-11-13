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
        <form action="new_post.php" method="POST">
      
          <label for="title"> Title: </label>
          <input type="text" name="firstname" required>
          <input type="hidden" name="userid" value="<?php echo $_SESSION["id"]?>">
          <br>
          <label for="image"> Image: </label>
          <input type="file" name="image" required>
          <br>
          <label for="content"> Information: </label>
          <br>
          <textarea name="content" rows="10" cols="30">
          </textarea>
          <br>
          <select name="Category">
          <option value="sunglasses">Sunglasses</option>
          <option value="Watches">Watches</option>
          <option value="Interior">Interior</option>
          </select>
          <br>
          <input type="submit" class="btn btn-primary">
          
      </form>
    </div>
    
<?php 
    require 'partials/footer.php';
?>