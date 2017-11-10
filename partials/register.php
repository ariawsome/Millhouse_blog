<?php
    require 'database.php';

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $username = $_POST["username"];

    $statement = $pdo->prepare("
      INSERT INTO users (firstname, lastname, email, username, password)
      VALUES (:firstname, :lastname, :email, :username, :password)");

    $statement->execute(array(
      ":firstname" => $firstname,
      ":lastname" => $lastname,
      ":email" => $email,
      ":username" => $username,
      ":password" => $password
    )); 

    header("Location: /prodjektarbete/index.php");