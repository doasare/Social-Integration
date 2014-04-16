// JavaScript Document
$(document).ready(function() {
    $('#bodylayout').load('content/profile.php');
	
	$('ul#nav li a').click(function(){

		var page = $(this).attr('href');	
		$('#bodylayout').load('content/'+page+'.php');
		return false;	
	});
	 
	window.onload = function() {      
	return "Dude, are you sure you want to leave? Think of the kittens!";
	  
	}
	
});