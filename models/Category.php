<?php
require_once("Model.php");

class Category extends Model{

    private int $id;
    private string $name;

    protected static string $table = "categories";


    public function __construct(array $data){
        $this->id = $data["id"];
        $this->name = $data["name"];
    }

    public function toArray(){
        return [$this->id , $this->name];
    }

    
}