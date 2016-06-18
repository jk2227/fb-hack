<?php session_start(); ?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Utinerary</title>
        <!-- stylesheets -->
		<link rel="stylesheet" type="text/css" href="css/hack.css">
		<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
         <script type="text/javascript" src="js/hack.js"></script>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <?php include "php/php_component.php";?>
        
    </head>
    
    <body>
        <div id="frame">
            <div id="top">
            </div><!-- End top div -->
            
            <div id="main">  
            <form method = "POST">
                <input type = "submit" name = "enter" value = "enter">
            </form>     
            <?php

            if (isset($_POST["enter"])){
                echo $_SESSION["places"];
            }
            ?>
            </div><!-- end main div -->
            <div id="bottom">
                <p>&copy; 2016 by Utinerary</p>
            </div>
        </div><!-- end frame div -->
    </body>
    
</html>