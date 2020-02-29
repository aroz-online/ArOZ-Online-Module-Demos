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
	</head>
<body>
<br>
<!-- To get started, we create a div container for the content of our webpage.-->
<div class="ts container">
 <h1>Hello World! Welcome to ArOZ Online System!</h1>
 <p>This is the main UI for your module. You can launch it via launch menu or via the grid menu as a normal website. <br>
 Current timestamp: <?php 
 //You can use php function call anywhere you want
 echo time(); ?><p>
<div>
<script>

</script>
</body>
</html>