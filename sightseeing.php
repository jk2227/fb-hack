<?php session_start(); ?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Utinerary</title>
        <!-- stylesheets -->
		<link rel="stylesheet" type="text/css" href="css/hack.css">
		<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA59zGWOtyvYAUhwxmnjwF3GZQoxcvynF8&libraries=places"></script>
        <!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/geocode/json?address=Seattle&key=AIzaSyA59zGWOtyvYAUhwxmnjwF3GZQoxcvynF8"></script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script type="text/javascript" src="js/sightseeing.js"></script>
        <script type="text/javascript" src="js/serializer.js"></script>
        <?php include "php/php_component.php";?>
        
    </head>
    
    <body>
        <div id="frame">
        <script type='text/javascript'>
          var userDestination = "<?php echo $_SESSION['destination'] ?>"; //dont forget to place the PHP code block inside the quotation 
          var userStart = "<?php echo $_SESSION['startdate'] ?>";
          var userEnd = "<?php echo $_SESSION['enddate']?>";
          // console.log(userDestination);
        </script>
            <div id="top">
                <h1>Utinerary: Make Your Itinerary</h1>
            </div><!-- End top div -->
            
            <div id="main">
                <div id = "category" class = "left">
                    <h2>Find things to do:</h2>
                    <div id="search">
                        <div id="food">
                            <input type="text" id = "ssingPoint" class="food_input" placeholder="Type an attraction or an acitivity, e.g., Space Needle." name="sightseeingPoints"/>
                            <button class="button" onclick = "addPlace()">Add</button>
                        </div>
                    <div id = "sightseeingForm">
                        <h3>Click to add an attraction to your itinerary.</h3>
                    </div>
                    </div>
                </div>
                
                <div id = "cart" class = "right">
                    <h2>Cart</h2>
                     <table id = "selectedPlaces">
                        <tr><td>Seleced Places</td><td>Duration</td><td> </td></tr>
                    </table>
                </div>
                <form method = "POST">
                <input type = "submit" id = "sightseeingSubmission" name = "submit" value = "Continue" onclick = "ajax()"/>
                </form>
                <!-- <button onclick = "ajax()">Continue</button> -->
            <?php 
            if (isset($_POST["submit"])){
                echo "submitted";
                echo $_SESSION["data"];
            //         $DOM = new DOMDocument();
            //         $DOM->loadHTML("sightseeing.php");
            //         $rows = $DOM->getElementsByTagName("tr");
            //         $arr = array();
            //         print($rows->length);
            //         for ($i = 0; $i < $rows->length; $i++) {
            //             $cols = $rows->item($i)->getElementsbyTagName("td");
            //             $arr[] = $cols->item(0)->nodeValue;
            //             print($cols->item(0)->nodeValue);
            //         }
            //         $_SESSION["places"] = $arr;
                }
            ?>

            </div><!-- end main div -->
            <div id="clearboth"></div>
            <div id="map"></div>
            
            <div id="bottom">
                <p>&copy; 2016 by Utinerary</p>
            </div>
        </div><!-- end frame div -->
    </body>
    
</html>