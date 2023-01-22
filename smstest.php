<!DOCTYPE html>
<html lang="en">
<head>
  <title>Send SMS in Php</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<?php
if(isset($_POST['submit'])){
 $mobile='91'.$_POST['mobileplus'];
 $message=$_POST['message'];
}

	// Account details
	$apiKey = urlencode('NGE1YTYxNGM0MjY2NDc0NTM5NDczNTMzNDk0NDMwNmQ=');
	
	// Message details
	$numbers = array($mobile);
	$sender = urlencode('TXTLCL');
	$message = rawurlencode($message);
 
	$numbers = implode(',', $numbers);
 
	// Prepare data for POST request
	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 
	// Send the POST request with cURL
	$ch = curl_init('https://api.textlocal.in/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	echo $response;

?>


<div class="container sm">
  <h2 class="text-center">SMS Form</h2>
  <form action="" method="POST">
    <div class="form-group">
      <label for="Mobile">Mobile Number:</label>
      <input type="number" class="form-control" placeholder="Please enter sender number" name="mobileplus">
    </div>
    <div class="form-group">
      <label for="pwd">Type Your Messege:</label>
      <textarea name="message" class="form-control" placeholder="Enter Messege"> </textarea>
</div>
    
    <button type="submit" name="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
