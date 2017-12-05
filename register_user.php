<?php
    session_start();
    require 'partials/database.php';
    require 'partials/head.php';
    
?>
    <main>
        <div class="register_user">
            <h1>Register</h1>
            
            <form action="partials/register.php" method="POST" class="registerform">
                <label for="firstname"> Firstname: </label>
                <input type="text" name="firstname" id="firstname" required><br />
                
                <label for="lastname"> Lastname </label>
                <input type="text" name="lastname" id="lastname" required><br />
                
                <label for="email"> Email: </label>
                <input type="email" name="email" id="email" required><br />
                
                <label for="password"> Password </label>
                <input type="password" name="password" id="password" required><br />
                
                <input type="submit" class="btn btn-primary">
            </form>
        </div>
    </main>
    
<?php 
    require 'partials/footer.php';
?>