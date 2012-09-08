<?php

class Widget extends Model {
    
    function getNews() {
        
        $stmt = $this->db_conn->prepare('SELECT * FROM news ORDER BY date_published DESC');
        $stmt->execute();
        return $stmt->fetchAll();
        
    }
    
    function getNav() {
        
        $stmt = $this->db_conn->prepare('SELECT * FROM navigation ORDER BY nav_order');
        $stmt->execute();
        return $stmt->fetchAll();
        
    }
    
}