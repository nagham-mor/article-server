<?php 
require("../models/Article.php");
require("../models/User.php");
require("../connection/connection.php");

$response = [];
$response["status"] = 200;
$response["articles"] = [];

if(isset($_GET["id"])){
    $id = $_GET["id"];

    $article = Article::find($mysqli, $id);
    $user = User::find($mysqli, 2);

    /*$article = new Article();
    $article->update($mysqli, $id);*/

    $response["article"] = $article->toArray();
    $response["user"] = $user->toArray();

    echo json_encode($response);
    return;
}












$query = $mysqli->prepare("SELECT * from articles");
$query->execute();

$array = $query->get_result();

$articles = []; //temp array to store the articles from the db
while($article = $array->fetch_assoc()){
    $articles[] = $article;
}

$response["articles"] = $articles;
echo json_encode($response);