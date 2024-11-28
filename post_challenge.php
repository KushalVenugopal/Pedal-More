<?php

    ini_set("display_errors", 1);
    error_reporting(E_ALL ^ E_NOTICE);

    
 
    $userName = "Another human has taken this challenge.";
    $postTitle = $_COOKIE["challengeName"];
    $postBody = $_COOKIE["challengeDescription"];

    require_once "lib/private.php";
    require_once "lib/mysql.php";
    require_once "lib/queries.php";
    require_once "lib/util.php";
    newPost($userName, $postTitle, $postBody);

?>