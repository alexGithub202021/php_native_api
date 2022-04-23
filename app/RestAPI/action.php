<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    
    // $url = "http://localhost/RestAPI/api/" . $name;
	$url = "http://localhost/RestAPI/api.php?name=" . $name;
    
    $client = curl_init($url);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($client);

    // var_export($response);
    
    $result = json_decode($response);
    
    if ($result->data != '')
        echo "Product: ".$name.", price: ".$result->data."$";
    else    
        echo $result->status_message;
}
?>