/* 
 * This script will handle database queries for vehicle charter
 * It serializes the form in charter.php and passes the data to
 * charter_form_handler.php for process, then it returns a html
 * response if results where found, otherwise log error
 */

$(document).ready(function () {

    $('#charter_form').submit(function (event) {

        var data = $('#charter_form').serialize();//get all the form the data

        $.post('./charter_form_handler.php', data, processResponce);

        return false;
    });
    
    $('#book_form').submit(function (event) {

        var data = $('#book_form').serialize();//get all the form the data

        var company_name = jQuery('input[name="company_name"]').val();
        
        alert(company_name);

        return true;
    });
    
    function processResponce(data,status){
        $("#appendage").html(data);
    }
    
    function processResponce2(data,status){
        window.location = "./charter_book.php";
    }
    
});

