<?php

class PagesController extends Controller {
    
    function homepage(){
        
    }
    
    function view($route){
        
        $data = $this->model->get_page($route['param']);
        
        if(!empty($data)){
            $this->set('page_title', $data['title']);
            $this->set('title', $data['title']);
            $this->set('content', $data['content']);
        }
        
        else{
            // 404
            $this->error404('Page not found in database.');
        }
        
    }
    
    function error404($error_message = null){
        
        if(DEVELOPMENT_ENVIRONMENT){
            $this->set('error', $error_message);
        }
        
        $this->set('page_title', 'Error 404');
        $this->set('title', 'Oopsy daisy!');
        $this->set('content', "Couldn't find that page... sorry!");
        $this->template_file = '404';
    }
    
}