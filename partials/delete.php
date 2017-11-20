<?php
session_start();
require "database.php";
    $id = $_GET["post_id"];
   $statement = $pdo->prepare("DELETE FROM posts
   WHERE id = $id") ;
    $statement->execute();

header("Location: /prodjektarbete/index.php");
