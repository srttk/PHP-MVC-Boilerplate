<?php

/*
 * Needs to handle relationships etc.
 * 
 * 
 */

class DBQuery {
    
    protected $_model;
    protected $_table;
    protected $db_conn;
    protected $_where = array();
    protected $_where_type = "AND";
    
    
    function connect(){
        
        try {
        $this->db_conn = new PDO(DB_TYPE.":host=localhost;dbname=".DB_NAME,DB_USER,DB_PASSWORD);
        } catch (PDOException $e) {
            echo "Oops! " . $e->getMessage();
        }
        
    }
    
    function where($name, $value){
        
        $this->_where[] = array($name => $value);
        
    }
    
    function select($params = array()){
        
        $params = (count($params) > 0) ? implode(',', $params) : '*';
        $query = 'SELECT '.$params.' FROM '.$this->_table;
        
        // joins
        
        // wheres
        if(count($this->_where) > 0){
            $query.=' WHERE ';
            foreach($this->_where AS $key => $value){
                $query.=$key.' = :'.$key;
            }
        }
        
        $stmt = $this->db_conn->prepare($query);
        
        // orders
        
        // groups
        
        // bind all where's
        foreach($this->_where AS $key => $value){
            $stmt->bindParam(':'.$key, $value);
        }
        
        // return
        $stmt->execute();
        return $stmt->fetchAll();
        
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