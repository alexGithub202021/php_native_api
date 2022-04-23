<?php

if (isset($_POST['submit'])) {
	$name = $_POST['name'];

	// $url = "http://localhost/RestAPI/api/" . $name;
	$url = "http://localhost/RestAPI/api.php?name=" . $name; // wo rewriteURL
	// $url = "http://localhost:85/api/users";
	$result = callApi($url);

	if ($result->data != '')
		echo "Product: " . $name . ", price: " . $result->data . "$";
	else
		echo $result->status_message;
}

function callApi($url)
{
	$client = curl_init($url);
	curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($client);

	return json_decode($response);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Rest API Client Side Demo</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

	<div class="container">
		<h2>Rest API Client Side Demo</h2>
		<form class="form-inline" action="#" method="POST">
			<div class="form-group">
				<label for="name">Name</label> <input type="text" name="name" class="form-control" placeholder="Enter Product Name" required />
			</div>
			<button type="submit" name="submit" class="btn btn-default">Submit</button>
		</form>
	</div>
</body>

</html>