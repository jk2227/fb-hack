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
            <div id="top">
                <h1>Food</h1>
            </div><!-- End top div -->
            
            <div id="main">
                <h2>What are the places that you'd like to eat?</h2>
                <div id = "category" class = "left">
                    <div class = "navigation_bar">
                        <ul>
                            <li><a class = "selected" href = "food.php?id=0">Category</a></li>
                            <li><a href = "food.php?id=1">Name</a></li>
                        </ul>
                    </div>
                    <div>
                </div>
                <div id = "cart" class = "right">
                </div>
            </div><!-- end main div -->
            <div id="bottom">
                <p>&copy; 2016 by Utinerary</p>
            </div>
        </div><!-- end frame div -->
    </body>
    
</html>