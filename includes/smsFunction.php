<?php
// Be sure to include the file you've just downloaded
require_once 'AfricasTalkingGateway.php';
// Specify your authentication credentials
$username   = "phious";
$apikey     = "atsk_514e8c3bc0a324383592ce0e16138a54dd9d865332eded60e7d49b98fc011165e468f486";

$gateway    = new AfricasTalkingGateway($username, $apikey);

function sendsms($recipients, $message){
try 
{ 
  // Thats it, hit send and we'll take care of the rest. 
  $results = $gateway->sendMessage($recipients, $message);
            
  foreach($results as $result) {
    // status is either "Success" or "error message"
    echo " Number: " .$result->number;
    echo " Status: " .$result->status;
    echo " MessageId: " .$result->messageId;
    echo " Cost: "   .$result->cost."\n";
  }
}
catch ( AfricasTalkingGatewayException $e )
{
  echo "Encountered an error while sending: ".$e->getMessage();
}
// DONE!!! 
}
?> 