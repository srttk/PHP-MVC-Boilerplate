<?php

class NewsController extends Controller {
    
    function articles($route){
        
        if(!empty($route['param'])){
            
            $this->template_file = 'article';
            $data = $this->model->get_article($route['param']);

            if(!empty($data)){
                $this->set('page_title', $data['title']);
                $this->set('title', $data['title']);
                $this->set('content', $data['content']);
                $this->set('date_published', $data['date_published']);
            }

            else{
                // 404
                $this->abort_render = true;
                error_404('Article not found.');
            }
            
        }
        
        else{
        
        $data = $this->model->get_articles();

            $this->set('page_title', 'News');
            $this->set('news_items', $data);
            
        }
       
    }
    
    
}