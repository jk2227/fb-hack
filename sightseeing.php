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
        <?php include "php/php_component.php";?>
        
    </head>
    
    <body>
        <div id="frame">
            <div id="top">
                <h1>Sightseeing</h1>
            </div><!-- End top div -->
            
            <div id="main">
                <h2>What are places that you'd like to see?</h2>
                <div id = "category" class = "left">
                    <input type="text" id = "ssingPoint" name="sightseeingPoints"/>
                    <button onclick = "addPlace()">Add</button>
                    <div id = "sightseeingForm">
                    </div>
                </div>
                <div id = "cart" class = "right">
                    <table id = "selectedPlaces">
                        <tr><td>Seleced Places</td><td>Duration</td><td> </td></tr>
                    </table>
                </div>
                <button id = "sightseeingSubmission">Continue</button>
 
            </div><!-- end main div -->
            <div id="map"></div>
            
            <div id="bottom">
                <p>&copy; 2016 by Utinerary</p>
            </div>
        </div><!-- end frame div -->
    </body>
    
</html>