<?php
session_start();

require 'database.php';

$password = $_POST["password"];
$email = $_POST["email"];

$statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
$statement->execute(array(
  ":email" => $email
));

$fetched_user = $statement->fetch(PDO::FETCH_ASSOC);

if( password_verify($password, $fetched_user["password"]) ){

  $_SESSION["user"] = $fetched_user;
  $_SESSION["loggedIn"] = true;

 header("Location: /prodjektarbete/index.php?success=true");
}
else {
  header("Location: /prodjektarbete/index.php?error=Wrong username or password&success=false");
  
}