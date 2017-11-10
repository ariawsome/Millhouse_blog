<?php
session_start();
session_destroy();

header("Location: /prodjektarbete/index.php");
?>