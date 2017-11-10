<?php
    session_start();
    require 'partials/database.php';
    require 'partials/head.php';
    
?>


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
          <label for="password"> Password </label>
          <input type="password" name="password" required>
          <br>
          <input type="submit" class="btn btn-primary">
          
      </form>
    </div>
    
<?php 
    require 'partials/footer.php';
?>