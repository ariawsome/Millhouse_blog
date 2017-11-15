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
     
<?php
    if(isset($_POST['Watches'])){
    $query = "SELECT posts.id, posts.title, posts.date, posts.image, posts.content, posts.category, posts.user_id, users.firstname, users.lastname, users.email FROM posts INNER JOIN users ON posts.user_id = users.id WHERE posts.category='watches' ORDER BY posts.id DESC";
    }
    elseif(isset($_POST['Sunglasses'])){
    $query = "SELECT posts.id, posts.title, posts.date, posts.image, posts.content, posts.category, posts.user_id, users.firstname, users.lastname, users.email FROM posts INNER JOIN users ON posts.user_id = users.id WHERE posts.category='sunglasses' ORDER BY posts.id DESC";
    }    
    elseif(isset($_POST['Interior'])){
    $query = "SELECT posts.id, posts.title, posts.date, posts.image, posts.content, posts.category, posts.user_id, users.firstname, users.lastname, users.email FROM posts INNER JOIN users ON posts.user_id = users.id WHERE posts.category='interior' ORDER BY posts.id DESC";
    }    
    else{  
    $query = "SELECT posts.id, posts.title, posts.date, posts.image, posts.content, posts.category, posts.user_id, users.firstname, users.lastname, users.email FROM posts INNER JOIN users ON posts.user_id = users.id ORDER BY posts.id DESC";
    }
    $statement = $pdo->prepare($query);  
	$statement->execute();
	$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

    foreach($posts as $post){ ?>    
    
    <article class="post" style="background-color:white; width:600px; margin-left: 50px;">
    
   <h2><?php echo $post["title"];?></h2>
   
    <p><?php echo $post["date"];?> | <?php echo $post["category"];?></p>   
      
    <img src="<?php echo $post["image"];?>" style="width:400px; height:auto;">
     
    <p><?php echo $post["content"];?></p> 
    
    <p> <?php echo $post["firstname"]." ".$post["lastname"];?> | <?php echo $post["email"]; ?> | <a href="display_post.php?id=<?php echo $post["id"];?>" style="color: blue;">Comments</a></p>
    
    </article>
   <?php   }  ?>        
    </div>
    
<?php 
    require 'partials/footer.php';
?>