<?php

class Widget extends Model {
    
    function get_news($params) {
        
        $stmt = $this->db_conn->prepare('SELECT * FROM news ORDER BY date_published DESC LKMIT 0,'.$params['limit']);
        $stmt->execute();
        return $stmt->fetchAll();
        
    }
    
    function get_nav() {
        
        $stmt = $this->db_conn->prepare('SELECT title, page_id, url FROM navigation ORDER BY nav_order');
        $stmt->execute();
        
        $i = 0;
        $nav_items = array();
        
        while($row = $stmt->fetch()) {
            
            $nav_items[$i]['title'] = $row['title'];
            $nav_items[$i]['url'] = (!empty($row['page_id'])) ? '/pages/view/'.$row['page_id'] : $row['url'] ;
            
            if($_SERVER['REQUEST_URI'] == $nav_items[$i]['url']){
                $nav_items[$i]['active'] = true;
            }
            
            elseif(strpos($_SERVER['REQUEST_URI'],$nav_items[$i]['url']) !== false && $nav_items[$i]['url'] != '/'){
                $nav_items[$i]['active'] = true;
            }
            
            else{
                $nav_items[$i]['active'] = false;
            }
            
            
        $i++;
            
        }
        
        return $nav_items;
        
    }
    
}