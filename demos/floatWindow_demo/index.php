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
 <h1>This is a Float Window API demo.</h1>
 <p>You are now browsing at <span id="displayMode"></span> Mode.<p>
 <p>Current window ID: <span id="windowID"></span></p>
<div>
<script>
//Check if the current environment is under Virtual (Web) Desktop Interface.
if (ao_module_virtualDesktop){
	//Browsing this page as Virtual Desktop Windows (aka FloatWindow).
	$("#displayMode").text("Float Window");
	
	//Get the window ID of the current window object (Something similar to process ID if you are into Linux :P )
	$("#windowID").text(ao_module_windowID);
	
	//Change window icon to "leaf", see the icon list at https://tocas-ui.com/elements/icon/ 
	ao_module_setWindowIcon("leaf");
	
	//Change window title to "Hello Float Window"
	ao_module_setWindowTitle("Hello Float Window");
	
	//Set window to transparent and handle background styling on this document instead.
	ao_module_setGlassEffectMode();
	
	//Set window to fixed size and not allow resizing
	ao_module_setFixedWindowSize();
	
	//Set window size to the given value
	ao_module_setWindowSize(400,600);
	
}else{
	//Browsing this page as a normal browser tab
	$("#displayMode").text("Default (Website)");
}
</script>
</body>
</html>