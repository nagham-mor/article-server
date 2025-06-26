<?php
class Article{

    private int $id; 
    private string $name; 
    private string $author; 
    private string $description; 

    public function __construct(int $id, string $name, string $author, string $description){
        $this->id = $id;
        $this->name = $name;
        $this->author = $author;
        $this->description = $description;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getAuthor(): string {
        return $this->author;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function setName(string $name){
        $this->name = $name;
    }

    public function setAuthor(string $author){
        $this->author = $author;
    }

    public function setDescription(string $description){
        $this->description = $description;
    }

    public function toArray(){
        return [$this->id, $this->name, $this->author, $this->description];
    }

    public function fetchFromDatabase($mysqli, int $id){
        $query = $mysqli->prepare("SELECT * from articles where id = ?");
        $query->bind_param("i", $id); 
        $query->execute();
        $array = $query->get_result();
        $data = $array->fetch_assoc();
        return new Article($data["id"], $data["name"], $data["author"], $data["description"]);
    }

}
