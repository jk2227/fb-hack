<?php session_start(); ?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Utinerary</title>
        <!-- stylesheets -->
		<link rel="stylesheet" type="text/css" href="css/hack.css">
		<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <?php include "php/php_component.php";?>
        
    </head>
    
    <body>
        <div id="frame">
            <div id="home_main">
                <div id="image">
                    <form method="POST">
                        <div id="searchbox">
                            <div id="destination">
                                <input class="destination_input" type="text" name="destination" placeholder="Where are you going?" >
                            </div>
                            <div id="stay">
                                <input class="destination_input" type="text" name="stay" placeholder="Where are you staying?" >
                            </div>
                            <div class="date">
                                <label for="startdate">Start Date:</label>
                                <input class="inputbox" type="date" name="startdate">
                                <label for="starttime"> Start Time:</label>
                                <select name="starttime">
                                    <?php get_time_options(); ?>
                                </select>
                            </div>
                            <div class="date">
                                <label for="enddate">End Date:</label>
                                <input class="inputbox" type="date" name="enddate">
                                <label for="endtime">End Time:</label>
                                <select name="endtime">
                                    <?php get_time_options(); ?>
                                </select>
                            </div>
                            <div id="submit">
                                <input type="submit" name="submit" value="GO"/>
                            </div>
                        </div><!-- End searchbox div -->
                <?php 
                    if (isset($_POST['submit'])){
                        $destination = trim(filter_input(INPUT_POST, 'destination', FILTER_SANITIZE_STRING));
                        $startdate = trim(filter_input(INPUT_POST, 'startdate', FILTER_SANITIZE_STRING));
                        $enddate = trim(filter_input(INPUT_POST, 'enddate', FILTER_SANITIZE_STRING));
                        $starttime = $_POST['starttime'];
                        $endtime = $_POST['endtime'];
                        $stay = trim(filter_input(INPUT_POST, 'stay', FILTER_SANITIZE_STRING));
                        
                        
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
                            $_SESSION["starttime"] = $starttime;
                            $_SESSION["endtime"] = $endtime;
                            $_SESSION["stay"] = $stay;
                            
                            echo'
                            <script type="text/javascript">
                                window.location = "sightseeing.php";
                            </script>';
                        }
                        
                    }
                ?>
                </form>
                </div><!-- End image div -->
            </div><!-- end main div -->
            <div id="bottom">
                <p>&copy; 2016 by Utinerary</p>
            </div>
        </div><!-- end frame div -->
    </body>
    
</html>