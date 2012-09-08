<?php

class News extends Model {
    
    function get_article($article_id) {
        
        $stmt = $this->db_conn->prepare('SELECT * FROM news WHERE id = :id');
        $stmt->execute(array("id" => $article_id));
        return $stmt->fetch();
        
    }
    
}