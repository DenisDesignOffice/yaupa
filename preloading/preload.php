

<!DOCTYPE html">
<html>
<head>

<title>Loading Results</title> 

<link rel="stylesheet" type="text/css" href="preload.css"/>

</head>

<body>

 
 
  <!-- Trigger/Open The Modal -->
<button id="myBtn">Open Modal</button>


 
 

<section id="myModal" class="modal">

				<div class="hs-wrapper">
					<img src="images/1.jpg" alt="image01"/>
					<img src="images/2.jpg" alt="image02"/>
					<img src="images/3.jpg" alt="image03"/>
					<img src="images/4.jpg" alt="image04"/>
					<img src="images/5.jpg" alt="image05"/>
					<img src="images/6.jpg" alt="image06"/>
					<img src="images/7.jpg" alt="image07"/>
					<img src="images/8.jpg" alt="image08"/>
                    
					<div class="caption">
						<span> <strong>Loading...</strong></span>
					</div>
				</div>
                
			</section>	







<script>
var modal = document.getElementById('myModal');


var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>

