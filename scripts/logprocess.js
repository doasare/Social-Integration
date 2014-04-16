// JavaScript Document
$(document).ready(function() {
    
	
	$("ul#na a").click(function(){
		$('#lower').load('content/reg.php');
		return false;
	});
	
	//$('#register').live('click', function() {
    //$.get('api.php?functionName=test&inputvar=something');

    //return false;
	//});
	
});
