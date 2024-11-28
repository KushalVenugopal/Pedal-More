<?php

    function getPromos() {

        $records = "";

        // PHP errors are hidden by default, but we can turn them on
        ini_set("display_errors", 1);
        error_reporting(E_ALL ^ E_NOTICE);
        
        $promo_url = "https://www.data.brisbane.qld.gov.au/data/api/3/action/datastore_search?resource_id=85b106be-fa91-454f-819e-fbd6caf55585";
        
        $promo_data = file_get_contents($promo_url);
        $promo_data = json_decode($promo_data, true);

        if(is_array($promo_data)) {

            foreach($promo_data["result"]["records"] as $recordKey => $recordValue) {

                $promoName = $recordValue['Name'];
                $phoneNumber = $recordValue['Phone number'];
                $link = $recordValue['link to partner page'];
                $offer1 = $recordValue['Offer - 1'];
                $offer2 = $recordValue['Offer - 2'];
                $offer3 = $recordValue['Offer - 3'];
                $offer4 = $recordValue['Offer - 4'];
                $latitude = $recordValue['Latitude'];
                $longitude = $recordValue['Longitude'];

                insertOrUpdatePromos($promoName, $phoneNumber, $offer1, $offer2, $offer3, $offer4, $latitude, $longitude, $link);

                $records .= "<section class='record'>
                                <h2>" . $promoName . "</h2>
                                <h3>" . $phoneNumber . "</h3>
                                <p>" . $link . "</p>
                            </section>";

            }

        }

        return $records;

    }
    
?>