<?php
session_start();
if(isset($_SESSION["user"]) && $_SESSION["user"]["admin"] == 1){
    require 'partials/database.php';
    require 'partials/head.php';
?>

    <main>
        <div class="create_post">
            <h1>Create Post</h1>

            <form action="partials/new_post.php" method="post" enctype="multipart/form-data">

                <input type="hidden" name="userid" value="<?= $_SESSION["user"]["id"]; ?>">
                <div class="space">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" required><br />

                    <label for="image">Image</label>
                    <input type="file" name="uploaded_file" id="image" class="file_image" required><br />
                    
                    <label for="alt">Alternative text for image</label>
                    <input type="text" name="alt" id="alt" required><br />

                    <label for="content">Add a description</label>
                    <textarea name="content" id="content" required></textarea><br />
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