<?php
    require 'database.php';

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $statement = $pdo->prepare("
      INSERT INTO users (firstname, lastname, email, password)
      VALUES (:firstname, :lastname, :email, :password)");

    $statement->execute(array(
      ":firstname" => $firstname,
      ":lastname" => $lastname,
      ":email" => $email,
      ":password" => $password
    )); 

    header("Location: /prodjektarbete/index.php");