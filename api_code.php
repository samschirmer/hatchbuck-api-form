<?php

#######################################################
#
#	This is an example of using the Hatchbuck API
#	to post form data to a Hatchbuck database 
#	using PHP/cURL. Make sure to read the docs at
#	https://hatchbuck.freshdesk.com/support/solutions/articles/5000578765-hatchbuck-api-documentation
#
#######################################################

# Grabbing variables from form
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$emailAddress = $_POST["emailAddress"];

# Setting necessary values
$api_key = "EnterKeyHere";	# ENTER API KEY BETWEEN QUOTES
$emailType = "Work";
$status = "Customer";

# Setting APU URL
$url = "https://api.hatchbuck.com/api/v1/contact?api_key=$api_key";

# This is the main array to be sent. See API documentation for different data type structures.
# https://hatchbuck.freshdesk.com/support/solutions/articles/5000578765-hatchbuck-api-documentation 
$data = array("emails" => array(array("address" => $emailAddress, "type" => $emailType)), "status" => array("name" => $status), "firstName" => $firstName, "lastName" => $lastName);

# Making it a JSON
$data_string = json_encode($data);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
 "Content-Type: application/json",
 "Content-Length: " . strlen($data_string))
);

# Removing this line will throw SSL verify error
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
 
$result = curl_exec($ch);
 
if (curl_errno($ch)) {
	print curl_error($ch);
} else {
	curl_close($ch);
}

# This echo is to see what we have received from Api Call. 
# You can also check the API logs in your Hatchbuck account:
# Account Settings -> Web API -> View Logs
echo $result; 

# Comfortable with the result? Set your redirect here. 
header("Location: thanks.html");

?>
