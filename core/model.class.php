<?php
class Model {
	protected $_model;
        protected $_table;
        protected $db_conn;
        
	function __construct($controllerName) {
            
            // connect db
            try {
            $this->db_conn = new PDO(DB_TYPE.":host=localhost;dbname=".DB_NAME,DB_USER,DB_PASSWORD);
            } catch (PDOException $e) {
                echo "Oops! " . $e->getMessage();
            }
            
            $this->_model = get_class($this);
            $this->_table = strtolower($controllerName);
                
                
	}

}