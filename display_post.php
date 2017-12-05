<?php
    session_start();
    require 'partials/database.php';

    require 'partials/head.php';
?>

<main>
<?php   
    $query = "SELECT posts.id, posts.title, posts.date, posts.image, posts.content, posts.category, posts.user_id, users.firstname, users.lastname, users.email 
              FROM posts 
              INNER JOIN users ON posts.user_id = users.id 
              WHERE posts.id = :postID";  
    $statement = $pdo->prepare($query);  
	$statement->execute(array(":postID" => $_GET["id"]));
	$posts = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($posts as $post){ ?>    
        <article class="post">

            <h2><?= $post["title"];?></h2>

            <p>
               <?= $post["date"];?> | <?= $post["category"];
                if(isset($_SESSION["user"]) && $_SESSION["user"]["id"] == $post["user_id"]){ ?>
                    | <a href="edit_post.php?post_id=<?= $post["id"];?>">EDIT</a> | 
                    <a onclick="return confirm('Are you sure you want to delete?')" href="partials/delete.php?post_id=<?= $post["id"];?>">DELETE</a> 
                <?php } ?>
            </p>  

            <img src="<?= $post["image"];?>">

            <p>
                <?= $post["content"];?>
            </p> 

            <p>
                <a href="mailto:<?= $post["email"]; ?>"><?= $post["firstname"]." ".$post["lastname"];?></a>
            </p>

        </article>
   <?php   }  ?>
   
   <section class="comment_section">  
   
   <?php 
       if(isset($_SESSION["user"])){ ?>
           <form action="partials/add_comment.php" method="post">
               <input type="hidden" name="userid" value="<?= $_SESSION["user"]["id"]; ?>">
               <input type="hidden" name="postid" value="<?= $_GET["id"]; ?>">
               
               <div class="headlines-comment">
                   <h2>Write a comment</h2>
               </div>
               
               <label for="content">Comment</label>
               <textarea name="comment" id="content" cols="30" rows="10" placeholder="Write a good comment!"></textarea>
               <br>
               
               <input type="submit" value="Send">
            </form>
            
        <div class="headlines-comment">
            <h2>Comments</h2>
        </div>
   
    <?php }
    else{
           echo "Please login to comment!";
    }
       
    $query = "SELECT comment.date, comment.content, comment.post_id, users.firstname, users.lastname, users.email 
              FROM comment 
              INNER JOIN users ON comment.user_id = users.id 
              WHERE comment.post_id = :postID";  
    $statement = $pdo->prepare($query);  
	$statement->execute(array(":postID" => $_GET["id"]));
	$posts = $statement->fetchAll(PDO::FETCH_ASSOC);
       
    foreach($posts as $post){ ?>    
        <article class="comment-display">
           
            <p class="name-email">
                <?= $post["firstname"]." ".$post["lastname"];?> | <?= $post["email"]; ?>
            </p>
            
            <p class="date">
                <?= $post["date"];?>
            </p>
            
            <p class="content">
                <?= $post["content"];?>
            </p>
            
            <hr>
            
        </article>
   <?php   }  ?>
   
   </section>
</main>
    
<?php 
    require 'partials/footer.php';
?>