document.addEventListener("readystatechange", function(event){
    if(event.target.readyState == "interactive"){
        document.querySelector("body").classList.add("js");
        
        let join_us = document.querySelector("#join-us");
        let home_page_guy = document.querySelector("#home-page-guy");

        join_us.addEventListener("click", function (event) {
            home_page_guy.classList.add("come-in");
            event.preventDefault();
        });
       
    }
});

document.addEventListener("readystatechange", function(event){
    if(event.target.readyState == "interactive"){
        document.querySelector("body").classList.add("js");

        document.querySelector("#promo-tray-man").classList.remove("hide");
        
        let tray = document.querySelector("#promo-tray-man");
        let areas = document.querySelector("#promo-areas");
        let more = document.querySelector("#promo-more-man");
        let deets = document.querySelector("#promo-details");

        tray.addEventListener("click", function (event) {
            areas.classList.remove("hide");
            areas.classList.add("show");
            
            more.classList.add("hide");
            deets.classList.add("hide");

            event.preventDefault();
        });
       
    }
});

function displayPromos(data) {

    var area = document.querySelectorAll("#promo-area a");

    area.click(function() {
        var currentArea = area.html();

        $.each(data.result.records, function(recordKey, recordValue) {

            var recordName = recordValue["Name"];
            var recordPhone = recordValue["Phone number"];
            var recordArea = recordValue["Address - city"];
            var recordLink = recordValue["link to partner page"];
            var recordOffer1 = recordValue["Offer - 1"];
            var recordOffer2 = recordValue["Offer - 2"];
            var recordOffer3 = recordValue["Offer - 3"];
            var recordOffer4 = recordValue["Offer - 4"];

            if (recordArea == currentArea) {
                document.querySelector("#promo-board").innerHTML = recordArea;

                document.querySelector("#promo-board").classList.add("show");

                document.querySelector("#promo-areas").classList.remove("show");
                document.querySelector("#promo-areas").classList.add("hide");

                document.querySelector("#promo-more-man").classList.remove("hide");
                document.querySelector("#promo-more-man").classList.add("show");

                document.querySelector("#promo-details").classList.remove("hide");
                document.querySelector("#promo-details").classList.add("show");

            } else if (recordArea == "null") {
                document.querySelector("#promo-board").innerHTML = "Other";

                document.querySelector("#promo-board").classList.add("show");

                document.querySelector("#promo-areas").classList.remove("show");
                document.querySelector("#promo-areas").classList.add("hide");

                document.querySelector("#promo-more-man").classList.remove("hide");
                document.querySelector("#promo-more-man").classList.add("show");

                document.querySelector("#promo-details").classList.remove("hide");
                document.querySelector("#promo-details").classList.add("show");
            }

            document.querySelector("#promo-tray-man").classList.add("hide");

            $("#promo-details").append(
                $('<h2>').text(recordName),
                $('<h3>').text(recordPhone),
                $('<a>').text("Link to the offer").attr("href", recordLink),
                $('<p>').text(recordOffer1),
                $('<p>').text(recordOffer2),
                $('<p>').text(recordOffer3),
                $('<p>').text(recordOffer4)
            );
    
        });
    });

}

$(document).ready(function() {

    var data = {
        resource_id: "85b106be-fa91-454f-819e-fbd6caf55585",
        limit: 20
    }

    $.ajax({
        url: "https://www.data.brisbane.qld.gov.au/data/api/3/action/datastore_search",
        data: data,
        dataType: "jsonp", // We use "jsonp" to ensure AJAX works correctly locally (otherwise XSS).
        cache: true,
        success: function(data) {
            displayPromos(data);
        }
    });

});