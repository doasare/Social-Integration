
<?php
require ('../facebook/index.php');
require ('../twitter/twitter.php');
require ('../instagram/index.php');
echo '<h1> Social Feed</h1>';
//echo '<link href="style.css" rel="stylesheet" type="text/css" media="screen" />';
$collection = array();
foreach ($instaPics->data as $media) {
// create meta section
$avatar = $media->user->profile_picture;
//$username = $media->user->username;
//$comment = $media->caption->text;
       $item = array(
        'message' =>$media->caption->text,
        'status_type' => 'post',
        'time' =>gmdate("m/d/Y g:i:s A", $media->created_time),
        'platform' => 'Instagram'
        );
       array_push($collection, $item);
}

 foreach($tweets as $tweet){
       $item = array(
        'message' =>$tweet->text,
        'status_type' =>'tweet',
        'time' =>$tweet->created_at,
        'platform' => 'Twitter'
        );
       array_push($collection, $item);
  }
foreach($fbpost as $user_posts){
	foreach($user_posts as $posts){
		
		if (isset($posts['message'])){
			if ($posts['message']!==h){
				$item = array(
		        'message' =>$posts['message'],
		        'status_type' =>$posts['status_type'],
		        'time' =>$posts['created_time'],
		        'platform' => 'Facebook'
		        );
		       array_push($collection, $item);

			}
	}

		
	}
	
    
}
function cmp($a, $b) {
        return strtotime($a["time"]) < strtotime($b["time"]);
}
usort($collection, "cmp");
foreach($collection as $user_post){
    $x++;
    echo '<div id="message">';
    echo $user_post['message']."<br>";
    echo $user_post['status_type']."<br>";
    echo $user_post['time']."<br>";
    echo "<b>".$user_post['platform']."</b><br></div>";
    echo '</div><br>';
    
}
?>