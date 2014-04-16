 <?php

	include_once("config.php");
	include_once("inc/twitteroauth.php");


	if(isset($_SESSION['status']) && $_SESSION['status']=='verified') {	//Success, redirected back from process.php with varified status.
																			//retrive variables
		$screenname 		= $_SESSION['request_vars']['screen_name'];
		$twitterid 			= $_SESSION['request_vars']['user_id'];
		$oauth_token 		= $_SESSION['request_vars']['oauth_token'];
		$oauth_token_secret = $_SESSION['request_vars']['oauth_token_secret'];
				
		$_SESSION['twitter_user'] = $screenname;
		$_SESSION['twitter_id'] = $twitterid;

                    // $postfields = $this->getPostfields();
                     //echo $postfields;
		$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $oauth_token, $oauth_token_secret);
		$twitterPics = $connection->get('search/tweets', array('q'=>'from:'.$screenname.' filter:images','include_entities'=>1));
        $tweets =$connection->get('statuses/user_timeline');
        //print_r($tweets);
		global $connection;


	

	}
	function getTwitterPhotos(){		
		if(isset($_SESSION['status']) && $_SESSION['status']=='verified') {	
			//$collection = $connection->get('search/tweets', array('q'=>'from:'.$screenname.' filter:images','include_entities'=>1));
			return $connection;
		}else{
			return null;
		}
		

	}						
		
	
	function runTwitter(){

		echo '<div class="wrapper">';
				if(isset($_SESSION['status']) && $_SESSION['status']=='verified') {	
				echo '<h1>Login with Twitter</h1>';
				echo  'Twitter Username: ' . $_SESSION['twitter_user'] . '<br>';
				echo  'Twitter ID: ' . $_SESSION['twitter_id'] . '<br>';
				echo  '<a href="index.php?reset=1">Logout</a>';
				} else {
					echo '<h1>Login with Twitter</h1>';
				echo '<a href="twitter/process.php"><img src="images/sign-in-with-twitter-l.png" width="151" height="24" border="0" /></a>';
				}
		$r = getTwitterPhotos();
		echo '</div>';

}?>