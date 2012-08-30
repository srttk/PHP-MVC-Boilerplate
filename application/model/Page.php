<?php

class Page extends Model {
    
    
    function getPage($page_url)
    {
    
        $stmt = $this->db_conn->prepare('SELECT * FROM pages WHERE url = :url');
        $stmt->execute(array("url" => $page_url));
        return $stmt->fetch();
        
    }
    
    
    
    
    
    
}