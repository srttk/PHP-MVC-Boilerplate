<?php

class Model extends DBQuery {
    
	protected $_model;
        protected $_table;
        protected $db_conn;
        
	function __construct($controllerName) {
            
            // connect db
            $this->connect();
            
            $this->_model = get_class($this);
            $this->_table = strtolower($controllerName);
                
	}

}