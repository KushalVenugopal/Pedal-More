<?php

    ini_set("display_errors", 1);
    error_reporting(E_ALL ^ E_NOTICE);

    function getPosts() {

        $query = MySQL::getInstance()->prepare("SELECT * FROM community");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);

    }

    function newPost($userName, $postTitle, $postBody) {

        $query = MySQL::getInstance()->prepare(
            "INSERT INTO community(userName, postTitle, postBody)
            VALUES (:userName, :postTitle, :postBody)
            "
        );

        $query->bindValue(':userName', $userName, PDO::PARAM_STR);
        $query->bindValue(':postTitle', $postTitle, PDO::PARAM_STR);
        $query->bindValue(':postBody', $postBody, PDO::PARAM_STR);

        $query->execute();

    }

    function getChallenge() {
        $randomChallenge = rand(1, 5);
        $selectStatement = "SELECT * FROM challenges WHERE id =" . $randomChallenge;

        $query = MySQL::getInstance()->prepare($selectStatement);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // function insertOrUpdatePromos($promoName, $phoneNumber, $offer1, $offer2, $offer3, $offer4, $latitude, $longitude, $link) {

    //     $query = MySQL::getInstance()->prepare(
    //         "INSERT INTO promotions (name, phoneNumber, offerA, offerB, offerC, offerD, latitude, longitude, link)
    //         VALUES (:promoName, :phoneNumber, :offer1, :offer2, :offer3, :offer4, :latitude, :longitude, :link)
    //         ON DUPLICATE KEY UPDATE
    //         phoneNumber=:phoneNumberUpdate, offerA=:offer1Update, offerB=:offer2Update, offerC=:offer3Update, offerD=:offer4Update, latitude=:latitudeUpdate, longitude=:longitudeUpdate, link=:linkUpdate
    //         "
    //     );
    //     $query->bindValue(':promoName', $promoName, PDO::PARAM_STR);
    //     $query->bindValue(':phoneNumber', $phoneNumber, PDO::PARAM_STR);
    //     $query->bindValue(':offer1', $offer1, PDO::PARAM_STR);
    //     $query->bindValue(':offer2', $offer2, PDO::PARAM_STR);
    //     $query->bindValue(':offer3', $offer3, PDO::PARAM_STR);
    //     $query->bindValue(':offer4', $offer4, PDO::PARAM_STR);
    //     $query->bindValue(':latitude', $latitude, PDO::PARAM_STR);
    //     $query->bindValue(':longitude', $longitude, PDO::PARAM_STR);
    //     $query->bindValue(':link', $link, PDO::PARAM_STR);

    //     $query->bindValue(':phoneNumberUpdate', $phoneNumber, PDO::PARAM_STR);
    //     $query->bindValue(':offer1Update', $offer1, PDO::PARAM_STR);
    //     $query->bindValue(':offer2Update', $offer2, PDO::PARAM_STR);
    //     $query->bindValue(':offer3Update', $offer3, PDO::PARAM_STR);
    //     $query->bindValue(':offer4Update', $offer4, PDO::PARAM_STR);
    //     $query->bindValue(':latitudeUpdate', $latitude, PDO::PARAM_STR);
    //     $query->bindValue(':longitudeUpdate', $longitude, PDO::PARAM_STR);
    //     $query->bindValue(':linkUpdate', $link, PDO::PARAM_STR);
    
    //     $query->execute();

    // }

?>