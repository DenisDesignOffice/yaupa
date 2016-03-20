// Get the modal
var transportCompaniesDiv = document.getElementById('transport_companiesDiv');
var charterServiceDiv = document.getElementById('charter_servicesDiv');

// Get the button that opens the modal
var transportCompaniesBt = document.getElementById("transportCompaniesBt");
var charterServiceBt = document.getElementById("charterServiceBt");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
//transportCompaniesBt.onclick = function() {
//    transportCompaniesDiv.style.display = "block";
//    charterServiceDiv.style.display = "none";
//}
//
//// When the user clicks on <span> (x), close the modal
//charterServiceBt.onclick = function() {
//    charterServiceDiv.style.display = "block";
//    transportCompaniesDiv.style.display = "none";
//}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

