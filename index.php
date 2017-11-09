<?php
    session_start();
    require 'partials/head.php';
    require 'partials/database.php';

    if(isset($_SESSION["user"])){
      echo "<h1 class='text-center'>" . 
              $_SESSION["user"]["username"] . 
            "</h1>";
    }
    if(isset($_GET["error"])){
      echo "<h1 class='alert alert-danger'>" . 
              $_GET["error"] . 
            "</h1>";
    }

?>

    <div class="container">
    <div class="jumbotron">     
    </div>
    <div class="nav">
    <h4>Login</h4>
      <form action="partials/login.php" method="POST">
         
         
          <label for="username"> Username </label>

          <input type="text" name="username" class="form-control">
        
          <label for="password"> Password </label>

          <input type="password" name="password" class="form-control">

          <input type="submit" class="btn btn-primary">
          
        <a href="register_user.php">register</a>
  </form>
    </div>
    </div>
<?php 
    require 'partials/footer.php';
?>