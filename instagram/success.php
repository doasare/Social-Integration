<?php
		session_start();
		//error_reporting(E_ALL); ini_set('display_errors', 'On'); 

		require 'src/Instagram.php';
		use MetzWeb\Instagram\Instagram;
		// initialize class
		$instagram = new Instagram(array(
		'apiKey'      => '78ecdff045db4b5180a2be34e80f4976',
		'apiSecret'   => '21455203965f49cfaa9dc8bc5b79a522',
		'apiCallback' => 'http://localhost:8888//social-integration/instagram/success.php' // must point to success.php // must point to success.php
		));
		// receive OAuth code parameter
		$code = $_GET['code'];


	// Check whether the user has granted access
	if (true === isset($code)) {
		// Receive OAuth token object
		$data = $instagram->getOAuthToken($code);
		$result = $instagram->getUserMedia();
		// Take a look at the API response
		if(empty($data->user->username)){
			header('Location: ../index.php');
		}
		else{
			$_SESSION['userdetails']=$data;
			$user=$data->user->username;
			$_SESSION[insta_user] = $user;
			$fullname=$data->user->full_name;
			$_SESSION[insta_name] = $fullname;
			$bio=$data->user->bio;
			$website=$data->user->website;
			$id=$data->user->id;
			$_SESSION[insta_id] = $id;
			$token=$data->access_token;
			header('Location: ../index.php') or die("flop");
			exit();
		}
	} 

	else{
		// Check whether an error occurred
		if (true === isset($_GET['error'])) {
			echo 'An error occurred: '.$_GET['error_description'];
		}	
	}
?>
