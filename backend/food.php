<!--#!/usr/bin/php -->
<?php

// Enter the path that the oauth library is in relation to the php file
require_once('lib/OAuth.php');

// Set your OAuth credentials here  
// These credentials can be obtained from the 'Manage API Access' page in the
// developers documentation (http://www.yelp.com/developers)
$CONSUMER_KEY = 'nI2ym2HtMeUiqok8F5UfsA';
$CONSUMER_SECRET = 'CDu7QRRU4oDquGoCaN4zh9agdfo';
$TOKEN = 'S0vofSv5-IGHfyJ0JkU93-YahQvSiNyM';
$TOKEN_SECRET = 'fbyTLjZF69W_FHz3NY5gcKyNOVo';


$API_HOST = 'api.yelp.com';
$DEFAULT_TERM = 'food';
$DEFAULT_LOCATION = 'Seattle, WA';
$SEARCH_LIMIT = 20;
$SEARCH_PATH = '/v2/search/';
$BUSINESS_PATH = '/v2/business/';


/** 
 * Makes a request to the Yelp API and returns the response
 * 
 * @param    $host    The domain host of the API 
 * @param    $path    The path of the APi after the domain
 * @return   The JSON response from the request      
 */
function request($host, $path) {
    $unsigned_url = "https://" . $host . $path;

    // Token object built using the OAuth library
    $token = new OAuthToken($GLOBALS['TOKEN'], $GLOBALS['TOKEN_SECRET']);

    // Consumer object built using the OAuth library
    $consumer = new OAuthConsumer($GLOBALS['CONSUMER_KEY'], $GLOBALS['CONSUMER_SECRET']);

    // Yelp uses HMAC SHA1 encoding
    $signature_method = new OAuthSignatureMethod_HMAC_SHA1();

    $oauthrequest = OAuthRequest::from_consumer_and_token(
        $consumer, 
        $token, 
        'GET', 
        $unsigned_url
    );
    
    // Sign the request
    $oauthrequest->sign_request($signature_method, $consumer, $token);
    
    // Get the signed URL
    $signed_url = $oauthrequest->to_url();
    
    // Send Yelp API Call
    try {
        $ch = curl_init($signed_url);
        if (FALSE === $ch)
            throw new Exception('Failed to initialize');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = curl_exec($ch);

        if (FALSE === $data)
            throw new Exception(curl_error($ch), curl_errno($ch));
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if (200 != $http_status)
            throw new Exception($data, $http_status);

        curl_close($ch);
    } catch(Exception $e) {
        trigger_error(sprintf(
            'Curl failed with error #%d: %s',
            $e->getCode(), $e->getMessage()),
            E_USER_ERROR);
    }
    
    return $data;
}

/**
 * Query the Search API by a search term and location 
 * 
 * @param    $term        The search term passed to the API 
 * @param    $location    The search location passed to the API 
 * @return   The JSON response from the request 
 */
function search($term, $location) {
    $url_params = array();
    
    $url_params['term'] = $term ?: $GLOBALS['DEFAULT_TERM'];
    $url_params['location'] = $location?: $GLOBALS['DEFAULT_LOCATION'];
    $url_params['limit'] = $GLOBALS['SEARCH_LIMIT'];
    $search_path = $GLOBALS['SEARCH_PATH'] . "?" . http_build_query($url_params);
    
    return request($GLOBALS['API_HOST'], $search_path);
}

/**
 * Query the Business API by business_id
 * 
 * @param    $business_id    The ID of the business to query
 * @return   The JSON response from the request 
 */
function get_business($business_id) {
    $business_path = $GLOBALS['BUSINESS_PATH'] . urlencode($business_id);
    
    return request($GLOBALS['API_HOST'], $business_path);
}

/**
 * Queries the API by the input values from the user 
 * 
 * @param    $term        The search term to query
 * @param    $location    The location of the business to query
 */
function query_api($term, $location) {     
    $response = json_decode(search($term, $location));
    print "<table class='display'><tr><th></th><th></th><th></th><th></th><th></th></tr><tbody>";
    for ($x = 0; $x < 20; $x++) {
        $url = $response->businesses[$x]->url;
        print "<tr>";
        print "<td><img src='".$response->businesses[$x]->image_url."' alt='temporary'></td>\n";
        print "<td><a id = 'ssingPoint' href='$url'>".$response->businesses[$x]->name."</a></td>\n";
        print "<td><img src='".$response->businesses[$x]->rating_img_url."' alt='temporary'></td>\n";
        print "<td> Rating: ".$response->businesses[$x]->rating."</td>\n";
        print '<td> <button class="add" onclick = "addPlace(this)">Add</button></td>';
        print "</tr>";
        // location
        // phone
        // rating_img_url
    };
    print "</tbody></table>";
    // $business_id = $response->businesses[0]->id;
    
    // print sprintf(
    //     "%d businesses found, querying business info for the top result \"%s\"\n\n",         
    //     count($response->businesses),
    //     $business_id
    // );
    
    // $response = get_business($business_id);
    
    // print sprintf("Result for business \"%s\" found:\n", $business_id);
    // print "$response\n";
}

/**
 * User input is handled here 
 */
// $longopts  = array(
//     "term::",
//     "location::",
// );
    
// $options = getopt("", $longopts);

// $term = $options['term'] ?: '';
// $location = $options['location'] ?: '';

// query_api($term, $location);

?>