/* 
 * Handles the processing of travel forms, 
 * return relevant results back to travel.php.
 */

$(document).ready(function () {

    $('#travel_form').submit(function (event) {

        var data = $('#travel_form').serialize();//get all the form the data
        $.ajax({
            type: 'POST',
            url: './travel_form_handler.php',
            dataType: 'html',
            data: data,
            success: function (data) {
                $("#appendage").html(data);
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

