<?php 
require("../connection/connection.php");

class CategoriesSeeders{

    public function insertCategories(){
        
        global $mysqli;
        $query = "INSERT INTO categories (name) VALUES
                ('Technology'),('Health'),('Sports'),('Science'),('Entertainment')";

        $execute = $mysqli->prepare($query);
        $execute->execute();
    }
}
?>
 