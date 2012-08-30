<?php

class PagesController extends Controller {
    
    function view($route){
        
        $data = $this->model->getPage($route['page']);
        
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
    
    function homepage(){
       
        $this->set('page_title', 'homepage');
        
    }
    
    function admin_homepage(){
        $this->set('admin_template', true);
        $this->set('page_title', 'Admin');
    }
    
    function error404(){
        
        $this->set('page_title', 'Error 404');
        $this->set('title', 'Oopsy daisy!');
        $this->set('content', 'Couldn\'t find that page... sorry!');
        $this->template_file = '404';
        
    }
    
    
}