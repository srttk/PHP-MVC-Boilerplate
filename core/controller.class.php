<?php

class Controller {

	protected $_model;
	protected $_controller;
	protected $_action;
	protected $_template;
        public $template_file;

	function __construct($model, $controllerName, $action) {

		$this->_controller = $controllerName;
		$this->_action = $action;
		$this->_model = $model;

		$this->model = new $model($controllerName);
		$this->_template = new Template($controllerName);
                $this->template_file = $this->_action;
                $this->set('admin_template', false);
	}

	function set($name,$value) {
		$this->_template->set($name,$value);
	}

	function __destruct() {
		$this->_template->render($this->template_file);
	}

}
