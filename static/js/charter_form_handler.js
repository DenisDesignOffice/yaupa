/* 
 * This script will handle database queries for vehicle charter
 * It serializes the form in charter.php and passes the data to
 * charter_form_handler.php for process, then it returns a html
 * response if results where found, otherwise log error
 */

$(document).ready(function () {

    var modal = document.getElementById('myModal');
    var btn = document.getElementById("myBtn");
    var span = document.getElementsByClassName("close")[0];
    var noresult = document.getElementById('noresult');

    $('#charter_form').submit(function (event) {
        var data = $('#charter_form').serialize();//get all the form the data
        modal.style.display = "block";
        noresult.style.display = "none";

        $.post('./charter_form_handler.php', data, processResponce);

        return false;
    });

    $('#book_form').submit(function (event) {

        var data = $('#book_form').serialize();//get all the form the data

        var company_name = jQuery('input[name="company_name"]').val();

        alert(company_name);

        return true;
    });

    $('#editTcForm').submit(function (event) {

        var data = $('#editTcForm').serialize();//get all the form the data

        $.post('./edit_form_handler.php', data, processResponce);

        return true;
    });

    $('#addTcForm').submit(function (event) {

        var data = $('#editTcForm').serialize();//get all the form the data

        $.post('./edit_form_handler.php', data, processResponce);

        return true;
    });

    function processResponce(data, status) {
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

    function processResponce2(data, status) {
        window.location = "./charter_book.php";
    }

});

