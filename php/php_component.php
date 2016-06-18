<?php
    function get_nav() {
        $navigation = array (
        'HISTORICAL ATTRACTIONS'=> 'sightseeing.php?id=0',
        'OUTDOOR ACTIVITIES'=> 'sightseeing.php?id=1',
        'SHOPPING SITES'=> 'sightseeing.php?id=2',
        );

        foreach ($navigation as $name => $file) {
            print("\t\t\t<li><a href='$file'>$name</a></li>\n");
        }
    }
        
    
    ?>