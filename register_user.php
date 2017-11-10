<?php
    session_start();
    require 'partials/head.php';
    require 'partials/database.php';
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
        
      </form>
    </div>
    <div class="main">
        <h4>Register</h4>
      <form action="partials/register.php" method="POST" class="registerform">
      
           <label for="firstname"> Firstname: </label>
          <input type="text" name="firstname" required>
          <br>
          <label for="lastname"> Lastname </label>
          <input type="text" name="lastname" required>
          <br>
          <label for="email"> Email: </label>
          <input type="email" name="email" required>
          <br>
          <label for="username"> Username </label>
          <input type="text" name="username" required>
          <br>
          <label for="password"> Password </label>
          <input type="password" name="password" required>
          <br>
          <input type="submit" class="btn btn-primary">
          
      </form>
    </div>
    </div>
<?php 
    require 'partials/footer.php';
?>