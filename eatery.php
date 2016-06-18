<html>
    <head>
        <meta charset="utf-8">
        <title>Utinerary</title>
        <!-- stylesheets -->
		<link rel="stylesheet" type="text/css" href="css/hack.css">
		<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
        <?php include "backend/food.php";?>
        
        
    </head>
    
    <body>
        <div id="frame">
            <div id="top">
            </div><!-- End top div -->
            
            <div id="main">
                <div id = "category" class = "left">
                    <h2>What are the places that you'd like to eat?</h2>
                    <form method="POST">
                        <div id="search">
                            <div id="food">
                                <input class="food_input" type="text" name="destination" placeholder="Type a category. e.g., Japanese" >
                                <input class="button" type="submit" name="search" value="SEARCH"/>
                            </div>
                        </div>
                    </form>
                    <div id = "rec">
                        placeholder: read from recommendation input
                        <?php query_api("", "Seattle"); ?>
                    </div>
                </div> <!-- end category div -->
                <div id = "cart" class = "right">
                    <h3>CART</h3>
                </div>
            </div><!-- end main div -->
            <div id="bottom">
                <p>&copy; 2016 by Utinerary</p>
            </div>
        </div><!-- end frame div -->
    </body>
    
</html>