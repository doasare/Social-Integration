
		<?php
			/**
			* Instagram PHP API
			* 
			* @link https://github.com/cosenary/Instagram-PHP-API
			* @author Christian Metz
			* @since 01.10.2013
			*/
			require 'src/Instagram.php';
			use MetzWeb\Instagram\Instagram;
			// initialize class
			$instagram = new Instagram(array(
			'apiKey'      => '78ecdff045db4b5180a2be34e80f4976',
			'apiSecret'   => '21455203965f49cfaa9dc8bc5b79a522',
			'apiCallback' => 'http://localhost:8888//social-integration/instagram/success.php' // must point to success.php
			));
			// receive OAuth code parameter
			$code = $_GET['code'];

			//$instagram = new Instagram('3bb0d19996d84c40a850d733d637ac3f');
			$instaPics= $instagram->getUserMedia( $_SESSION[insta_id], 100 );
			//echo json_encode( $instaPics );



					function runInstagram(){
						global $instagram;
						echo '<h1>Login with Instagram</h1>';
						$code = $_GET['code'];
						if($_GET["reset"]==1){
							session_destroy();

							// Display the login button
							$loginUrl = $instagram->getLoginUrl();
							echo "<a class=\"button\" href=\"$loginUrl\">Sign in with Instagram</a>";
						} else if (!empty($_SESSION['userdetails'])) {
					 		echo 'Instagram Username: ' . $_SESSION[insta_user] . '<br>';
					 		echo 'Instagram Name: ' . $_SESSION[insta_user] . '<br>';
							echo 'Instagram ID: ' . $_SESSION[insta_id] . '<br>';
							echo '<a href="index.php?reset=1">Logout</a>';


					 	}else{
					 		$loginUrl = $instagram->getLoginUrl();
					 		echo "<a class=\"button\" href=\"$loginUrl\">Sign in with Instagram</a>";

					 	}

					}
			






















		// function runInstagram(){
		// 	echo '<h1>Login with Instagram</h1>';
		// 		require 'instagram.class.php';
		// 		require 'instagram.config.php';
		// 	$code = $_GET['code'];
		// 	$data = $instagram->getOAuthToken($code);
		// 	$d2=$instagram->getPopularMedia();
		// 	print_r($d2);
		// 	session_start();
		// 	if($_GET["reset"]==1){
		// 		session_destroy();

		// 		// Display the login button
		// 		$loginUrl = $instagram->getLoginUrl();
		// 		echo "<a class=\"button\" href=\"$loginUrl\">Sign in with Instagram</a>";
		// 	}
		// 	else if (!empty($_SESSION['userdetails'])) {
		// 		echo '$_SESSION["insta_user"]: ' . $_SESSION[insta_user] . '<br>';
		// 		echo '$_SESSION["insta_name"]: ' . $_SESSION[insta_user] . '<br>';
		// 		echo '$_SESSION["insta_id"]: ' . $_SESSION[insta_id] . '<br>';
		// 		echo '<a href="index.php?reset=1">Logout</a>';

		// 	}
		// 	else{

		// 		// Display the login button
		// 		$loginUrl = $instagram->getLoginUrl();
		// 		echo "<a class=\"button\" href=\"$loginUrl\">Sign in with Instagram</a>";
		// 		//echo '<a href="'.$loginUrl.'"><img src="instagram/instagram-login-button.png" width="151" height="24" border="0" /></a>';

		// 	}
		// }
		?>

