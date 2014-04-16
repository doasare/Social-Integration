<?php
// Required setup for facebook connection
require 'src/facebook.php';

// Config data (App credentials) for the OAUTH2 process
$config = array(
        'appId' => '641889975956660',
        'secret' => 'aa64dfa8bd71f5f03c916467b38d6059'
);

// Creating new Facebook object, passing through the config details
$facebook = new Facebook($config);

if($facebook->getUser() == 0){
   $fbdata= null;
   $fbdata2= null; 
}else{
    $user = $facebook->api('me');  
    $name = $user['name'];
    $fbdata = $facebook->api('/me/photos/');
    $fbdata2 = $facebook->api('/me/photos/uploaded');
    $fbpost = $facebook->api('/me/posts/');


}
//print_r( $fbpost);
function runFB(){
echo '<h1>Login with Facebook</h1>';
global $facebook;


// If the getUser returns 0, there is no session or logged in user. So log in!
if($facebook->getUser() == 0){
    $login = $facebook->getLoginUrl(array("scope" => "read_stream, user_photos, user_likes, user_relationships,user_relationship_details"));
    echo '<a href='.$login.'>Login met Facebook</a>';

}else{
    $user = $facebook->api('me');       // Object with user info
    $user_id = $facebook->getUser();    // Returns the userID
    echo "Username: ".$user['name'];
    echo '<br>';
    echo "User ID: ".$user_id;
    echo '<br>';
	echo "Relationship Status: ".$user['relationship_status'];
	echo '<br><a href="index.php?reset=1">Logout</a>';
     
    $photo_collection = $facebook->api('/me/photos');

}

}

?>
