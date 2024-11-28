$(document).ready(function() {

    $("#intro h3").click(function() {

        $("#home-page-guy").addClass("come-in");
        $("#home-page-pig").addClass("show");

    });

    $("#promo-tray-man").click(function() {

        $("#promo-areas").addClass("show");

    });

    function displayPromos(data) {

        $("#promo-areas").append(
            $('<option>').text("Choose Area").attr("value", "surprise")
        );

        $.each(data.result.records, function(recordKey, recordValue) {

            var recordName = recordValue["Name"];
            var recordPhone = recordValue["Phone number"];
            var recordArea = recordValue["Address - city"];
            var recordLink = recordValue["link to partner page"];
            var recordOffer1 = recordValue["Offer - 1"];
            var recordOffer2 = recordValue["Offer - 2"];
            var recordOffer3 = recordValue["Offer - 3"];
            var recordOffer4 = recordValue["Offer - 4"];


            if (recordArea != null) {
                $("#promo-areas").append(
                    $('<option>').text(recordArea).attr("value", recordArea)
                );
            }

            $("#promo-areas").on('change', function() {
                $("#promo-board").html($(this).val());

                // $("#promo-areas").addClass("hide");

                $("#promo-board").addClass("show");

                $("#promo-details").addClass("show");

                $("#promo-tray-man h2").html("Great Choice! Check out those offers, just for you ;)").css("background-color", "#34a0a4");

                if ($(this).val() == recordArea) {
                    $("#each-promo-details").remove();
                    $("#promo-details").append(
                        $('<section>').attr("id", "each-promo-details").append(
                            $('<h2>').text(recordName),
                            $('<p>').text(recordPhone),
                            $('<a>').text("Claim the offers here :)").attr("href", recordLink).attr("target", "-blank"),
                            $('<p>').text(recordOffer1),
                            $('<p>').text(recordOffer2),
                            $('<p>').text(recordOffer3),
                            $('<p>').text(recordOffer4)
                        )
                    );
                }

                    
                
            });

            // if (recordOffer1 == null) {
            //     recordOffer1 = "";
            // }

            // if (recordOffer2 == null) {
            //     recordOffer2 = "";
            // }

            // if (recordOffer3 == null) {
            //     recordOffer3 = "";
            // }

            // if (recordOffer4 == null) {
            //     recordOffer4 = "";
            // }
    
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

});