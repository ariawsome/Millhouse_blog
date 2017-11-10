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
        <form action="" method="POST" >
      
           <label for="title"> Title: </label>
          <input type="text" name="firstname" required>
          <br>
          <label for="image"> Image: </label>
          <input type="text" name="lastname" required>
          <br>
          <label for="info"> Information: </label>
          <input type="text" name="info" required>
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