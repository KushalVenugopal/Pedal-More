<?php

    ini_set("display_errors", 1);
    error_reporting(E_ALL ^ E_NOTICE);

    // echo "HI";
 
    $userName = $_POST['userName'];
    $postTitle = $_POST['postTitle'];
    $postBody = $_POST['postBody'];

    require_once "lib/private.php";
    require_once "lib/mysql.php";
    require_once "lib/queries.php";
    require_once "lib/util.php";
    newPost($userName, $postTitle, $postBody);

?>