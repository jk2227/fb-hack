
<html>
    <head>
        <meta charset="utf-8">
        <title>Utinerary</title>
        <!-- stylesheets -->
		<link rel="stylesheet" type="text/css" href="css/hack.css">
		<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
         <script type="text/javascript" src="js/hack.js"></script>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
         <script type="text/javascript" src="js/serializer.js"></script>
        <?php include "php/php_component.php";?>
        
    </head>
    
    <body>
        <div id="frame">
            <div id="top">
                <h1>Utinerary: Make Your Itinerary</h1>
            </div><!-- End top div -->
            
            <div id="main">  
                <table class = 'display finalResult'>
            
                <?php
                    $file = fopen("backend/final.json", "r");
                    $lines = array();
                    while (!feof($file)){
                        $lines[] = fgets($file);
                    }
                    fclose($file);

                    $morning = array("9:45AM","9:45AM", "10:15AM", "10:00AM", "9:15AM");
                    $noon = array("11:30AM","11:30AM", "12:00AM", "11:45AM", "12:15AM");
                    $afternoon = array("2:00pm","2:00pm", "1:30pm", "2:30pm", "3:00pm");
                    $evening = array("6:15pm", "6:15pm", "7:00pm", "6:00pm", "7:15pm");
                    
                    $json = json_decode ($lines[0]);
                    $count = 1;
                    foreach ($json as $day){
                        
                        echo "<tr><td>DAY ".$count."</td><td></td></tr>";
                        echo "<tr><td>".$morning[$count]."</td><td>".$day->p1."</td></tr>";
                        echo "<tr><td>".$noon[$count]."</td><td>Lunch at ".$day->lunch."</td></tr>";
                        echo "<tr><td>".$afternoon[$count]."</td><td>".$day->p2."</td></tr>";
                        echo "<tr><td>".$evening[$count]."</td><td>Dinner at ".$day->dinner."</td></tr>";
                        echo "<tr><td></td><td></td></tr>";
                        echo "<tr><td></td><td></td></tr>";
                        echo "<tr><td></td><td></td></tr>";
                        echo "<tr><td></td><td></td></tr>";
                        echo "<tr><td></td><td></td></tr>";
                        echo "<tr><td></td><td></td></tr>";
                        echo "<tr><td></td><td></td></tr>";
                        echo "<tr><td></td><td></td></tr>";
                        
                        $count ++;
                    }

                ?>

                </table>
            
            </div><!-- end main div -->
            <div id="bottom">
                <p>&copy; 2016 by Utinerary</p>
            </div>
        </div><!-- end frame div -->
    </body>
    
</html>
