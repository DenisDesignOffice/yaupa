<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <title>Charter</title>

        <link rel="stylesheet" type="text/css" href="../../static/css/rotate.css"/>
        <link rel="stylesheet" type="text/css" href="../../static/font-awesome-4.3.0/css/font-awesome.min.css"/>
        <link rel="stylesheet" type="text/css" href="../../static/css/normalize.css" />
        <link rel="stylesheet" type="text/css" href="../../static/css/form.css"/>
        <link rel="stylesheet" type="text/css" href="../../static/css/icon.css"/>
        <link rel="stylesheet" type="text/css" href="../../static/css/vid.css"/>

        <script src="../../static/js/modernizr.custom.js"></script>
        <script src="../../static/js/jquery-2.1.3.js"></script>
        
        <!-- call the charter form processor -->
        <script type="text/javascript" src="../../static/js/charter_form_handler.js"></script>
        
    </head>

    <body>

        <?php require_once "../../templates/header.php"; ?>

        <section class="charter">
            <h1>Search and Charter</h1>
        </section>

        <!-- Charter form -->
        <section class="form">
            
            <form method="post" id="charter_form" action="./charter.php">
                
                <!-- vehicle selector w -->
                <label > <i class="fa fa-bus"></i>
                    <select name="type" class="input-state" >
                        <?php include_once '../../util/constants/vehicles.html'; ?>
                    </select>
                </label>
                
                <input type="text" name="from" value="" placeholder="From?  Pickup point" class="input">
                    
                <!-- current state selector -->
                <select type="select" name="location" placeholder="State" class="input-state">
                      <option>Current State</option>
                       <?php include '../../util/constants/states.html'; ?>
                </select>

                <input type="text" name="to" value="" placeholder="To?  Desired destination" class="input"></td>

                <!-- destination state selector -->
                <select type="select" name="dest" value="" placeholder="State" class="input-state">
                       <option>Destination State</option>
                       <?php include '../../util/constants/states.html'; ?>
                </select>

                <input type="submit" value="Search" class="input search-text">

            </form>
            
        </section>

        <section class="ha-waypoint" data-animate-down="ha-header-small" data-animate-up="ha-header-large"></section>
        
        <!-- display search result here -->
        <div class="wrapper">
             <div class="masonry">
                                    
                    <div id="appendage"></div><!-- search results will be put in this div -->
                    
             </div>
        </div>

        <?php require_once "../../templates/footer.php"; ?>

                                    