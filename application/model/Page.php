<?php

class Page extends Model {
    
    function get_page($page_id) {
        
        $stmt = $this->db_conn->prepare('SELECT * FROM pages WHERE id = :id');
        $stmt->execute(array("id" => $page_id));
        return $stmt->fetch();
        
    }
    
}