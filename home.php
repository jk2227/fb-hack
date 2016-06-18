<?php session_start(); ?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Utinerary</title>
        <!-- stylesheets -->
		<link rel="stylesheet" type="text/css" href="css/hack.css">
		<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
        <?php include "php/php_component.php";?>
        
    </head>
    
    <body>
        <div id="frame">
            <div id="main">
                <div id="image">
                    <form method="POST">
                        <div id="searchbox">
                            <div id="destination">
                                <input class="destination_input" type="text" name="destination" placeholder="Where Are You Going?" >
                            </div>
                            <div id="date">
                                <label for="startdate">Start Date:</label>
                                <input class="inputbox" type="date" name="startdate">
                                <label for="enddate">End Date:</label>
                                <input class="inputbox" type="date" name="enddate">
                            </div>
                            <div id="submit">
                                <input class="button" type="submit" name="submit" value="GO"/>
                            </div>
                        </div><!-- End searchbox div -->
                    </form>
                <?php 
                    if (isset($_POST['submit'])){
                        $destination = trim(filter_input(INPUT_POST, 'destination', FILTER_SANITIZE_STRING));
                        $startdate = trim(filter_input(INPUT_POST, 'startdate', FILTER_SANITIZE_STRING));
                        $enddate = trim(filter_input(INPUT_POST, 'enddate', FILTER_SANITIZE_STRING));
                        
                        //form validation
                        $validate = true;
                        $check = "/^[a-zA-Z\s]{0,20}$/";

                        //validate input: description
                        if (empty($destination)) { 
                            $validate = false;
                            echo "\t\t<p>Please Provide a Destination!</p>\n";
                        }
                        
                        if (!preg_match($check, $destination)) {
                            $validate = false;
                            echo "\t\t<p>Field Destination: Letters Only. Maximum length 20 Characters</p>\n";
                        }
                        
                        if (empty($startdate)) { 
                            $validate = false;
                            echo "\t\t<p>Please Provide a Start Date!</p>\n";
                        }
                        
                        if (empty($enddate)) { 
                            $validate = false;
                            echo "\t\t<p>Please Provide a End Date!</p>\n";
                        }
                        
                        if ($validate == true) {
                            $_SESSION["destination"] = $destination;
                            $_SESSION["startdate"] = $startdate;
                            $_SESSION["enddate"] = $enddate;
                        }
                        
                    }
                ?>
                </div><!-- End image div -->
            </div><!-- end main div -->
            <div id="bottom">
                <p>&copy; 2016 by Utinerary</p>
            </div>
        </div><!-- end frame div -->
    </body>
    
</html>