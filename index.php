<?php
    session_start();
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
    }
    */

    require 'partials/head.php'; 
?>

    <div class="main">
     
<?php
    if(isset($_POST['Watches'])){
    $query = "SELECT posts.id, posts.title, posts.date, posts.image, posts.content, posts.category, posts.user_id, users.firstname, users.lastname, users.email FROM posts INNER JOIN users ON posts.user_id = users.id WHERE posts.category='Watches' ORDER BY posts.id DESC";
    }
    elseif(isset($_POST['Sunglasses'])){
    $query = "SELECT posts.id, posts.title, posts.date, posts.image, posts.content, posts.category, posts.user_id, users.firstname, users.lastname, users.email FROM posts INNER JOIN users ON posts.user_id = users.id WHERE posts.category='Sunglasses' ORDER BY posts.id DESC";
    }    
    elseif(isset($_POST['Interior'])){
    $query = "SELECT posts.id, posts.title, posts.date, posts.image, posts.content, posts.category, posts.user_id, users.firstname, users.lastname, users.email FROM posts INNER JOIN users ON posts.user_id = users.id WHERE posts.category='Interior' ORDER BY posts.id DESC";
    }    
    else{  
    $query = "SELECT posts.id, posts.title, posts.date, posts.image, posts.content, posts.category, posts.user_id, users.firstname, users.lastname, users.email FROM posts INNER JOIN users ON posts.user_id = users.id ORDER BY posts.id DESC";
    }
    $statement = $pdo->prepare($query);  
	$statement->execute();
	$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

    foreach($posts as $post){ ?>    
    
    <article class="post">
    
   <h2><?php echo $post["title"];?></h2>
   
    <p><?php echo $post["date"];?> | 
     <?php echo $post["category"];?>
     <?php
     if(isset($_SESSION["user"]) && $_SESSION["user"]["id"] == $post["user_id"]){ ?>
      | <a href="edit_post.php?post_id=<?php echo $post["id"];?>">EDIT</a> | 
     <a href="partials/delete.php?post_id=<?php echo $post["id"];?>">DELETE</a> 
     <?php } ?>
     </p>   
     
    <img src="<?php echo $post["image"];?>">
     
    <p><?php echo $post["content"];?></p> 
   
 <div class=userdetails> 
    <p> <?php echo $post["firstname"]." ".$post["lastname"];?> | <?php echo $post["email"]; ?> | <a href="display_post.php?id=<?php echo $post["id"];?>" >Comments</a></p>
    </div>
    
    </article>
   <?php   }  ?>        
    </div>
    
<?php 
    require 'partials/footer.php';
?>
