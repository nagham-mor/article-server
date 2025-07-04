<?php 
$apis = [

    //articles
    '/get_all_articles'        => ['controller' => 'ArticleController', 'method' => 'getAllArticles'],

    '/get_specific_article'    => ['controller' => 'ArticleController', 'method' => 'getSpecificArticle'],

    '/add_new_article'         => ['controller' => 'ArticleController', 'method' => 'addNewArticle'],

    '/delete_all_articles'     => ['controller' => 'ArticleController', 'method' => 'deleteAllArticles'],
    
    '/delete_specific_article' => ['controller' => 'ArticleController', 'method' => 'deleteSpecificArticle'],

    '/update_article'          => ['controller' => 'ArticleController', 'method' => 'updateArticle'],

    '/get_article_by_category'          => ['controller' => 'ArticleController', 'method' => 'getArticleByCategory'],


    //categories

    '/get_all_categories'       => ['controller' => 'CategoryController', 'method' => 'getAllCategories'],

    '/get_specific_category'    => ['controller' => 'CategoryController', 'method' => 'getSpecificCategory'],

    '/add_new_category'         => ['controller' => 'CategoryController', 'method' => 'addNewCategory'],

    '/delete_all_categories'    => ['controller' => 'CategoryController', 'method' => 'deleteAllCategories'],

    '/delete_specific_category' => ['controller' => 'CategoryController', 'method' => 'deleteSpecificCategory'],

    '/update_category'          => ['controller' => 'CategoryController', 'method' => 'updateCategory'],

    '/get_category_by_article' => ['controller'=>'CategoryController','method'=>'getCategoryByArticle'],




    '/login'         => ['controller' => 'AuthController', 'method' => 'login'],
    '/register'         => ['controller' => 'AuthController', 'method' => 'register'],

];

