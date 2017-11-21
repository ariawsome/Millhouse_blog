<?php
session_start();
if(isset($_SESSION["user"]) && $_SESSION["user"]["admin"] == 1){
require "database.php";
    $id = $_GET["post_id"];
   $statement = $pdo->prepare("DELETE FROM posts
   WHERE id = $id") ;
    $statement->execute();

header("Location: /prodjektarbete/index.php");
}
{
header("Location: /prodjektarbete/index.php");
}