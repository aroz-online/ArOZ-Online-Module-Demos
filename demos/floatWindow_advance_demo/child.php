<?php
include_once('../auth.php');
?>
<html>
<head>
    <link rel="stylesheet" href="../script/tocas/tocas.css">
	<script src="../script/tocas/tocas.js"></script>
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
<div class="ts container">
	<h3>Advance demo for FloatWindow API (Child process)</h3>
	<div class="ts segment">
		<p>This window ID: <span id="windowID"></span></p>
		<p>Parent window ID: <span id="parentID"></span></p>
		<br>
		<p>Click to send "Hello World" to parent window </p>
		<div class="ts fluid input">
			<input id="inputBox" type="text" placeholder="Type something to send" value="Hello World">
		</div>
		<br><br>
		<button class="ts button" onClick="sendMessage();">Send Message</button>
	</div>
</div>
<script>
//Send a message to the parent Window Object
function sendMessage(){
	
	//Send the input data as ONE JSON OBJECT to the parent callback function
	ao_module_parentCallback({msg:$("#inputBox").val()});
}

//Check if this is open under VDI mode. Only show information when it is under VDI mode.
if (ao_module_virtualDesktop){
	$("#windowID").text(ao_module_windowID);
	$("#parentID").text(ao_module_parentID);
}
</script>
</body>
</html>