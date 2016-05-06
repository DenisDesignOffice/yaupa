/* 
 * Handles the processing of travel forms, 
 * return relevant results back to travel.php.
 */

$(document).ready(function () {

    var modal = document.getElementById('myModal');
    var btn = document.getElementById("myBtn");
    var noresult = document.getElementById("noresult");
    var span = document.getElementsByClassName("close")[0];
    var appendage = document.getElementById("appendage");

    $('#travel_form').submit(function (event) {
        modal.style.display = "block";
        var data = $('#travel_form').serialize();
        $.ajax({
            type: 'POST',
            url: './travel_form_handler.php',
            dataType: 'html',
            data: data,
            success: function (data) {
                modal.style.display = "none";
                if (data.toString() == "<h1>Please fill all relevant fields</h1>") {
                    noresult.style.display = "block";
                    appendage.style.display = "none";
                    $("#noresult").html(data);
                } else if (data.toString() == "<h1>Sorry there is no available transport company for your destination currently. please check back soon</h1>") {
                    noresult.style.display = "block";
                    appendage.style.display = "none";
                    $("#noresult").html("<h1>0 results found for your destination</h1>");
                } else {
                    noresult.style.display = "none";
                    appendage.style.display = "block";
                    $("#appendage").html(data);
                }
            }
        });

        return false;
    });


    $('#travel_form_home').submit(function (event) {

        var data = $('#travel_form_home').serialize();//get all the form the data
        alert(data);
        $.ajax({
            type: 'POST',
            url: 'templates/travel/travel_form_handler.php',
            dataType: 'html',
            data: data,
            success: function (data) {
                window.location = "templates/travel/travel.php"
                $("#appendage").html(data);
                alert(data);
            }
        });

        return false;
    });

});

