<?php

class Widget extends Model {
    
    function getNews() {
        
        $stmt = $this->db_conn->prepare('SELECT * FROM news ORDER BY date_published DESC');
        $stmt->execute();
        return $stmt->fetchAll();
        
    }
    
    function getNav() {
        
        $stmt = $this->db_conn->prepare('SELECT title, page_id, url FROM navigation ORDER BY nav_order');
        $stmt->execute();
        
        $i = 0;
        $nav_items = array();
        
        while($row = $stmt->fetch()) {
            
            $nav_items[$i]['title'] = $row['title'];
            $nav_items[$i]['url'] = (!empty($row['page_id'])) ? '/pages/view/'.$row['page_id'] : $row['url'] ;
            $nav_items[$i]['active'] = ($_SERVER['REQUEST_URI'] == $nav_items[$i]['url']) ? true : false;
            
        $i++;
            
        }
        
        return $nav_items;
        
    }
    
}