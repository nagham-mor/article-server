<?php 

require(__DIR__ . "/../models/Article.php");
require(__DIR__ . "/../connection/connection.php");

class ArticleController{

    public function getAllArticles(){
        $response = [];
        $response["status"] = 200;

        if(!isset($_GET["id"])){
            $articles = Article::all($mysqli); //reminder: this is an array of OBJECTS!!!!

            $response["articles"] = []; //json_encode DOES NOT read private attributes!!!
            foreach($articles as $a){
                $response["articles"][] = $a->toArray(); //hence, we decided to iterate again on the articles array and now to store the result of the toArray() which is an array. 
            }
            echo json_encode($response); //now we can call json_encode on array of arrays. 
            return;
        }

        $id = $_GET["id"];
        $article = Article::find($mysqli, $id);
        $response["article"] = $article->toArray();

        echo json_encode($response);
        return;
    }


}