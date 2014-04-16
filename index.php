<?php
	//start session
	session_start();
	include ('twitter/twitter.php');
	include ('instagram/index.php');
	include ('facebook/index.php');

	//just simple session reset on logout click
	if($_GET["reset"]==1){
		session_destroy();
		header('Location: ./index.php');
	}

	include_once("config.php");
	include_once("inc/twitteroauth.php");

?>
<html>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
	<head>
		<title>Social Integration Tool</title>
	</head>
	<body>
		<script src="scripts/jquery-2.1.3.js"></script>
    	<script src="scripts/process.js"></script>
		<div id="main">

		<?php

			echo '<div id="navigation">

			<ul id="nav">
                <li><a href="social">Social Feed</a></li>
                <li><a href="media">Media</a></li>
                <li></li><a  href="index.php?reset=1">logout</a>
            </ul>
				



			</div>';
			echo '<div id="connections">';
			echo '<div class="connectbox">';
			runInstagram();
			echo '</div><div class="connectbox">';
			runTwitter();
			echo '</div><div class="connectbox">';
		    runFB();
			echo '</div>';
			echo'<div style="clear: both;"></div></div>';
			echo '<div id="bodylayout">eddew</div>';

		
		?>
			</div>
	</body>
</html>
