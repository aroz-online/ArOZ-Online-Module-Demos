<?php
include_once '../auth.php';
function getCurrentDirectory() {
	$path = dirname($_SERVER['PHP_SELF']);
	$position = strrpos($path,'/') + 1;
	return substr($path,$position);
}

?>
<html>
<body>
Now Loading...
<div id="moduleName" style="display:none;"><?php echo getCurrentDirectory();?></div>
<script src="../script/jquery.min.js"></script>
<script src="../script/ao_module.js"></script>
<script>
//Get module name from PHP echo using a hidden DIV
var moduleName = $("#moduleName").text().trim();
/*
Start a new floatwindow to launch the demo. You can change "Float Window Demo" to your window title.
You can also ignore this and change the title, icons and window size in the index.php javascript section.

This part was kept due to the compatibility issue of older versions of ArOZ Online Systems.
*/
ao_module_newfw(moduleName + "/index.php",'File Selector Demo','folder open',ao_module_utils.getRandomUID(),475,700);
</script>
</body>
</html>