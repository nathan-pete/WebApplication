<?php
	// Used for Capture the Flag GAME
	/*
	 * ["Robot_A", "Robot_B", "Robot_C", "Robot_D", "Robot_E", "Robot_F"]
	 *
	 * Requests send by the server to the robot
	 *
	 * /Stop - stops the robot
	 * /giveFlag - gives the flag to the robot (only to the robot supposed to have the flag)
	 * /[SSID]!SSIDSearchFor - sends the SSID the robot(s) have to search for (signal strength)
	 * /findFlag - robot has to start searching for the flag on the SSID it received
	 *
	 * Requests send from the robot to the server
	 *
	 * /?robotIP={ip address}&&request={request}
	 */
	
	function sendHTTPRequest($destination, $getRequest)
	{
		$url = curl_init("http://" . $destination . "/" . $getRequest); //  http://192.168.137.225/Request
		curl_exec($url);
		curl_close($url);
	}
	
	// "request received from the robot" => [Requests that have to be send to the robots]
	$SSID = "";
	$acceptedReq = [
	  "capturedFlag" => ["Stop", $SSID . "!SSIDSearchFor", "findFlag"],
	  "stopAll" => ["Stop"]
	];
	
	$robotIps = ["192.168.10.105", "192.168.10.106", "192.168.10.107", "192.168.10.108", "192.168.10.109", "192.168.10.110"];
	
	//sendHTTPRequest("192.168.137.122", "Robot_A!SSIDSearchFor");
	
	
	//echo $_SERVER["REQUEST_URI"];
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		if ($ipAddressReceived = filter_input(INPUT_GET, "robotIP", FILTER_VALIDATE_IP)) {
			if (
			  $request = filter_input(INPUT_GET, "request", FILTER_SANITIZE_FULL_SPECIAL_CHARS) and
			  $SSID_Received = filter_input(INPUT_GET, "ssid", FILTER_SANITIZE_FULL_SPECIAL_CHARS)
			) {
				$SSID = $SSID_Received;
				// based on the request the server gets from the robot, it sends the specific set of get requests
				foreach ($acceptedReq as $reqToExecute => $arrayWithRequests) {
					// Only execute the set of requests, based on the request received from the robot
					if ($reqToExecute == $request) {
						foreach ($arrayWithRequests as $req) {
							// Sending requests to all the robots, other than the one that send the initial get request
							foreach ($robotIps as $ip) {
								if ($ip != $ipAddressReceived) {
									sendHTTPRequest($ip, $req);
								}
							}
						}
					}
				}
				sendHTTPRequest($ipAddressReceived, "giveFlag");
			}
			
		}
	}
	
