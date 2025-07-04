<?php
require_once("Model.php");

class Article extends Model{

    private int $id; 
    private string $name; 
    private string $author; 
    private string $description; 
    private int $category_id; 

    protected static string $table = "articles";

    public function __construct(array $data){
        $this->id = $data["id"];
        $this->name = $data["name"];
        $this->author = $data["author"];
        $this->description = $data["description"];
        $this->category_id = $data["category_id"];

    }

    public function toArray(){
        return [$this->id, $this->name, $this->author, $this->description, $this->category_id];
    }

    public static function findByCategory(mysqli $mysqli, int $category_id){
        $sql = sprintf("Select * from %s WHERE  category_id = ?", 
                        static::$table);
        
        $query = $mysqli->prepare($sql);
        $query->bind_param("i", $category_id);

        $query->execute();

        $data = $query->get_result();

        $objects = [];
        while($row = $data->fetch_assoc()){
            $objects[] = new static($row); 
        }

        return $objects;
    }
}

    


?>
