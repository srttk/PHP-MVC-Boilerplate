<?php
class Template {

	protected $variables = array();
	protected $_controller;

	function __construct($controller) {
		$this->_controller = $controller;
	}

	/** Set Variables **/

	function set($name,$value) {
		$this->variables[$name] = $value;
	}
        

	/** Display Template **/

    function render($template_file) {
        
        extract($this->variables);

        if(file_exists(ROOT.DS.'application'.DS.'view'.DS.$this->_controller.DS.'header.php')) {
            include(ROOT.DS.'application'.DS.'view'.DS.$this->_controller.DS.'header.php');
        }

        else {
            include(ROOT.DS.'application'.DS.'view'.DS.'header.php');
        }

        include(ROOT.DS.'application'.DS.'view'.DS.$this->_controller.DS.$template_file.'.php');

        if(file_exists(ROOT.DS.'application'.DS.'view'.DS.$this->_controller.DS.'footer.php')) {
            include (ROOT.DS.'application'.DS.'view'.DS.$this->_controller.DS.'footer.php');
        }

        else {
            include(ROOT.DS.'application'.DS.'view'.DS.'footer.php');
        }
    
    }
    
    function renderWidget($template_file) {
        
        extract($this->variables);
        include(ROOT.DS.'application'.DS.'view'.DS.$this->_controller.DS.$template_file.'.php');
    
    }

}