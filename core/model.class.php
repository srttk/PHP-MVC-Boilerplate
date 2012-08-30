<?php

class Model extends DBQuery {
    
	function __construct($controllerName) {
            
            // connect db
            $this->connect();
            
            $this->_model = get_class($this);
            $this->_table = strtolower($controllerName);
                
	}

}