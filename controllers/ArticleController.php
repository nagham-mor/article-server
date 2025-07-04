<?php 
// require(__DIR__ . "/../BaseController.php");
require_once(__DIR__ . "/../models/Article.php");
require_once(__DIR__ . "/../connection/connection.php");
require_once(__DIR__ . "/../services/ArticleService.php");
require_once(__DIR__ . "/../services/ResponseService.php");

class ArticleController {
    
    public function getAllArticles(){

        try{
            global $mysqli;
            $articles = Article::all($mysqli);
            $articles_array = ArticleService::articlesToArray($articles);
            echo ResponseService::success_response($articles_array);
            return;
        }catch(Exception $e){
            echo ResponseService::error_response($e->getessage());


        }
    }

    public function getSpecificArticle(){
        global $mysqli;
        $id = (int)$_GET['id'];
        $article = Article::find($mysqli, $id)->toArray();
        echo ResponseService::success_response($article);
        return;
    }

    public function addNewArticle(){
        global $mysqli;
         $data = [
        'name'        => $_GET['name']        ?? null,
        'author'      => $_GET['author']      ?? null,
        'description' => $_GET['description'] ?? null,
        'category_id' => $_GET['category_id'] ?? null
    ];
        $newArticle = Article::create($mysqli, $data);

        echo ResponseService::success_response(['insert'=>$newArticle]);
        return;

    }

    public function deleteAllArticles(){
        global $mysqli;
        $deleteAll = Article::deleteAll($mysqli);
        echo ResponseService::success_response(['delete_all'=>$deleteAll]);
        return;

    }

    public function deleteSpecificArticle(){
        global $mysqli;
        $id = $_GET['id'];
        $deleteSpecific = Article::delete($mysqli, $id);
        echo ResponseService::success_response(['delete_specific'=>$deleteSpecific]);
        return;
    }

    public function updateArticle(){
        global $mysqli;
         $data = [
        'id'          => $_GET['id']        ?? null,   
        'name'        => $_GET['name']        ?? null,
        'author'      => $_GET['author']      ?? null,
        'description' => $_GET['description'] ?? null,
        'category_id' => $_GET['category_id'] ?? null
    ];
        $updatedArticle = Article::create($mysqli, $data);

        echo ResponseService::success_response(['insert'=>$updatedArticle]);
        return;


    }

    public function getArticleByCategory(){
        global $mysqli;
        $categoryId =  $_GET['category_id'] ?? null;
        $articles = Article::findByCategory($mysqli, $categoryId);
        $articles_array = ArticleService::articlesToArray($articles);
        echo ResponseService::success_response($articles_array);
        return;
    }

}
       