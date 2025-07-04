<?php 
// require(__DIR__ . "/../BaseController.php");
require_once(__DIR__ . "/../models/Category.php");
require_once(__DIR__ . "/../connection/connection.php");
require_once(__DIR__ . "/../services/CategoryService.php");
require_once(__DIR__ . "/../services/ResponseService.php");

class CategoryController{
    
    public function getAllCategories(){
        global $mysqli;
        $categories = Category::all($mysqli);
        $categories_array = CategoryService::categoriesToArray($categories);
        echo ResponseService::success_response($categories_array);
        return;
    
    }

    public function getSpecificCategory(){
        global $mysqli;
        $id = $_GET["id"];
        $categories_array = Category::find($mysqli, $id)->toArray();
        echo ResponseService::success_response($categories_array);
        return;
    }

    public function addNewCategory(){
        global $mysqli;
        $data = [
        'name'        => $_GET['name']        ?? null];
        $newCategory = Category::create($mysqli, $data);
        echo ResponseService::success_response(['insert'=>$newCategory]);
        return;

        
    }

    public function deleteAllCategories(){
        global $mysqli;
        $deleteAll = Category::deleteAll($mysqli);
        echo ResponseService::success_response(['delete_all'=>$deleteAll]);
        return;
    }

    public function deleteSpecificCategory(){
        global $mysqli;
        $id = $_GET['id'];
        $deleteSpecific = Category::delete($mysqli, $id);
        echo ResponseService::success_response(['delete_specific'=>$deleteSpecific]);
        return;
    }

    public function updateCategory(){
        global $mysqli;
         $data = [
         'id'        => $_GET['name']        ?? null,   
        'name'        => $_GET['name']        ?? null
        ];
        $updatedCategory = Category::create($mysqli, $data);
        echo ResponseService::success_response(['insert'=>$updatedCategory]);
        return;

    }

    public function getCategoryByArticle(){
    global $mysqli;

    $articleId = isset($_GET['article_id']) ? (int)$_GET['article_id'] : null;
    $article = Article::find($mysqli, $articleId)->toArray();
    $category = Category::find($mysqli, $article->category_id);
    echo ResponseService::success_response($category->toArray());
    return;
}


}
       

