<?php 
require("../connection/connection.php");

$query = "ALTER TABLE articles 
          ADD COLUMN category_id INT(11) DEFAULT NULL,
          ADD CONSTRAINT fk_articles_category
          FOREIGN KEY (category_id) REFERENCES categories(id) 
          ON DELETE SET NULL ON UPDATE CASCADE";

$execute = $mysqli->prepare($query);
$execute->execute();
?>
