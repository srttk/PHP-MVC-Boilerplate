<?php

class PagesController extends Controller {
    
    function homepage(){
        $this->set('page_title', 'homepage');
    }
    
    function view($route){
        
        $data = $this->model->getPage($route['param']);
        
        if(!empty($data)){
            $this->set('page_title', $data['title']);
            $this->set('title', $data['title']);
            $this->set('content', $data['content']);
        }
        
        else{
            // 404
            $this->error404();
        }
        
    }
    
    function error404($error_message){
        
        if(DEVELOPMENT_ENVIRONMENT){
            $this->set('error', $error_message);
        }
        
        $this->set('page_title', 'Error 404');
        $this->set('title', 'Oopsy daisy!');
        $this->set('content', "Couldn't find that page... sorry!");
        $this->template_file = '404';
    }
    
}