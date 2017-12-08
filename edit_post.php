<?php
session_start();
if(isset($_SESSION["user"]) && $_SESSION["user"]["admin"] == 1){
    require 'partials/database.php';
    require 'partials/head.php';
    require 'partials/fetch_post_for_edit.php';
?>

    <main>
        <div class="create_post">
            <h1>Edit Post</h1>
             
            <form action="partials/edit.php" method="post" enctype="multipart/form-data">
                <div class="space">
                    <input type="hidden" name="id" value="<?= $postid; ?>">
                    
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" value="<?= $posts[0]["title"]; ?>" required><br />
                    
                    <label for="content">Content</label>
                    <textarea name="content" id="content" required><?= $posts[0]["content"]; ?></textarea><br />
                </div>
                
                <b>Category Selection</b><br />
                <div>
                    <input type="radio" name="category" id="watches" value="Watches" required>
                    <label for="watches">Watches</label>
                </div>
                <div>
                    <input type="radio" name="category" value="Sunglasses" id="sunglasses">
                    <label for="sunglasses">Sunglasses</label>
                </div>
                <div>
                    <input type="radio" name="category" id="design" value="Interior">
                    <label for="design">Interior design</label>
                </div>
                
                <input type="submit" value="Send">
            </form>
        </div>
   </main>
    
<?php 
    require 'partials/footer.php';
}
else{
    header("Location: /prodjektarbete/index.php");
}
?>