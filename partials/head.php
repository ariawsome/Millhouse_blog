<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link type="text/css" href="style.css" rel="stylesheet">
</head>
<body>
    <div class="container">
    <div class="jumbotron">     
    </div>
    <div class="nav">
    <a href="index.php">Home </a><a href="about.php"> About</a>
    
    <h3>categories</h3>
     <form action="index.php" method="POST">
       <button type="submit" name="watches" class="btn btn-default">Watches</button>
      
       <button type="submit" name="Sunglasses" class="btn btn-default">Sunglasses</button>
       
       <button type="submit" name="interior" class="btn btn-default">Interior</button>
        
    </form>
     
      <form action="partials/login.php" method="POST">
       
        <?php if(isset($_SESSION["user"])){ ?>
            <a href="user_profile.php">My profile</a>
            <br>
            <a href="create_post.php">Create post</a>
            <br>
            <a href="partials/logout.php">logout</a>
            <?php } 
            
         else{ ?>
         <h4>Login</h4>
          <label for="email"> Email </label>

          <input type="text" name="email" class="form-control">
          <br>
          <label for="password"> Password </label>

          <input type="password" name="password" class="form-control">
          <br>
          <input type="submit" class="btn btn-primary">
           <br>
            <a href="register_user.php">Register</a>
            <br>
            <?php } ?>
            
      </form>
    </div>