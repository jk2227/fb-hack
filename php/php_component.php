<?php
//    function get_nav() {
//        $navigation = array (
//        'HISTORICAL ATTRACTIONS'=> 'sightseeing.php?id=0',
//        'OUTDOOR ACTIVITIES'=> 'sightseeing.php?id=1',
//        'SHOPPING SITES'=> 'sightseeing.php?id=2',
//        );
//
//        foreach ($navigation as $name => $file) {
//            print("\t\t\t<li><a href='$file'>$name</a></li>\n");
//        }
//    }
        

function get_time_options() {
    echo '
        <option value="06:00">6:00 AM</option>\n
        <option value="07:00">7:00 AM</option>\n
        <option value="08:00">8:00 AM</option>\n
        <option value="09:00">9:00 AM</option>\n 
        <option value="10:00">10:00 AM</option>\n
        <option value="11:00">11:00 AM</option>\n
        <option value="12:00">12:00 AM</option>\n
        <option value="13:00">1:00 PM</option>\n
        <option value="14:00">2:00 PM</option>\n
        <option value="15:00">3:00 PM</option>\n
        <option value="16:00">4:00 PM</option>\n
        <option value="17:00">5:00 PM</option>\n
        <option value="18:00">6:00 PM</option>\n
        <option value="19:00">7:00 PM</option>\n
        <option value="20:00">8:00 PM</option>\n
        <option value="21:00">9:00 PM</option>\n
        <option value="22:00">10:00 PM</option>\n
        <option value="23:00">11:00 PM</option>\n
    ';

}







    ?>