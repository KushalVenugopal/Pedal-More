<?php

    require_once "lib/private.php";
    require_once "lib/mysql.php";
    require_once "lib/queries.php";
    require_once "lib/util.php";

    $userPosts = getPosts();

    foreach (array_reverse($userPosts) as $recordKey => $post) {
        $postedName = $post['userName'];
        $postedTitle = $post['postTitle'];
        $postedBody = $post['postBody'];

        if ($postedName == null) {
            $postedName = "Anonymous";
        }
        
        if ($postedTitle == null) {
            $postedTitle = "*no title*";
        }

        if ($postedBody == null) {
            $postedBody = "*no body*";
        }

        echo "<section id='each-post'>
                <h1>" . $postedName . "</h1> <br>
                <h2>" . $postedTitle . "</h2> <br>
                <p>" . $postedBody . "</p>
            </section>";

    }

?>