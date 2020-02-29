<?php
include_once '../auth.php';
?>
<html>
<head>
    <link rel="stylesheet" href="../script/tocas/tocas.css">
	<script src="../script/tocas/tocas.js"></script>
	<script src="../script/jquery.min.js"></script>
	<script src="../script/ao_module.js"></script>
	</head>
<body>
<br><br>
<div class="ts container">
<h1>Demo for using ao_module_ws (aobws) Websocket</h1>
<p id="rec">Received content will be displayed below: <br></p>
<div class="ts fluid input">
    <input id="intext" type="text" placeholder="Command / Text">
</div>
<br><br>
<button class="ts button" onClick="connect();">Connect to Server</button>
<button id="sendbtn" class="ts disabled button" onClick="sendws();">Send</button>
<p>
How to use the demo?<br>
1. Press "Connect to Server" <br>
2. Authorize the module to use websocket by pressing "Confirm" (blue button)<br>
3. If auth success, the page will refresh. Click Connect to Server again.<br>
4. "202 Accepted" will then be shown on the receive display above follwoing by the connection UUID. 
</p>
</div>

<script>

function connect(){
	/*
	ao_module_ws.init() -- parameter as follows:
	1. ArOZ Online Root (aor, usually ../), 
	2. module name (must match with your module directory, no space allowed)
	3. websocket server address
	4. channel (Can be any string without space)
	5. auth failed callback (function())
	6. onopen callback (function(evt))
	7. onmessage callback(function(data))
	8. onclose callback (function(evt))
	9. onerror callback (function(evt))
	
	The websocket connection object can be accessed via 
	window.aobws
	
	The UUID of this connection can be accessed via 
	window.aobwsUUID
	
	*/
	
	var server = window.location.host;
	if (server.includes(":")){
		server = window.location.host.split(":")[0]; //To handle cases like 192.168.0.100:8080
	}
	
	ao_module_ws.init("../","aobws_demo","ws://" + server + ":8000/ws","test","",
	function(){
		//Failed callback (aka cannot get auth from user)
		alert("User cancelled the auth process.");
	},
	function(data){
		//Onopen function
		console.log(data);
	},
	function(data){
		//Onmessage function
		$("#rec").append(data.data + "<br>");
		console.log(data);
	}, function(data){
		//On close function
		console.log("Connection Closed");
	},function(data){
		//On error function
		console.log("Oops something went wrong.")
	});
	
	//Remove the disable on send button
	$("#sendbtn").removeClass("disabled");
}

function sendws(){
	var dataToBeSent = $("#intext").val();
	//You can also send object e.g.
	//var dataToBeSent = {"name": "TC", "gender": "Unknown"};
    
    ao_module_ws.send(window.aobws,dataToBeSent);
    $("#intext").val("");
    
}



</script>
</body>
</html>