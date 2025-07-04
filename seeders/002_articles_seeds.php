<?php 
require("../connection/connection.php");

class ArticlesSeeders{

    public function insertArticles(){
        
        $query = "INSERT INTO articles (name, author, description, category_id) VALUES
            ('AI in 2025: What’s Next?', 'Alice Smith','A dive into emerging AI trends.',1),
            ('10 Tips for a Healthy Heart','Dr. John Lee','Practical advice to boost cardiovascular health.', 2),
            ('World Cup Highlights','Maria Gonzalez','The top moments from this year’s tournament.',3),
            ('Mars Rover’s New Discoveries','Raj Patel','What the latest missions are uncovering on the Red Planet.', 4),
            ('Top 10 Netflix Originals','Sophie Turner','A rundown of must-watch shows.',5)";
            
            $execute = $mysqli->prepare($query);
            $execute->execute();
    }
}

?>
