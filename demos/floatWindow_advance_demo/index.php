<?php
//ArOZ Online basic authentication services for module. 
//It is located at ArOZ Online Root (aka ../) of the module root.
include_once('../auth.php');
?>
<html>
<head>
	<!-- System default css. See more at: https://tocas-ui.com/-->
    <link rel="stylesheet" href="../script/tocas/tocas.css">
	<script src="../script/tocas/tocas.js"></script>
	<!-- ao_module is the API wrapper for ArOZ Online. It requires jquery to work. So you must include jquery here.-->
	<script src="../script/jquery.min.js"></script>
	<script src="../script/ao_module.js"></script>
	<style>
		body{
			background-color:rgba(255,255,255,0.8);
		}
	</style>
	</head>
<body>
<br>
<!-- To get started, we create a div container for the content of our webpage.-->
<div class="ts container">
	<h3>Advance demo for FloatWindow API</h3>
	<span id="err">Please launch this in Virtual Desktop Mode to continue the demo.</span>
	<div id="control" class="ts segment">
		<p>This window ID: <span id="parentID"></span></p>
		<p>Click the button below to start a child process and return value to this window object.</p>
		<button class="ts button" onClick="spawnChildProcess();">Launch Child Process</button>
		<p>Received Message: </p>
		<div id="receivedMessage" class="ts segment">
		
		</div>
	</div>
<div>
<script>

//Function to spawn a child process
function spawnChildProcess(){
	//Get a random UUID using ao_module utils function
	var uid = ao_module_utils.getRandomUID();
	
	//Create a new floatWindow object 
	ao_module_newfw('floatWindow_advance_demo/child.php','Child Window (demo)','child',uid,475,700,undefined,undefined,undefined,undefined,null,"receivedMessage");
}

//Callback function for child to send data to
function receivedMessage(data){
	
	//All data transfered are in JSON. It needed to be parsed before used
	object = (JSON.parse(data));
	
	//Append the message to div in the main body
	$("#receivedMessage").append("<p>" + object.msg + "</p>");
}

//Check if the current environment is under Virtual (Web) Desktop Interface.
if (ao_module_virtualDesktop){
	$("#err").hide();
	$("#parentID").text(ao_module_windowID);
}else{
	//Browsing this page as a normal browser tab
	$("#err").show();
	$("#control").hide();
}

</script>
</body>
</html>