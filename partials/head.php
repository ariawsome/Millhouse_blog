<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Roboto:300,400,500,700" rel="stylesheet">
    <link type="text/css" href="style.css" rel="stylesheet">
    <link type="text/php" href="footer.php" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
</head>

<body>
    <header class="w3-container w3-top w3-blue w3-medium">
        <a href="javascript:void(0)" class="w3-left w3-button w3-transparent w3-xxxlarge" onclick="w3_open()">☰</a>
        
        <a href="index.php"><div class="logo"><img src="image/jumbotron/millhouse-logo-white.svg" alt="logo"></div></a>
    </header>
    
    <div class="container">
        <nav class="w3-sidebar w3-bar-block w3-white w3-animate-left w3-text-grey w3-collapse w3-top w3-center" id="mySidebar">
            <br>
            <div class="logosidebar">
                <img src="image/jumbotron/millhouse-logo-white.svg">
                <a href="javascript:void(0)" class="w3-left w3-button w3-transparent w3-large" onclick="w3_close()"> <i class= "fa fa-times"></i></a>
            </div>   
            <div class="home-about">
                <a href="index.php"><i class="fa fa-home"></i>Home</a>
                <a href="about.php"><i class="fa fa-users"></i>About</a>  
            </div>
     
            <div class="categories">
                <h3>CATEGORIES</h3>
            </div>
            
            <form action="index.php" method="POST" class="menu_button">
                <button type="submit" name="Watches" class="btn btn-default">Watches</button>

                <button type="submit" name="Sunglasses" class="btn btn-default">Sunglasses</button>

                <button type="submit" name="Interior" class="btn btn-default">Interior</button>
            </form>
            
            <div class="menubar">
                <form action="partials/login.php" method="POST" class="menu_send">
                <?php 
                    if(isset($_SESSION["user"])){ ?>
                        <div class="linkprofile">
                            <h3><?= $_SESSION["user"]["firstname"] . " " . $_SESSION["user"]["lastname"] ?></h3>
                            <a href="user_profile.php">My profile</a><br>
                            <?php 
                                if(isset($_SESSION["user"]) && $_SESSION["user"]["admin"] == 1){ ?>
                                    <a href="create_post.php">Create post</a><br>
                            <?php } ?>
                            <a href="partials/logout.php">Logout</a>
                        </div>
                <?php 
                    }
                    else{ ?>
                        <div class="categories">
                            <h4>LOGIN</h4>
                        </div>
                        
                         <?php
                          if(isset($_GET["error"])){
                          echo "<p class='alert'>" .  $_GET["error"] . "</p>";
                         } ?>
                         
                        <input type="text" name="email" class="form-control registrationemail" placeholder="E-mail address">
                        <input type="password" name="password" class="form-control registrationpassword" placeholder="Password">
                        <input type="submit" class="btn btn-primary" value="Login">
                        
                        <div class="register">
                            <a href="register_user.php">Register</a>
                        </div>
                <?php } ?>
                </form>
            </div>
        </nav>
    </div>
  