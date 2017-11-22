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
    $query = "SELECT posts.id, posts.title, posts.date, posts.image, posts.content, posts.category, posts.user_id, users.firstname, users.lastname, users.email FROM posts INNER JOIN users ON posts.user_id = users.id WHERE posts.id = :postID";  
    $statement = $pdo->prepare($query);  
	$statement->execute(array(":postID" => $_GET["id"]));
	$posts = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach($posts as $post){ ?>    
    
    <article class="post">
    
   <h2><?php echo $post["title"];?></h2>
   
    <p><?php echo $post["date"];?> | <?php echo $post["category"];?></p>   
      
    <img src="<?php echo $post["image"];?>">
     
    <p><?php echo $post["content"];?></p> 
    
    <p> <?php echo $post["firstname"]." ".$post["lastname"];?> | <?php echo $post["email"]; ?></p>
    
    </article>
   <?php   }  ?>    
   <section class="comment_section">  
   
   <?php if(isset($_SESSION["user"])){ ?>
   <form action="partials/add_comment.php" method="post">
       
       <input type="hidden" name="userid" value="<?php echo $_SESSION["user"]["id"]; ?>">
       
       <input type="hidden" name="postid" value="<?php echo $_GET["id"]; ?>">
      
       <h2>Write a comment</h2>
       <label for="content">Comment</label>
       <br>
       <textarea name="comment" id="content" cols="30" rows="10" placeholder="Write a good comment!"></textarea>
       <br>
       <input type="submit" value="Send">
   </form>
   <h2>Comments</h2>
    <?php }
    else{
           echo "pls logg in to comment!";
    }
       
    $query = "SELECT comment.date, comment.content, comment.post_id, users.firstname, users.lastname, users.email FROM comment INNER JOIN users ON comment.user_id = users.id WHERE comment.post_id = :postID";  
    $statement = $pdo->prepare($query);  
	$statement->execute(array(":postID" => $_GET["id"]));
	$posts = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach($posts as $post){ ?>    
    
     
    <article class="comment-display" >
    <p> <?php echo $post["firstname"]." ".$post["lastname"];?> | <?php echo $post["email"]; ?></p>
    <p><?php echo $post["date"];?></p>
    <p><?php echo $post["content"];?></p>
    
    </article>
   <?php   }  ?>
   
   </section>
</div>
    
<?php 
    require 'partials/footer.php';
?>