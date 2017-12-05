<?php
    session_start();
    require 'partials/database.php';
    require 'partials/head.php';
?>

<main>
<?php   
    require 'partials/fetch_one_post.php';
    
    // Printing one blog post
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

            <img src="<?= $post["image"]; ?>" alt="<?= $post["image_alt"]; ?>">

            <p>
                <?= $post["content"];?>
            </p> 

            <p>
                <a href="mailto:<?= $post["email"]; ?>"><?= $post["firstname"]." ".$post["lastname"];?></a>
            </p>

        </article>
   <?php } // End of printing blog post?>
   
   <section class="comment_section">  
   
   <?php
       // This will only run if the user is logged in, otherwise it will print "Please login to comment!"
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
       
    require 'partials/fetch_comments.php';
    
    // Printing all comments to the recent blog post
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
   <?php } // End of printing all comments ?>
   
   </section>
</main>
    
<?php 
    require 'partials/footer.php';
?>