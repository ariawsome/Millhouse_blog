<?php
    session_start();
    require 'partials/database.php';
    require 'partials/head.php'; 
    require 'partials/fetch_posts.php';
?>

    <main> 
        <?php
        // Print all blog posts
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

                <p><?= $post["content"];?></p> 

                <div class="userdetails"> 
                    <p>
                        <a href="mailto:<?= $post["email"]; ?>"><?= $post["firstname"]." ".$post["lastname"];?></a> | <a href="display_post.php?id=<?= $post["id"];?>" >COMMENTS (<?= $post["amount_of_comments"]; ?>)</a>
                    </p>
                </div>
            </article>
       <?php } // End printing blog posts ?>
   </main>
    
<?php 
    require 'partials/footer.php';
?>
