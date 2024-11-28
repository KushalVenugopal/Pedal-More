$(document).ready(function() {

    // Making API calls and iterating over them were learnt and taken from the Workshops class of DECO7180

    function displayPromos(data) {

        // Working with Leaflet and OpenStreetMap was learnt and taken from the Workshop class of DECO7180

        // Setup the map as per the Leaflet instructions:
        // https://leafletjs.com/examples/quick-start/

        var map = L.map("promo-map-box").setView([-27.5, 153], 12);

        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            maxZoom: 18,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        $.each(data.result.records, function(recordKey, recordValue) {

            let recordName = recordValue["Name"];
            let recordPhone = recordValue["Phone number"];
            let recordArea = recordValue["Address - city"];
            let recordLink = recordValue["link to partner page"];
            let recordOffer1 = recordValue["Offer - 1"];
            let recordOffer2 = recordValue["Offer - 2"];
            let recordOffer3 = recordValue["Offer - 3"];
            let recordOffer4 = recordValue["Offer - 4"];
            let recordLatitude = recordValue["Latitude"];
            let recordLongitude = recordValue["Longitude"];

            let latlng = recordLatitude + recordLongitude;

            $("#show-promos").click(function(event) {
                $("#show-promos").addClass("hide");

                $("#promo-deets").append(
                    $('<section>').attr("class", "each-promo-details").attr("id", latlng).append(
                        $('<h2>').text(recordName),
                        $('<h3>').text(recordArea),
                        $('<p>').text(recordPhone),
                        $('<a>').text("Claim the offers here").attr("href", recordLink).attr("target", "-blank"),
                        $('<p>').text(recordOffer1),
                        $('<p>').text(recordOffer2),
                        $('<p>').text(recordOffer3),
                        $('<p>').text(recordOffer4),
                    )
                );

                $("#promo-deets").css("border-radius", "5px").css("box-shadow", "2px 2px 0.5em black");

                if (recordLatitude && recordLongitude) {
                    let marker = L.marker([recordLatitude, recordLongitude]).addTo(map);
    
                    popupText  = "<a href='#" + latlng + "'><strong>" + recordName + "</strong> at " + recordArea + "<br></a>";
                    marker.bindPopup(popupText).openPopup();
                }

                event.preventDefault();
                

            });
    
        });

    }

    var data = {
        resource_id: "85b106be-fa91-454f-819e-fbd6caf55585",
        limit: 20
    }

    $.ajax({
        url: "https://www.data.brisbane.qld.gov.au/data/api/3/action/datastore_search",
        data: data,
        dataType: "jsonp",
        cache: true,
        success: function(data) {
            displayPromos(data);
        }
    });

    $("#community-form").submit(function(event) {
        event.preventDefault();

        $.ajax({
            type: "POST",
            url: "post.php",
            data: $(this).serialize(),
            // dataType: "jsonp",
            cache: false,
            success: function() {

                // Loading part of a page was learnt from the following websites
                // https://www.youtube.com/watch?v=5w92yZ3gSRM
                // https://whitefoxcreative.com/developers/ajax/refresh-a-section-of-a-page-at-specific-intervals-using-ajax/
                $("#user-posts").load("community.php #just-to-load");
                $("#community-form-section").load("community.php #community-form");

                $("#submit-success").html("Post shared with your community. Others will be see it at the top of the list for now.");

                
            },
            error: function() {
                alert("Sorry! Could not submit post due to technical issues. Please try again.");
            }
        });
                
    });


    // Generate Challenge

    $("#the-challenge").removeClass("show");

    $("#generate-button").click(function(event) {
        $("#the-challenge").addClass("show");

        var challengeMap = L.map("challenge-map").setView([-27.5, 153], 12);

        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            maxZoom: 18,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(challengeMap);

        var fromLatitude = $("#from-lat").html();
        var fromLongitude = $("#from-lng").html();
        var toLatitude = $("#to-lat").html();
        var toLongitude = $("#to-lng").html();

        if (fromLatitude && fromLongitude && toLatitude && toLongitude) {
            let fromMarker = L.marker([fromLatitude, fromLongitude]).addTo(challengeMap);
            let toMarker = L.marker([toLatitude, toLongitude]).addTo(challengeMap);

            fromText = "Start";
            toText = "Finish";

            toMarker.bindPopup(toText).openPopup();
            fromMarker.bindPopup(fromText).openPopup();
        }

        event.preventDefault();
    });


    // Post challenge to community
    $("#share").click(function(event) {
        event.preventDefault();

        $.ajax({
            url: "post_challenge.php",
            success: function() {

                $("#share").html("Posted to community.");
                $("#share").addClass("posted");
                
            },
            error: function() {
                alert("Sorry! Could not submit post due to technical issues. Please try again.");
            }
        });
                
    });





});