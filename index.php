
<!DOCTYPE html>
<html>
    <head>
        
        
        <meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Yaupa home</title>
		<meta name="description" content="Book for bus ticket online, charter any vehicle across Nigeria and Order for Taxi" />
		<meta name="keywords" content="ambulance, King Koko Express, Lagos, Abuja, Port-hacourt, Charter, Travel, Taxi, online booking, Agofure, God is Good, GNL, Muyi Line, Prince Line, Rahony Express " />
		<meta name="author" content="Yaupa" />
        
        <link rel="stylesheet" type="text/css" href="static/css/style.css"/>
        <link rel="stylesheet" type="text/css" href="static/css/rotate.css"/>
        <link rel="stylesheet" type="text/css" href="static/css/normalize.css" />
        <link rel="stylesheet" type="text/css" href="static/css/form.css"/>
        <link rel="stylesheet" type="text/css" href="static/css/icon.css"/>
        <link rel="stylesheet" type="text/css" href="static/font-awesome-4.3.0/css/font-awesome.min.css"/>
        <link rel="shortcut icon" href="/static/images/favicon.ico">

         <script src="static/js/modernizr.custom.js"></script>
        <!-- call the travel form processor -->


    </head>

    <body>

        <!--including the header file-->
       
       <section>
        <?php require_once "templates/header.php";?>
        </section>
        
        <section class="col-3" >
        
            <video autoplay loop mute poster="static/vids/capture.png" id="video-bg"> 
                
                <source src="static/vids/yaupatraffic.webm" type="video/webm">
                 <source src="static/vids/yaupatraffic.ogv" type="video/ogv">
                <source src="static/vids/yaupatraffic.mp4" type="video/mp4">
               
                
                        <p>does not support this browser</p>
            </video>
                        
                        <div class="rotate">
                            <h2 class="rw-sentence">
                                Travel the <a class="rw-words rw-words-1">
                                    <span>Safest</span>
                                    <span>Fastest</span>
                                    <span>Cheapest</span> <br>
                                Way Across Nigeria </a>
                             </h2>
                            <p1>Do travel bookings, charter any vehicle online</p1>
                        </div>



         </section>
                        
                        
                        
                                                <section class="ha-waypoint form1" data-animate-down="ha-header-small" data-animate-up="ha-header-large">

                                                    
                                                    <div class="pos">
                                                   
                                                     <h3>Find hundreds of transport companies going you way</h3>

                                                        <form method="post" id="travel_form_home" action="templates/travel/travel.php">


                                                        <input type="text" Name="from_home" value="" placeholder="From? e.g Benin, Owerri" class="input" required>


                                                        <input type="text" name="to_home" value="" placeholder="To? e.g Oyo, Aba" class="input" required>


                                                         <input type="submit" value="Search" class="input search-text">

                                                             </form>
                                                              <p>
                                                                           
                                                                            
                                                                            </div>

                                                                            </section>
                                                                      <section class="campaign">
                                                                      
                                                                      </section>

                                                                            <section class="color">
                                                                                <div class="column pos2">
                                                                                    <span class="icon icon-home"></span><p>
                                                                                        <h2>Make it Safe</h2>
                                                                                        <p>
                                                       Travel safe, make the right decision. Choose from the best available transportation companies, compare prices and decide early.                                                       All from home.
                                                                                        </p>
                                                                                </div>

                                                                                <div class="column pos2">
                                                                                    <span class="icon icon-phone"></span><p>
                                                                                        <h2>Make the Call</h2>
                                                                                        <p>
                                                                                            We want to help you with your bookings. &nbsp; +234 703 527 7717
                                                                                            <p>
                                                                                                </div>

                                                                             <div class="column pos2">
                                                                          <span class="icon icon-truck"></span><p>
                                                                                                        <h2>Get All</h2>
                                                                                                        <p>
                                        Charter a Bus, Car, Truck, Lorry, Trailer, Ambulance, Hilux, SUV, Pickup Van and more; Order a taxi and get the best always.
                                                                                                            <p>
                                                                            </div>

                                                                           </section>
                                                                          

                                                                         <?php require_once "templates/footer.php"; ?>
                                                                        

                                                                       </body>
                                                                                                                
                                                                                                               
        
                                                                                                           
                                                                          <script src="static/js/jquery-2.1.3.js"></script>
                                                                          <script src="static/js/waypoints.min.js"></script>
                                                                            <script>
                                                                            var $head = $('#ha-header');
                                                                           $('.ha-waypoint').each(function (i) {
                                                                              var $el = $(this),
                                                                              animClassDown = $el.data('animateDown'),
                                                                             animClassUp = $el.data('animateUp');

                                                                            $el.waypoint(function (direction) {
                                                                           if (direction === 'down' && animClassDown) {
                                                                            $head.attr('class', 'ha-header ' + animClassDown);
                                                                            }
                                                                           else if (direction === 'up' && animClassUp) {
                                                                           $head.attr('class', 'ha-header ' + animClassUp);
                                                                            }
                                                                            }, {offset: '100%'});
                                                                           });
                                                                          </script>
                                                                                                                </html>

