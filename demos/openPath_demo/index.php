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
<div class="ts container">
	<h3>Path Opening Demo</h3>
	<p>Please run this demo under Virtual Desktop Environment as a Float Window</p>
	<div class="ts segment">
		<h4>Open Files</h4>
		<p>Open the media files with default ArOZ Online Modules</p>
		<button class="ts button" onClick="openExampleFiles(0);">Open Image</button>
		<button class="ts button" onClick="openExampleFiles(1);">Open Video</button>
		<button class="ts button" onClick="openExampleFiles(2);">Open Text</button>
	</div>
	<div class="ts segment">
		<h4>Open Path</h4>
		<p>Open the folder containing the media files</p>
		<button class="ts button" onClick="openExampleFiles(3);">Open Path</button>
	</div>
	<div class="ts segment">
		<h4>Open Module</h4>
		<p>Launch a module with its path</p>
		<button class="ts button" onClick="openExampleFiles(4);">Open Audio Module</button>
	</div>
	<div class="ts segment">
		<h4>Open Path as FloatWindow</h4>
		<p>Directly launching a path in FloatWindow (Not recommended)</p>
		<button class="ts button" onClick="openExampleFiles(5);">Open path in floatWindow</button>
	</div>
<div>
<script>
function openExampleFiles(media){
	if (media == 0){
		//Open an image
		ao_module_openFile("openPath_demo/files/image.png","image.png");
	}else if (media == 1){
		//Open a video
		ao_module_openFile("openPath_demo/files/big_buck_bunny.webm","big_buck_bunny.webm");
	}else if (media == 2){
		//Open a text file
		ao_module_openFile("openPath_demo/files/text.txt","text.txt");
	}else if (media == 3){
		//Open a path using file explorer
		ao_module_openPath("openPath_demo/files");
	}else if (media == 4){
		//Open the Audio module with its pathname
		ao_module_launchModule("Audio");
	}else{
		//Direct opening of resources in floatWindow object, not recommended
		ao_module_newfw('openPath_demo/files/text.txt','Direct Open Demo','sticky note outline','openPath_demo_directOpenDemo',475,700);
	}
}
</script>
</body>
</html>