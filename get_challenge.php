<?php

    require_once "lib/private.php";
    require_once "lib/mysql.php";
    require_once "lib/queries.php";
    require_once "lib/util.php";

    $challenge = getChallenge();

    foreach ($challenge as $recordKey => $challenge) {

        $challengeName = $challenge['challengeName'];
        $challengeDescription = $challenge['challengeDescription'];

        $fromLatitude = $challenge['fromLatitude'];
        $fromLongitude = $challenge['fromLongitude'];

        $toLatitude = $challenge['toLatitude'];
        $toLongitude = $challenge['toLongitude'];

        echo "<section class='each-challenge'>
                <h1>" . $challengeName . "</h1> <br>
                <h2>" . $challengeDescription . "</h2>

                <p id='from-lat'>$fromLatitude</p>
                <p id='from-lng'>$fromLongitude</p>
                <p id='to-lat'>$toLatitude</p>
                <p id='to-lng'>$toLongitude</p>
                
            </section>";

        setcookie("challengeName", $challengeName, time() + 86400, "/");
        setcookie("challengeDescription", $challengeDescription, time() + 86400, "/");
    }

?>