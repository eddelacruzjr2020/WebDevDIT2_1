<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://jsonplaceholder.typicode.com/todos");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

curl_close($ch);

$data = json_decode($response, true);

if($data == null){
    die("Failed to decode JSON. Response was". $response);
}

for($i=0; $i<20; $i++){
    echo "Todo #". $data[$i]["id"]. ":" .$data[$i]["title"]. ":".$data[$i]["completed"]. "<br>";
}

?>
