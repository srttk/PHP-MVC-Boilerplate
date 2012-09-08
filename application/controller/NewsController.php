<?php

class NewsController extends Controller {
    
    
    function view($route){
        
        $data = $this->model->get_article($route['param']);

        if(!empty($data)){
            $this->set('page_title', $data['title']);
            $this->set('title', $data['title']);
            $this->set('content', $data['content']);
            $this->set('date_published', $data['date_published']);
        }

        else{
            // 404
            $this->_abort_render = true;
            error_404('Article not found.');
        }
       
    }
    
    
}