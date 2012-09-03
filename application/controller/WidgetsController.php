<?php

class WidgetsController extends Controller {
    
    function __construct($widget, $params){
     
            $this->model = new Widget($widget);
            $this->_template = new Template('Widgets');
            $this->template_file = $widget;
            $this->_widget = $this->$widget($params);
        
    }

    function news($params){
        
        $data = $this->model->getNews($params);
        
        $this->set('news_items', $data);
        $this->set('params', $params);
        
        
    }
    
    function __destruct() {
            $this->_template->renderWidget($this->template_file);
    }
    
}