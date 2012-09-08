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
        
    }
    
    function navigation(){
        
        $nav_items = $this->model->getNav();
        

         foreach($nav_items AS $nav_item_key => $nav_item_value){
 
             $nav_items[$nav_item_key]['active'] = false;
            
         }

        
        $this->set('nav_items', $nav_items);
        
    }
    
    function __destruct() {
            $this->_template->renderWidget($this->template_file);
    }
    
}