
<?php
require ('../facebook/index.php');
require ('../twitter/twitter.php');
require ('../instagram/index.php');

//$fbdata =getPhoto();
//$fbdata2 =getPhotoUploaded();
//print_r($twitterPics);
echo '<h1> Media</h1>';
echo '<link href="style.css" rel="stylesheet" type="text/css" media="screen" />';

//combination of photos
$collection = array();

foreach ($instaPics->data as $media) {
$content = "<li>";
// output media
if ($media->type !== 'video') {
$image = $media->images->standard_resolution->url;
$content .= "<img class=\"media\" src=\"{$image}\"/>";
}
// create meta section
$avatar = $media->user->profile_picture;
//$username = $media->user->username;
//$comment = $media->caption->text;
       $item = array(
        'main' =>$image,
        'scaled' =>$image,
        'time' =>gmdate("m/d/Y g:i:s A", $media->created_time),
        'platform' => 'Instagram'
        );
       array_push($collection, $item);
}
//twitter extraction
 foreach($twitterPics->statuses as $tweet){

      //echo "{$tweet->user->screen_name}\n {$tweet->entities->media[0]->media_url}\n {$tweet->created_at}";
       $item = array(
        'main' =>$tweet->entities->media[0]->media_url,
        'scaled' =>$tweet->entities->media[0]->media_url,
        'time' =>$tweet->created_at,
        'platform' => 'Twitter'
        );
       array_push($collection, $item);
  }
foreach($fbdata as $user_photos){
    
    foreach($user_photos as $photo){
       $item = array(
        'main' =>$photo['source'],
        'scaled' =>$photo['picture'],
        'time' =>$photo['created_time'],
        'platform' => 'Facebook'
        );
// creating new element for each result
        array_push($collection, $item);
    }
}

foreach($fbdata2 as $user_photos){

    foreach($user_photos as $photo){
       $item = array(
        'main' =>$photo['source'],
        'scaled' =>$photo['picture'],
        'time' =>$photo['created_time'],
        'platform' => 'Facebook'
        );
        array_push($collection, $item);
    }
}

function cmp($a, $b) {
        return strtotime($a["time"]) < strtotime($b["time"]);
}
usort($collection, "cmp");
printMedia($collection);

function printMedia($collection){
//print_r($collection);
if($_GET['limit'] == "no"){
    $limit = 100;
}else {
    $limit = $_GET['limit'];
}

// Setting both $x and $i to 0
$x = 0; // We need to foreach through the second array in the main array
$i = 0;

// Looping through the like collection which is an multidimensional array

foreach($collection as $user_photos){
    $x++;
    if ($user_photos['main']!=null){
    echo '<div id="Media">';
    echo '<img id="resize" src="'.$user_photos['main'].'" alt="" />';
    echo "</br> Uploaded on ";
    echo  date("jS F, Y",(strtotime($user_photos['time']) . "<br>"))."<br>";
    echo "From <b>".$user_photos['platform'];
    echo "</b>";
    echo '</div><br>';
    }
}

}

?>