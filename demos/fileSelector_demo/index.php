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
	<h3>File Selector Demo</h3>
	<div class="ts segment">
		<h4>Select File Demo</h4>
		<p>Selected Filename: <span id="selectedFilename"></span></p>
		<p>Selected Filepath: <span id="selectedFilepath"></span></p>
		<button class="ts button" onClick="selectFile();">Select File</button>
	</div>
	<div class="ts segment">
		<h4>New File Demo</h4>
		<p>New Filename: <span id="newFilename"></span></p>
		<p>New Filepath: <span id="newFilepath"></span></p>
		<button class="ts button" onClick="newFile();">Create New File Location</button>
	</div>
<div>
<script>
//There are two type of file selector. You have to choose the corret one in order for the system to works.
function selectFile(){
	
	//Use a fixed uid instead of getting uid using ao_module_util can make sure there are only one isntance of fileSelector opened in VDI mode
	var uid = "fileSelector_demo_oneinstanceselector";
	
	//Set window size paramter. Leave it as undefine for default value.
	var width = undefined;
	var height = undefined;
	
	//Allow user to select multiple files or not.
	var allowMultipleSelection = false;
	
	//Which type of object the user is allow to choose (file / folder / mix)
	var selectionType = "file";
		
	//Check if we should open file selector in VDI mode or Website Mode.
	if (ao_module_virtualDesktop){
		
		//Open FileSelector using FloatWindow
		ao_module_openFileSelector(uid,"addFileFromSelector",width,height,allowMultipleSelection,selectionType);
		
	}else{
		
		//Open FileSelector using another browser tab
		//The 2nd paramter is the aor (ArOZ Online Root). In most case it is at ../ of your module root.
		ao_module_openFileSelectorTab(uid, "../",allowMultipleSelection,selectionType,addFileFromSelector);
	}
}

//Create newfile method is similar to fileSelector. It also involve two type of opening method.
//However, this function will not create a file for you. It just return the path for the desired new file location
function newFile(){
	//Use a fixed uid instead of getting uid using ao_module_util can make sure there are only one isntance of fileSelector opened in VDI mode
	var uid = "fileSelector_demo_oneinstancenewfile";
	
	//Set window size paramter. Leave it as undefine for default value.
	var width = undefined;
	var height = undefined;
	
	//This must set to false when creating new file
	var allowMultipleSelection = false;
	
	//Type must set to new when creating a new file / folder path.
	var selectionType = "new";
	
	//If the new file user UMFilename encoding instead of non-encoded. Set this to true if your module is expecting to support Windows.
	var useUMF = true;
	
	//Default filename for the creation process.
	var defaultFilename = "helloworld.txt";
	
	//Check if we should open file selector in VDI mode or Website Mode.
	if (ao_module_virtualDesktop){
		
		//Open FileSelector using FloatWindow
		ao_module_openFileSelector(uid,"newFileFromSelector",width,height,allowMultipleSelection,selectionType,defaultFilename,useUMF);
		
	}else{
		
		//Open FileSelector using another browser tab
		//The 2nd paramter is the aor (ArOZ Online Root). In most case it is at ../ of your module root.
		ao_module_openFileSelectorTab(uid, "../",allowMultipleSelection,selectionType,newFileFromSelector,defaultFilename,useUMF);
	}
}


//Function for fileSelector to callback
function addFileFromSelector(fileData){
	result = JSON.parse(fileData);
	for (var i=0; i < result.length; i++){
		var filename = result[i].filename;
		var filepath = result[i].filepath;
		
		$("#selectedFilename").text(filename);
		$("#selectedFilepath").text(filepath);
	}
}

//Function for newFile function callback
function newFileFromSelector(fileData){
	result = JSON.parse(fileData);
	for (var i=0; i < result.length; i++){
		var filename = result[i].filename;
		var filepath = result[i].filepath;
		
		$("#newFilename").text(filename);
		$("#newFilepath").text(filepath);
	}
}


</script>
</body>
</html>