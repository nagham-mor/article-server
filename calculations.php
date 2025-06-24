<?php 
$response = [];
$response["status"] = 200;

if(isset($_GET["x"])){
    $x = $_GET["x"];
}else{
    $response["status"] = 400;
    $response["response"] = "Don't try to mess around bro ;) ";
    echo json_encode($response);
    return;
}

if(isset($_GET["y"])){
    $y = $_GET["y"]; 
}else{
    $y = 10;
} 

$z = $y - $x;


$response["response"] = $z; 
echo json_encode($response);

