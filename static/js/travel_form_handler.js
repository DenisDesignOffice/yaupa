/* 
 * Handles the processing of travel forms, 
 * return relevant results back to travel.php.
 */

$(document).ready(function () {
    
    $('#travel_form').submit(function (event) {

        var data = $('#travel_form').serialize();//get all the form the data

        $.ajax({
            type: 'POST',
            url: 'travel_form_handler.php',
            dataType: 'html',
            data: data,
        }).done(function (data) {
            $("#appendage").html(data);
            alert(data);
        });
        
        return false;
    });
});

