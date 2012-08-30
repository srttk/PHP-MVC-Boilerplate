<?php

class Page extends Model {
    
    
    function getPage($page_url) {
        
        $this->where(":url", $page_url);
        return $this->select();
        
    }
    
    
    
    
    
    
}