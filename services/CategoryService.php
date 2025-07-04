<?php 

class CategoryService {

    public static function categoriesToArray($categories_array){
        $results = [];

        foreach($categories_array as $c){
             $results[] = $c->toArray(); 
        } 

        return $results;
    }



}