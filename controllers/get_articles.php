<?php 
require("../connection/connection.php");
$response = [];
$response["status"] = 200;
$response["articles"] = [];

$query = $mysqli->prepare("SELECT * from articles");

if(isset($_GET["id"])){
    $id = $_GET["id"];
    $query = $mysqli->prepare("SELECT * from articles where id = ?");
    $query->bind_param("i", $id); //prevent SQL Injection
}

$query->execute();

$array = $query->get_result();
$articles = []; //temp array to store the articles from the db
while($article = $array->fetch_assoc()){
    $articles[] = $article;
}

$response["articles"] = $articles;
echo json_encode($response);