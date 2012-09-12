<?php

class WidgetsController extends Controller {
    
    function __construct($widget, $params){
     
            $this->model = new Widget($widget);
            $this->_template = new Template('Widgets');
            $this->template_file = $widget;
            $this->_widget = $this->$widget($params);
        
    }

    function news($params){
        
        $data = $this->model->get_news($params);
        $this->set('news_items', $data);
        
    }
    
    function navigation(){
        
        $nav_items = $this->model->get_nav();
        $this->set('nav_items', $nav_items);
        
    }
    
    function __destruct() {
            $this->_template->renderWidget($this->template_file);
    }
    
}