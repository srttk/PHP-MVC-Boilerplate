<?php

class DBQuery {
    
    protected $_table;
    
    
    function connect(){
        
        try {
        $this->db_conn = new PDO(DB_TYPE.":host=localhost;dbname=".DB_NAME,DB_USER,DB_PASSWORD);
        } catch (PDOException $e) {
            echo "Oops! " . $e->getMessage();
        }
        
    }
    
    function delete(){
        
    }
    
    function insert(){
        
    }
    
    function update(){
        
    }
    
    function custom(){
        
    }
    
    
}