# aobws_demo
ArOZ Online Base WebSocket API demo using ao_module.js

## Installation 
1. cd into the ArOZ Online Root (aor). In most case, it is under /var/www/html/AOB.
2. Clone the repo using ```git clone https://github.com/aroz-online/aobws_demo```
3. Launch the module using ArOZ Online launch menu.

## Usage
1. Press "Connect to Server"
2. Authorize the module to use websocket by pressing "Confirm" (blue button)
3. If auth success, the page will refresh. Click Connect to Server again.
4. "202 Accepted" will then be shown on the receive display follwoing by the connection UUID.

To access the websocket conncetion object itself and the connection uuid, you can call to the ```window.aobws``` and ```window.aobwsUUID``` object.

## Tips
You will need to run the aobws service before testing this demo. You can find the binary for the aobws located under ```AOR/systemAOB/system/aobws/aobws*```, where the star indicate your platform and binary file extension.
