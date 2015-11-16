
<!--including the header file-->
<?php require_once "header.php";?>



<section class="col-3" >
<video autoplay loop muted poster="vid-first-frame.jpg" id="video-bg"> 
<source src="vids/front.webm" type="video/webm">
<source src="vids/front.mp4" type="video/mp4">
<p>does not support this browser</p>
</video>
<div class="text column">

<h2 class="rw-sentence">
Travel the <a class="rw-words rw-words-1">
<span>Safest</span>
<span>Fastest</span>
<span>Cheapest</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</a> &nbsp;&nbsp;&nbsp;Way Across Nigeria </h2>
<p1>Charter a bus, taxi, truck, lorry.  Book your next trip</p1>
</div>



</section>
<br><br><br><br><br><br>
 <section class="ha-waypoint" data-animate-down="ha-header-small" data-animate-up="ha-header-large">

<h3>See What's Available</h3>
<div class="pos">



<form method="post" action="travel.php">


<input type="text" Name="from_home" value="" placeholder="From? e.g Benin, Owerri" class="input" required>




<input type="text" name="to_home" value="" placeholder="To? e.g Oyo, Aba" class="input" required>


<input type="submit" value="Search" class="input search-text">

</form>
<p>
<h4>Book now, avoid increase due to fuel price</h4>
<h4>Use our simple search form to find hundreds of transportation companies going you way</h4>
</div>

</section>


<section class="color">
<div class="column pos2">
<span class="icon icon-stack"></span><p>
<h2>Make it Safe</h2>
<p>
Travel safe, make the right decision. Chose from the best available transport companies, compare prices and decide early.
</p>
</div>

<div class="column pos2">
<span class="icon icon-phone"></span><p>
<h2>Make the Call</h2>
<p>
You can have your taxi at your door step, all you've got to do is click the button
<p>
</div>

<div class="column pos2">
<span class="icon icon-truck"></span><p>
<h2>Get All</h2>
<p>
Charter a bus, car, truck, lorry, trailer; compare prices and get the best always.
<p>
</div>

</section>

<?php require_once "footer.php";?>

